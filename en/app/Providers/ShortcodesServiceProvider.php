<?php
namespace App\Providers;

use App\Shortcodes\CasinosShortcode;
use App\Shortcodes\FaqShortcode;
use App\Shortcodes\GamesShortcode;
use App\Shortcodes\NewsShortcode;
use App\Shortcodes\SoftwaresShortcode;
use Illuminate\Support\ServiceProvider;
use Webwizo\Shortcodes\Facades\Shortcode;

class ShortcodesServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::register('casinos', CasinosShortcode::class);
        Shortcode::register('games', GamesShortcode::class);
        Shortcode::register('faq', FaqShortcode::class);
        Shortcode::register('news', NewsShortcode::class);
        Shortcode::register('softwares', SoftwaresShortcode::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
