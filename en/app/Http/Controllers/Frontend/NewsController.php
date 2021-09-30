<?php

namespace App\Http\Controllers\Frontend;

use App\News;
use App\Comment;
use App\Casino;
use App\FaqQuestion;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NewsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request, $slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $current_country = nj_get_current_country();        
        $casinos_ids = implode(',', @json_decode($news->popular_casinos, true) ?? []);
        $casinos = Casino::select()->whereRaw("`id` IN ($casinos_ids)")
        ->orderByRaw("FIELD(id, $casinos_ids)");        
        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }
        
        $casinos = $casinos_ids ? $casinos->get(): null;
        $date = Carbon::now();
        $comments = Comment::select()->where('news_id', $news->id)->get();

        $similar_news_ids = implode(',', @json_decode($news->similar_news, true) ?? []);
        $similar_news = $similar_news_ids ? News::select()
            ->whereRaw("`id` IN ($similar_news_ids)")
            ->orderByRaw("FIELD(id, $similar_news_ids)")
            ->get(): null;

        $faq_questions_ids = implode(',', @json_decode($news->faqs, true) ?? []);
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null;      
          
        return view('frontend.news', compact('news','comments','date','casinos','similar_news','faq_questions'));
    }
    public function comment(Request $request)
    {
        $comment = Comment::create($request->all());
        return back()->with('success', 'Comment Submit successfully');
    }
}
