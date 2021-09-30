<?php

namespace App\Http\Controllers\Frontend;

use App\Game;
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
        $comments = Comment::query()
            ->select('name', 'comment', 'created_at')
            ->where('news_id', $news->id)
            ->where('status', 'active')
            ->latest()
            ->get();


        $similar_news = News::select()->orderBy('id', 'desc')->get();

        $latest_news = News::all();

         if($news->id == $latest_news->last()->id){
             $latest_news = News::orderBy('id','desc')->skip(1)->take(1)->get(  );
         }
         else{
             $latest_news = News::all();
         }

         $latest_games = Game::latest()->take(4)->get();


        $faq_questions_ids = implode(',', @json_decode($news->faqs, true) ?? []);
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null;

        return view('frontend.news', compact('news','latest_news','latest_games','comments','date','casinos','similar_news','faq_questions'));
    }
    public function comment(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'comment' => 'required|string',
        ]);
        $news = News::query()->where('slug', $slug)->firstOrFail();
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->news_id = $news->id;
        $comment->save();
        return redirect()->to(route('frontend.news', $news->slug).'#add-comment')->with('comment_success', 'Comment Submit successfully');
    }
}
