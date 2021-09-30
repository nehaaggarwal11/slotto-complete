<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/IPinfo.php';


class MultiSiteRedirection
{
	public  $uk_site_url,
					$norway_site_url,
					$usa_site_url,
					$ipinfo_api_token;

	public function __construct()
	{
		$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
		$dotenv->load();
		$this->uk_site_url = $this->env('MSR_UK_URL');
		$this->norway_site_url = $this->env('MSR_NORWAY_URL');
		$this->usa_site_url = $this->env('MSR_USA_URL');
		$this->ipinfo_api_token = $this->env('IPINFO_API_TOKEN');
	}

	public function handle()
	{
		$uk = '2.255.251.61';
		$norway = '2.255.250.33';
		$usa = '216.239.36.21';
		$ip = null;
		$detail = (new IPinfo($this->ipinfo_api_token))->getDetails($ip);

		// echo "<pre>";
		// print_r($detail);
		// die;
		/*
		US=216.239.36.21=USA
		NO=2.255.250.33=NORWAY
		GB=2.255.251.61=UK
		SITE = LOCATION = LANGUAGE
		UK = WORLD = ENGLISH
		NORWAY = NORWAY = NORWEGIAN
		US = USA = ENGLISH
		*/

		if ($detail && !empty($country = strtolower(@$detail->country))) {
			if ($country === "gb") { // UK
				$this->redirect($this->uk_site_url);
			} elseif ($country == "no") { // NORWAY
				$this->redirect($this->norway_site_url);
			} elseif ($country == "us") { // USA
				$this->redirect($this->usa_site_url);
			}
		}

		$this->redirect($this->uk_site_url); // This can from whole world

		return 0;
	}

	public function redirect($url)
	{
			header("Location: ".$url);
			exit;
	}

	public function env($key){
		return @$_ENV[$key];
	}
}

(new MultiSiteRedirection())->handle();

exit;
/*
require_once __DIR__ . "/norway/vendor/autoload.php";

dd(env('IPINFO_API_TOKEN'));

$app = require_once __DIR__.'/norway/bootstrap/app.php';
$app->useEnvironmentPath( __DIR__ . "/.env");

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);


$response = $kernel->handle(
	$request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);

// dd(env('APP_NORWAY_SITE_DOMAIN'));*/
//
// require_once __DIR__ . "/IPinfo.php";
//
//
// $detail = (new \App\Helpers\IPinfo(env('IPINFO_API_TOKEN')))->getDetails('2.255.251.61');
//
// dd($detail);
/*
config('panel.multi_site.uk.domain')
 config('panel.multi_site.uk.protocol')
 config('panel.multi_site.norway.domain')
 config('panel.multi_site.norway.protocol')
 config('panel.multi_site.usa.domain')
 config('panel.multi_site.usa.protocol')*/
