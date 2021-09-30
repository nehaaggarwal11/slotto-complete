<?php
namespace App\Shortcodes;

use App\FaqQuestion;

/**
 * Class FaqShortcode
 * @package App\Shortcodes
 * @shortcode [faq ids="1,2,3,4,5,6,7,8,9,10" heading="" description=""]
 */
class FaqShortcode {

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $faq_questions_ids = $shortcode->ids;
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null;

        $heading = $shortcode->heading;
        $description = $shortcode->description;
        return view('shortcodes.faq', compact('shortcode', 'content', 'faq_questions', 'heading', 'description'));
    }
}
