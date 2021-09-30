<?php

namespace App\Http\Controllers\Frontend;

use App\Casino;
use App\Game;
use App\News;
use App\StaticPage;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $casinos = Casino::select('id','name')->get();
        $games = Game::select('id','name')->get();
        $news = News::select('id','name')->get();
        $sitemap = StaticPage::getAllFields('sitemap');
        return view('frontend.sitemap', compact('casinos','games', 'news','sitemap'));
    }

}
