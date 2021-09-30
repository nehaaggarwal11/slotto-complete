<?php

namespace App\Http\Controllers\Frontend;

use App\Software;
use App\StaticPage;
use App\Casino;
use App\FaqQuestion;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class AllSoftwareController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        $data = StaticPage::getAllFields('software');
        $softwares = Software::select()->get();

        $current_country = nj_get_current_country();
        
        $casinos_ids = implode(',', @json_decode(StaticPage::getField('software', 'popular_casinos'), true) ?? []);
        $casinos = Casino::select()->whereRaw("`id` IN ($casinos_ids)")
        ->orderByRaw("FIELD(id, $casinos_ids)");

        
        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }
        
        $casinos = $casinos_ids ? $casinos->get(): null;

        $faq_questions_ids = implode(',', @json_decode(StaticPage::getField('software', 'faqs'), true) ?? []);
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null; 

        return view('frontend.software', compact('softwares','data', 'casinos', 'faq_questions'));
    }

    public function search(Request $request)
    {
        if( $request->ajax() ){
            $softwares =  Software::select()->where('title', 'LIKE','%'.$request->search."%")->get();
            return view('frontend.search-softwares-ajax', compact('softwares'));
        }
    }
}
