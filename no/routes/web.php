<?php

use App\Http\Controllers\Admin\AllGameController;
use \Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;


Route::get('command/{command}', function ($command){
    if ('218eu8e9012013321ue923u49' == request()->input('api_key')){
        if($command == 'reset'){
            \Illuminate\Support\Facades\Artisan::call('view:clear');
            $result = \Illuminate\Support\Facades\Artisan::output();
            dump($result);

            \Illuminate\Support\Facades\Artisan::call('route:clear');
            $result = \Illuminate\Support\Facades\Artisan::output();
            dump($result);

            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            $result = \Illuminate\Support\Facades\Artisan::output();
            dump($result);

            \Illuminate\Support\Facades\Artisan::call('config:clear');
            $result = \Illuminate\Support\Facades\Artisan::output();
            dump($result);

            \Illuminate\Support\Facades\Artisan::call('config:cache');
            $result = \Illuminate\Support\Facades\Artisan::output();
            dump($result);
            die;
        }else{
            \Illuminate\Support\Facades\Artisan::call($command);
            $result = \Illuminate\Support\Facades\Artisan::output();
        }
        dd($result);
    }
});


// Frontend
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/online-casinos-in-india', 'HomeController@india')->name('best-casinos-in-india');
    Route::post('/india', 'HomeController@india')->name('india.ajax');
    Route::get('/casino/{slug}', 'CasinoController@index')->name('casino');
    Route::get('/new-slots-sites', 'NewCasinoController@index')->name('new-casinos');
    Route::get('/free-spins', 'CasinoBonusController@index')->name('casino-bonus');
    Route::get('/free-slots', 'AllGameController@index')->name('all-games');
    Route::post('/free-slots', 'AllGameController@filter')->name('all-games');
    //Route::post('/free-slots/search', 'AllGameController@search')->name('all-games.search');
    Route::get('/slot/{slug}', 'GameController@index')->name('game');
    Route::get('/news', 'AllNewsController@index')->name('all-news');
    Route::post('/news', 'AllNewsController@index')->name('all-news');
    //Route::post('/news/search', 'AllNewsController@search')->name('all-news.search');
    Route::get('/news/{slug}', 'NewsController@index')->name('news');
    Route::post('/news/{slug}/comment', 'NewsController@comment')->name('news.comment');
    Route::get('/faq', 'FaqController@index')->name('faq');
    Route::post('/faq', 'FaqController@index')->name('faq');
    Route::get('/sitemap', 'SitemapController@index')->name('sitemap-page');
    Route::post('subscribers/subscribe', 'SubscriberController@subscribe')->name('subscribers.subscribe');
    Route::get('subscribers/subscribe/confirm/{email}', 'SubscriberController@subscribeConfirm')->name('subscribers.subscribe.confirm');
    Route::get('subscribers/subscribe/confirm/{email}', 'SubscriberController@subscribeConfirm')->name('subscribers.subscribe.confirm');
    Route::get('subscribers/unsubscribe/{email}', 'SubscriberController@unsubscribe')->name('subscribers.unsubscribe');
    Route::get('/software', 'AllSoftwareController@index')->name('software');
    Route::post('/software', 'AllSoftwareController@index')->name('software');
    //Route::get('/software/search', 'AllSoftwareController@search')->name('software.search');
    Route::get('/software/{slug}', 'SoftwareController@index')->name('software-game');
    Route::get('/page/{slug}', 'PageController@index')->name('page');
    Route::group(['as' => 'page.'], function () {
        Route::get('/about-us', 'StaticPageController@aboutUs')->name('about-us');
        Route::get('/privacy-policy', 'StaticPageController@privacyPolicy')->name('privacy-policy');
        Route::get('/responsible-gaming', 'StaticPageController@responsibleGaming')->name('responsible-gaming');
        Route::get('/terms-and-condition', 'StaticPageController@terms')->name('terms');
        Route::get('/generell-informasjon', 'StaticPageController@generalInformation')->name('generell-informasjon');
        Route::get('/cookies', 'StaticPageController@cookies')->name('cookies');
    });
});


// Auth
// \Illuminate\Support\Facades\Auth::routes(['register' => false]);
Route::get( '/login', 'Auth\Auth0IndexController@login' )->name( 'login' );
Route::get( '/logout', 'Auth\Auth0IndexController@logout' )->name( 'logout' )->middleware('auth');
Route::get( '/auth0/callback', '\Auth0\Login\Auth0Controller@callback' )->name( 'auth0-callback' );


