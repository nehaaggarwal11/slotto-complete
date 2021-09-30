<?php

namespace App\Http\Controllers\Frontend;

use App\Casino;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\StaticPage;
use App\FaqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CasinoBonusController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {

        $data = StaticPage::getAllFields('casino-bonus');

        $current_country = nj_get_current_country();
        $casinos_ids = implode(',', @json_decode(StaticPage::getField('casino-bonus', 'casinos'), true) ?? []);
        $casinos = Casino::select()->whereRaw("`id` IN ($casinos_ids)")
        ->orderByRaw("FIELD(id, $casinos_ids)");
        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }

        $casinos = $casinos_ids ? $casinos->get(): null;
        $tmc_casinos_ids = implode(',', @$data->tmc_casinos ?? []);
        $tmc_casinos = $tmc_casinos_ids ? Casino::select('id','link','name','slug','transparent_logo_image_alt_text')
            ->whereRaw("`id` IN ($tmc_casinos_ids)")
            ->orderByRaw("FIELD(id, $tmc_casinos_ids)")
            ->get(): null;
        $faq_questions_ids = implode(',', @json_decode(StaticPage::getField('casino-bonus', 'faqs'), true) ?? []);
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null;    

        return view('frontend.casino-bonus', compact('casinos','tmc_casinos', 'data','faq_questions'));
    }

}
