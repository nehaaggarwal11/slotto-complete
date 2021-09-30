<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class LayoutPage extends Model
{

    public $table = 'layout_pages';

    protected $appends = [
        'route',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'data',
        'html',
        'css',
        'js',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'created_at',
        'updated_at',
    ];

    public function getRouteAttribute()
    {
        return $this->slug? route('frontend.layout-page', $this->slug): url('404');
    }

}