// Admin
//Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/generate-sitemap', 'HomeController@generateSitemap')->name('generate-sitemap');
    // Route::get('/new-casino', 'NewCasinoController@index')->name('new-casinos');
    // Route::get('/casino-bonus', 'CasinoBonusController@index')->name('casino-bonus');
    // Route::get('/all-game', 'AllGameController@index')->name('all-game');

    ////// For Change order
    Route::POST('changeOrder', 'changeOrderController@cOrder')->name('change.changeOrder');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Casinos
    Route::delete('casinos/destroy', 'CasinoController@massDestroy')->name('casinos.massDestroy');
    Route::post('casinos/media', 'CasinoController@storeMedia')->name('casinos.storeMedia');
    Route::post('casinos/ckmedia', 'CasinoController@storeCKEditorImages')->name('casinos.storeCKEditorImages');
    Route::resource('casinos', 'CasinoController');

    // Games
    Route::delete('games/destroy', 'GameController@massDestroy')->name('games.massDestroy');
    Route::post('games/media', 'GameController@storeMedia')->name('games.storeMedia');
    Route::post('games/ckmedia', 'GameController@storeCKEditorImages')->name('games.storeCKEditorImages');
    Route::resource('games', 'GameController');

    // Home Silder
    Route::post('homeSlider/media', 'homeSliderController@addMedia')->name('homeSlider.storeMedia');
    Route::post('homeSlider/deleteMedia', 'homeSliderController@deleteMedia')->name('homeSlider.deleteMedia');
    Route::resource('homeSlider', 'homeSliderController');


    // News
    Route::delete('news/destroy', 'NewsController@massDestroy')->name('news.massDestroy');
    Route::post('news/media', 'NewsController@storeMedia')->name('news.storeMedia');
    Route::post('news/ckmedia', 'NewsController@storeCKEditorImages')->name('news.storeCKEditorImages');
    Route::resource('news', 'NewsController');

    // Comments
    Route::delete('comments/destroy', 'CommentController@massDestroy')->name('comments.massDestroy');
    // Route::get('comments/{id}', 'CommentController@show')->name('comments.show');
    Route::resource('comments', 'CommentController');
    Route::post('status', 'CommentController@statusUpdate')->name('comments.statusUpdate');

    // Content Categories
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tags
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Pages
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Static Pages
    Route::post('static-pages/media', 'StaticPageController@storeMedia')->name('static-pages.storeMedia');
    Route::post('static-pages/ckmedia', 'StaticPageController@storeCKEditorImages')->name('static-pages.storeCKEditorImages');
    Route::get('static-pages/{page}/edit', 'StaticPageController@edit')->name('static-pages.edit');
    Route::put('static-pages/{page}', 'StaticPageController@update')->name('static-pages.update');

    // Faq Categories
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Questions
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Subscribers
    Route::get('subscribers', 'SubscriberController@index')->name('subscribers.index');
    Route::delete('subscribers/destroy', 'SubscriberController@massDestroy')->name('subscribers.massDestroy');
    Route::get('subscribers/email', 'SubscriberController@email')->name('subscribers.email');
    Route::post('subscribers/send-email', 'SubscriberController@sendEmail')->name('subscribers.sendEmail');
    Route::post('subscribers/send-Bulk-email', 'SubscriberController@sendBulkEmail')->name('subscribers.sendBulkEmail');
    Route::delete('subscribers/{subscriber}', 'SubscriberController@destroy')->name('subscribers.destroy');
    Route::get('subscribers/link-email-builder', 'SubscriberController@emailBuilderLink')->name('link-email-builder');
    Route::get('subscribers/email-builder', 'SubscriberController@emailBuilder')->name('subscribers.email-builder');

    // Software Providers
    Route::delete('softwares/destroy', 'SoftwareController@massDestroy')->name('softwares.massDestroy');
    Route::resource('softwares', 'SoftwareController');
    Route::post('softwares/media', 'SoftwareController@storeMedia')->name('softwares.storeMedia');
    Route::post('softwares/ckmedia', 'SoftwareController@storeCKEditorImages')->name('softwares.storeCKEditorImages');

    // Dynamic Pages
    Route::delete('dynamic-pages/destroy', 'DynamicPageController@massDestroy')->name('dynamic-pages.massDestroy');
    Route::resource('dynamic-pages', 'DynamicPageController');
    Route::post('dynamic-pages/media', 'DynamicPageController@storeMedia')->name('dynamic-pages.storeMedia');
    Route::post('dynamic-pages/ckmedia', 'DynamicPageController@storeCKEditorImages')->name('dynamic-pages.storeCKEditorImages');

    // Game Categories
    Route::delete('game-categories/destroy', 'GameCategoryController@massDestroy')->name('game-categories.massDestroy');
    Route::resource('game-categories', 'GameCategoryController');

    // Menu
    Route::resource('menu','MenuController');
    Route::post('menu/ajax','MenuController@ajax')->name('menu.ajax');

    // Layout Pages
    Route::delete('layout-pages/destroy', 'LayoutPageController@massDestroy')->name('layout-pages.massDestroy');
    Route::get('layout-pages/{layout_page}/copy', 'LayoutPageController@copy')->name('layout-pages.copy');
    Route::match(['GET', 'POST'], 'layout-pages/gjs-assets', 'LayoutPageController@gjsAssets')->name('layout-pages.gjs-assets');
    Route::resource('layout-pages', 'LayoutPageController');
});


