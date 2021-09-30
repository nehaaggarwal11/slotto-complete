<?php
namespace App\Shortcodes;

use App\News;

/**
 * Class NewsShortcode
 * @package App\Shortcodes
 * @shortcode [news ids="1,2,3,4,5,6,7,8,9,10"]
 */
class NewsShortcode {

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $news_ids = $shortcode->ids;
        $news = News::select([
            'id',
            'slug',
            'logo_img_alt_text',
            'name',
            'small_description',
        ])->whereRaw("`id` IN ($news_ids)");
        $news = $news_ids ? $news->get(): null;
        return view('shortcodes.news', compact('shortcode', 'content', 'news'));
    }
}
