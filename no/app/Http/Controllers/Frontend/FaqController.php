<?php

namespace App\Http\Controllers\Frontend;

use App\FaqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\StaticPage;
use App\Casino;

class FaqController extends Controller
{
    public function index(Request $request)
    {
      if( $request->ajax() ){
          $faq_questions =  FaqQuestion::select()->where('question', 'LIKE','%'.$request->search."%")->get();
          $faq_head ="";
          return view('partials.faq', compact('faq_questions','faq_head'));
      }
      else{
        $data = StaticPage::getAllFields('faq');
        $faq_questions = FaqQuestion::select()->get();
        $current_country = nj_get_current_country();

        $casinos_ids = implode(',', @json_decode(StaticPage::getField('faq', 'popular_casinos'), true) ?? []);
        $casinos = Casino::select()->whereRaw("`id` IN ($casinos_ids)")->orderByRaw("FIELD(id, $casinos_ids)");
        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }

        $casinos = $casinos_ids ? $casinos->get(): null;
        return view('frontend.faq', compact('data','faq_questions','casinos'));
      }

    }
}
