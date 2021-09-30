<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Casino extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'casinos';

    protected $appends = [
//        'slug',
        'route',
        'featured_image',
        'logo_image',
        'transparent_logo_image',
        'bg_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'slug',
        'bg_color',
        'name',
        'overview',
        'detail',
        'link',
        'home_page_slider_title',
        'small_description',
        'rating',
        'description',
        'info',
        'spins',
        'spins_text',
        'bonus',
        'bonus_text',
        'wagering_requirements',
        'wagering_requirements_text',
        'popular_casino_hover_info',
        'banner_info',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'featured_image_alt_text',
        'logo_image_alt_text',
        'transparent_logo_image_alt_text',
        'bg_image_alt_text',
        'popular_casino_heading',
        'popular_casinos',
        'bg_image_color',
        'countries',
        'faq_heading',
        'faqs',
        'games_heading',
        'games',
        'order_id',
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
        $this->addMediaConversion('thumb')->width(150)->height(150)->format(Manipulations::FORMAT_PNG);
    }

    /*public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }*/

    public function getRouteAttribute()
    {
        return $this->slug? route('frontend.casino', $this->slug): url('404');
    }

    public function getFeaturedImageAttribute()
    {
        $file = $this->getMedia('featured_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getLogoImageAttribute()
    {
        $file = $this->getMedia('logo_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getTransparentLogoImageAttribute()
    {
        $file = $this->getMedia('transparent_logo_image')->last();

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
}
