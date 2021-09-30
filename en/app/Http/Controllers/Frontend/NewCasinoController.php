<?php

namespace App\Http\Controllers\Frontend;

use App\Casino;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\StaticPage;
use App\FaqQuestion;
use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class NewCasinoController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $data = StaticPage::getAllFields('new-casino');

        $current_country = nj_get_current_country();
        $casinos_ids = implode(',', @json_decode(StaticPage::getField('new-casino', 'casinos'), true) ?? []);
        $popular_casinos_ids = implode(',', @json_decode(StaticPage::getField('new-casino', 'popular_casinos'), true) ?? []);
        $casinos = Casino::select()->whereRaw("`id` IN ($casinos_ids)")
        ->orderByRaw("FIELD(id, $casinos_ids)");
        $popular_casinos = Casino::select()->whereRaw("`id` IN ($popular_casinos_ids)")
        ->orderByRaw("FIELD(id, $popular_casinos_ids)");
        if($current_country){
            $casinos = $casinos->countries([$current_country]);
            $popular_casinos = $popular_casinos->countries([$current_country]);
        }
        
        $casinos = $casinos_ids ? $casinos->get(): null;

        $popular_casinos = $popular_casinos_ids ? $popular_casinos->get(): null;

        $top3_casinos = [
            [
                'image' => StaticPage::getMediaField('new-casino', 'top3_first_image'),
                'content' => "<li>".str_replace(PHP_EOL, "</li><li>", $data->top3_first_content)."</li>",
                'link' => $data->top3_first_link,
                'image_alt_text' => $data->top3_first_image_alt_text,
            ],
            [
                'image' => StaticPage::getMediaField('new-casino', 'top3_second_image'),
                'content' => "<li>".str_replace(PHP_EOL, "</li><li>", $data->top3_second_content)."</li>",
                'link' => $data->top3_second_link,
                'image_alt_text' => $data->top3_second_image_alt_text,
            ],
            [
                'image' => StaticPage::getMediaField('new-casino', 'top3_third_image'),
                'content' => "<li>".str_replace(PHP_EOL, "</li><li>", $data->top3_third_content)."</li>",
                'link' => $data->top3_third_link,
                'image_alt_text' => $data->top3_third_image_alt_text,
            ],
        ];
        $top3_casinos = json_decode(json_encode($top3_casinos));

        $faq_questions_ids = implode(',', @json_decode(StaticPage::getField('new-casino', 'faqs'), true) ?? []);
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null; 

        $games_ids = implode(',', @json_decode(StaticPage::getField('new-casino', 'games'), true) ?? []);
        $games = $games_ids ? Game::select()
            ->whereRaw("`id` IN ($games_ids)")
            ->orderByRaw("FIELD(id, $games_ids)")
            ->get(): null;     

        return view('frontend.new-casinos', compact('data', 'casinos', 'top3_casinos','popular_casinos','faq_questions', 'games'));
    }

}
