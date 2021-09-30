<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Sport extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'sports';
/*
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
        'title',
        'logo_alt_text',
        'bg_image_alt_text',
        'bg_image_logo_alt_text',
        'bg_image_text',
        'bg_image_button_text',
        'bg_image_button_link',
        'heading',
        'description',
        'new_slots',
        'popular_slots',
        'all_slots',
        'popular_casino_heading',
        'popular_casinos',
        'content',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'created_at',
        'updated_at',
    ];

    /* *
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     * @param  array  $countries
     * /
    public function scopeCountries($query, array $countries = [])
    {
        return $query->whereRaw('FIND_IN_SET(?,countries)', $countries);
        //return whereIn('countries', $countries);
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(150)->height(150);
    }

    public function getRouteAttribute()
    {
        return route('frontend.software-game', $this->slug ?? '404');
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
*/
}
