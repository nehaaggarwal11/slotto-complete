<?php
namespace App\Shortcodes;

use App\Casino;

/**
 * Class CasinosShortcode
 * @package App\Shortcodes
 * @shortcode [casinos ids="1,2,3,4,5,6,7,8,9,10"]
 */
class CasinosShortcode {

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $current_country = nj_get_current_country();
        $casinos_ids = $shortcode->ids;
        $casinos = Casino::select([
            'id',
            'featured_image_alt_text',
            'bonus_text',
            'link',
            'slug',
            'info',
            'bg_color',
        ])->whereRaw("`id` IN ($casinos_ids)");
        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }
        $casinos = $casinos_ids ? $casinos->get(): null;
        return view('shortcodes.casinos', compact('shortcode', 'content', 'casinos'));
    }
}
