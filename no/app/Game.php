<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Game extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'games';

    protected $appends = [
        'route',
        'logo',
        'bg_image',
        'bg_image_logo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'slug',
        'game_category',
        'bg_image_text',
        'bg_image_button_link',
        'logo_alt_text',
        'bg_image_alt_text',
        'bg_image_logo_alt_text',
        'bg_color',
        'game_link',
        'name',
        'rtp_game',
        'layout',
        'gevinstlinjer',
        'maks_mynt_gevinst',
        'volatilitet_game',
        'min_innsats',
        'maks_innsats',
        'description',
        'provider',
        'rtp',
        'gpi',
        'similar_games',
        'popular_casino_heading',
        'popular_casinos',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'volatilitet',
        'faq_heading',
        'faqs',
        'slots_heading',
        'slots',
        'created_at',
        'updated_at',
    ];

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     * @param  array  $countries
     */
    public function scopeCountries($query, array $countries = [])
    {
        return $query->whereRaw('FIND_IN_SET(?,countries)', $countries);
        //return whereIn('countries', $countries);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(188)->height(188);
    }

    public function getRouteAttribute()
    {
        return $this->slug? route('frontend.game', $this->slug): url('404');
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getBgImageAttribute()
    {
        $file = $this->getMedia('bg_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getBgImageLogoAttribute()
    {
        $file = $this->getMedia('bg_image_logo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public static function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}
