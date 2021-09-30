<?php

namespace App\Http\Controllers\Frontend;

use App\News;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\StaticPage;
use App\Casino;
use App\FaqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AllNewsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
      if( $request->ajax() ){
          $news =  News::select()->where('name', 'LIKE','%'.$request->search."%")->orderBy('id', 'desc')->get();
          return view('frontend.search-news-ajax', compact('news'));
      }
      else{


        $data = StaticPage::getAllFields('all-news');
        $data_news = StaticPage::getAllFields('news');
        $current_country = nj_get_current_country();

        $casinos_ids = implode(',', @json_decode(StaticPage::getField('news', 'popular_casinos'), true) ?? []);
        $casinos = Casino::select()->whereRaw("`id` IN ($casinos_ids)")->orderByRaw("FIELD(id, $casinos_ids)");


        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }

        $casinos = $casinos_ids ? $casinos->get(): null;
        $news = News::select()
        ->orderBy('id', 'desc')->get();
        $news_category = News::select('category')->get();
        $news_other = News::select()
        ->orderBy('id', 'desc')->get();

        if($type = $request->input('category')){
            $news = $news->where('category', $type);
        }

        $faq_questions_ids = implode(',', @json_decode(StaticPage::getField('news', 'faqs'), true) ?? []);
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null;

        return view('frontend.all-news', compact('data','data_news', 'news','news_category', 'news_other','casinos','faq_questions'));
      }
    }

}
