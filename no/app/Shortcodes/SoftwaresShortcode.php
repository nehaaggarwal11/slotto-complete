<?php
namespace App\Shortcodes;

use App\Software;

/**
 * Class SoftwaresShortcode
 * @package App\Shortcodes
 * @shortcode [softwares ids="1,2,3,4,5,6,7,8,9,10"]
 */
class SoftwaresShortcode {

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $softwares_ids = $shortcode->ids;
        $softwares = Software::select([
            'id',
            'slug',
            'logo_alt_text',
            'bg_color'
        ])->whereRaw("`id` IN ($softwares_ids)");
        $softwares = $softwares_ids ? $softwares->get(): null;
        return view('shortcodes.softwares', compact('shortcode', 'content', 'softwares'));
    }
}
