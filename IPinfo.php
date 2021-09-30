<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use Phpfastcache\Helper\Psr16Adapter;

/**
 * Exposes the IPinfo library to client code.
 */
class IPinfo
{
    const API_URL = 'https://ipinfo.io';
    const CACHE_TIME = 86400; // 24 hours as seconds
    const COUNTRIES_FILE_DEFAULT = __DIR__ . '/countries.json';
    const REQUEST_TYPE_GET = 'GET';
    const STATUS_CODE_QUOTA_EXCEEDED = 429;

    public $access_token;
    public $cache;
    public $cache_time;
    public $countries;
    public $default_ip;
    protected $http_client;

    public function __construct($access_token = null, $settings = [])
    {
        $this->access_token = $access_token;
        $this->http_client = new Client(['http_errors' => false]);

        $countries_file = $settings['countries_file'] ?? self::COUNTRIES_FILE_DEFAULT;
        $this->countries = $this->readCountryNames($countries_file);
        $this->default_ip = $this->getCurrentIP();

		    CacheManager::setDefaultConfig(new ConfigurationOption([
			    'path' => __DIR__ . '/tmp', // or in windows "C:/tmp/"
		    ]));
	      $this->cache = new Psr16Adapter($defaultDriver = 'Files');
        $this->cache_time = $settings['cache_time'] ?? self::CACHE_TIME;
    }

    /**
     * Get formatted details for an IP address.
     * @param  string|null $ip_address IP address to look up.
     * @return Details Formatted IPinfo data.
     * @throws IPinfoException
     */
    public function getDetails($ip_address = null)
    {
        if(!$ip_address){
            $ip_address = $this->default_ip;
        }

        $response_details = $this->getRequestDetails((string) $ip_address);

        return $this->formatDetailsObject($response_details);
    }

    /**
     * Format details and return as an object.
     * @param  array  $details IP address details.
     * @return Details Formatted IPinfo Details object.
     */
    public function formatDetailsObject($details = [])
    {
        $country = $details['country'] ?? null;
        $details['country_name'] = $this->countries[$country] ?? null;

        if (array_key_exists('loc', $details)) {
            $coords = explode(',', $details['loc']);
            $details['latitude'] = $coords[0];
            $details['longitude'] = $coords[1];
        } else {
            $details['latitude'] = null;
            $details['longitude'] = null;
        }

        return new Details($details);
    }

    /**
     * Get details for a specific IP address.
     * @param  string $ip_address IP address to query API for.
     * @return array IP response data.
     * @throws IPinfoException
     */
    public function getRequestDetails(string $ip_address)
    {

        if (!$this->cache->has($ip_address)) {
            $url = self::API_URL;
            if ($ip_address) {
                $url .= "/$ip_address";
            }

            try {
                $response = $this->http_client->request(
                    self::REQUEST_TYPE_GET,
                    $url,
                    $this->buildHeaders()
                );
            } catch (GuzzleException $e) {
                throw new IPinfoException($e->getMessage());
            } catch (\Exception $e) {
                throw new IPinfoException($e->getMessage());
            }

            if ($response->getStatusCode() == self::STATUS_CODE_QUOTA_EXCEEDED) {
                throw new IPinfoException('IPinfo request quota exceeded.');
            } elseif ($response->getStatusCode() >= 400) {
                throw new IPinfoException('Exception: ' . json_encode([
                        'status' => $response->getStatusCode(),
                        'reason' => $response->getReasonPhrase(),
                    ]));
            }

            $raw_details = json_decode($response->getBody(), true);
	          $this->cache->set($ip_address, $raw_details, $this->cache_time);
        }

        return $this->cache->get($ip_address);
    }

    /**
     * Build headers for API request.
     * @return array Headers for API request.
     */
    public function buildHeaders()
    {
        $headers = [
            'user-agent' => 'IPinfoClient/PHP/1.0',
            'accept' => 'application/json',
        ];

        if ($this->access_token) {
            $headers['authorization'] = "Bearer {$this->access_token}";
        }

        return ['headers' => $headers];
    }

    /**
     * Read country names from a file and return as an array.
     * @param  string $countries_file JSON file of country_code => country_name mappings
     * @return array country_code => country_name mappings
     */
    private function readCountryNames($countries_file)
    {
        $file_contents = file_get_contents($countries_file);
        return json_decode($file_contents, true);
    }

    public static function getCurrentIP()
    {
	    // Function to get the client IP address
	    $ipaddress = null;
	    if (getenv('HTTP_CLIENT_IP')) {
		    $ipaddress = getenv('HTTP_CLIENT_IP');
	    }elseif(getenv('HTTP_X_FORWARDED_FOR')) {
		    $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    }elseif(getenv('HTTP_X_FORWARDED')) {
		    $ipaddress = getenv('HTTP_X_FORWARDED');
	    }elseif(getenv('HTTP_FORWARDED_FOR')) {
		    $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    }elseif(getenv('HTTP_FORWARDED')) {
		    $ipaddress = getenv('HTTP_FORWARDED');
	    }elseif(getenv('REMOTE_ADDR')) {
		    $ipaddress = getenv('REMOTE_ADDR');
	    }
	    return $ipaddress;
    }
}


/**
 * IPinfo Exception.
 */
class IPinfoException extends Exception
{
}

/**
 * Holds formatted data for a single IP address.
 */
class Details
{
    // public $all;

    public function __construct($raw_details)
    {
        foreach ($raw_details as $property => $value) {
            $this->$property = $value;
        }
        // $this->all = $raw_details;
    }
}
