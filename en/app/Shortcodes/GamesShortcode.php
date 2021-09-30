<?php
namespace App\Shortcodes;

use App\Game;

/**
 * Class GamesShortcode
 * @package App\Shortcodes
 * @shortcode [games ids="1,2,3,4,5,6,7,8,9,10"]
 */
class GamesShortcode {

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $games_ids = $shortcode->ids;
        $games = Game::select([
            'id',
            'name',
            'slug',
            'logo_alt_text',
        ])->whereRaw("`id` IN ($games_ids)");
        $games = $games_ids ? $games->get(): null;
        return view('shortcodes.games', compact('shortcode', 'content', 'games'));
    }
}