// Sitemap
Route::group(['as' => 'frontend.sitemap-page'], function () {
    Route::get('sitemap.xml', function() {
      // create sitemap
        $sitemap = App::make("sitemap");

        //clear sitemap setCache
        //$sitemap->resetSitemaps();

        // set cache
        $sitemap->setCache('laravel.sitemap-index', 3600);
        // add sitemaps (loc, lastmod (optional))

        $sitemap->addSitemap(route('frontend.sitemap-page.pages'));
        $sitemap->addSitemap(route('frontend.sitemap-page.casinos'));
        $sitemap->addSitemap(route('frontend.sitemap-page.news'));
        $sitemap->addSitemap(route('frontend.sitemap-page.games'));
        $sitemap->addSitemap(route('frontend.sitemap-page.softwares'));
        $sitemap->addSitemap(route('frontend.sitemap-page.layouts'));
        // show sitemap

        return $sitemap->render('sitemapindex');
    });

    Route::get('sitemap_pages.xml', function() {
        $date = date('Y-m-d ').' 00:00:00';
        // create sitemap
        $sitemap = App::make("sitemap");
        // set cache
        $sitemap->setCache('laravel.sitemap-pages', 3600);
        //clear sitemap setCache
        //$sitemap->resetSitemaps();
        // add routes
        $sitemap->add(route('frontend.index'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.all-games'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.all-news'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.casino-bonus'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.page.about-us'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.page.cookies'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.page.privacy-policy'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.page.terms'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.faq'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.new-casinos'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.software'), $date, '1.0', 'daily');
        $sitemap->add(route('frontend.best-casinos-in-india'), $date, '1.0', 'daily');
        // $sitemap->add(route('frontend.page.general-information'), $date, '1.0', 'daily');
          ////// Don't Crawl //// $sitemap->add(route('frontend.all-news.search'), $date, '1.0', 'daily');
        ////// Don't Crawl //// $sitemap->add(route('frontend.all-games.search'), $date, '1.0', 'daily');
        //$sitemap->add(route('frontend.home'), $date, '1.0', 'daily');
        //$sitemap->add(route('frontend.news.comment'), $date, '1.0', 'daily');
        //$sitemap->add(route('frontend.new-casinos'), $date, '1.0', 'daily');
        //$sitemap->add(route(''), $date, '1.0', 'daily');
        // show sitemap
        return $sitemap->render('xml');
    })->name('.pages');

    Route::get('sitemap_casinos.xml', function() {
        // create sitemap
        $sitemap = App::make("sitemap");
        // set cache
        $sitemap->setCache('laravel.sitemap-casinos', 3600);
        // add items
        $casinos = \App\Casino::all();
        foreach ($casinos as $casino) {
            $sitemap->add($casino->route, $casino->updated_at, '0.8', 'daily');
        }
        // show sitemap
        return $sitemap->render('xml');
    })->name('.casinos');

    Route::get('sitemap_news.xml', function() {
        // create sitemap
        $sitemap = App::make("sitemap");
        // set cache
        $sitemap->setCache('laravel.sitemap-news', 3600);
        // add items
        $news = \App\News::all();
        foreach ($news as $new) {
            $sitemap->add($new->route, $new->updated_at, '0.8', 'daily');
        }
        // show sitemap
        return $sitemap->render('xml');
    })->name('.news');

    Route::get('sitemap_games.xml', function() {
        // create sitemap
        $sitemap = App::make("sitemap");
        // set cache
        $sitemap->setCache('laravel.sitemap-games', 3600);
        // add items
        $games = \App\Game::all();
        foreach ($games as $game) {
            $sitemap->add($game->route, $game->updated_at, '0.8', 'daily');
        }
        // show sitemap
        return $sitemap->render('xml');
    })->name('.games');

    Route::get('sitemap_softwares.xml', function() {
        // create sitemap
        $sitemap = App::make("sitemap");
        // set cache
        $sitemap->setCache('laravel.sitemap-softwares', 3600);
        // add items
        $softwares = \App\Software::all();
        foreach ($softwares as $software) {
            $sitemap->add($software->route, $software->updated_at, '0.8', 'daily');
        }
        // show sitemap
        return $sitemap->render('xml');
    })->name('.softwares');

    Route::get('sitemap_layouts.xml', function() {
        // create sitemap
        $sitemap = App::make("sitemap");
        // set cache
        $sitemap->setCache('laravel.sitemap-layouts', 3600);
        // add items
        $layouts = \App\LayoutPage::all();
        foreach ($layouts as $layout) {
            $sitemap->add($layout->route,$layout->updated_at, '0.8', 'daily');
        }
        // show sitemap
        return $sitemap->render('xml');
    })->name('.layouts');



});


Route::group(['as' => 'frontend.', 'namespace' => 'Frontend'], function () {
    Route::get('{slug}', 'PageController@layoutPage')
        ->name('layout-page');
});
