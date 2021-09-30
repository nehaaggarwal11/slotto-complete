<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class DynamicPage extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'dynamic_pages';

    protected $appends = [
        'route',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'slug',
        'name',
        'bg_heading',
        'bg_text',
        'heading',
        'description',
        'content',
        'popular_casino_heading',
        'popular_casinos',
        'seo_title',
        'seo_keyword',
        'seo_description',
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
        $this->addMediaConversion('thumb')->width(150)->height(150);
    }

    public function getRouteAttribute()
    {
        return $this->slug? route('frontend.page', $this->slug): url('404');
    }

    // public function getFeaturedImageAttribute()
    // {
    //     $file = $this->getMedia('featured_image')->last();

    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //     }

    //     return $file;
    // }

    // public function getLogoImageAttribute()
    // {
    //     $file = $this->getMedia('logo_image')->last();

    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //     }

    //     return $file;
    // }

    // public function getTransparentLogoImageAttribute()
    // {
    //     $file = $this->getMedia('transparent_logo_image')->last();

    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //     }

    //     return $file;
    // }

    // public function getBgImageAttribute()
    // {
    //     $file = $this->getMedia('bg_image')->last();

    //     if ($file) {
    //         $file->url       = $file->getUrl();
    //         $file->thumbnail = $file->getUrl('thumb');
    //     }

    //     return $file;
    // }
}
