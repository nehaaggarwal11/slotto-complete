<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class News extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'news';

    protected $appends = [
        'logo_img',
        'bg_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'slug',
        'category',
        'logo_img_alt_text',
        'name',
        'small_description',
        'bg_image_alt_text',
        'description',
        'popular_casinos_heading',
        'popular_casinos',
        'similar_news_title',
        'similar_news',
        'faq_heading',
        'faqs',
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

    /*public function getSlugAttribute()
    {
        return Str::slug($this->name);
    }*/

    public function getRouteAttribute()
    {
        return route('frontend.news', $this->slug ?? '404');
    }

    public function getLogoImgAttribute()
    {
        $file = $this->getMedia('logo_img')->last();

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
    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
