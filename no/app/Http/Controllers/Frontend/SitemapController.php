<?php

namespace App\Http\Controllers\Frontend;

use App\Casino;
use App\Game;
use App\LayoutPage;
use App\News;
use App\Software;
use App\StaticPage;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $current_country = nj_get_current_country();
        $sitemap = StaticPage::getAllFields('sitemap');
        $layout_pages = LayoutPage::query()->select('id', 'title', 'slug')->get();

        $casinos = Casino::query()->select('id', 'name', 'slug');
        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }
        $casinos = $casinos->get();
        $games = Game::query()->select('id', 'name', 'slug')->get();
        $news = News::query()->select('id', 'name', 'slug')->get();
        $softwares = Software::query()->select('id', 'title', 'slug')->get();

        return view('frontend.sitemap', compact('casinos','games', 'news', 'softwares', 'layout_pages', 'sitemap'));
    }

}
