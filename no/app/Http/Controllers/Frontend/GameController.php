<?php

namespace App\Http\Controllers\Frontend;

use App\Game;
use App\Casino;
use App\Software;
use App\FaqQuestion;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request, $slug)
    {
        //$slug = str_replace('-online-slot','',$slug);
        $game = Game::where('slug', $slug)->firstOrFail();

        $current_country = nj_get_current_country();

        $cas = Software::where('title', $game->provider)->first();

        $casinos_ids = implode(',', @json_decode($cas->popular_casinos, true) ?? []);

        $casinos = Casino::select()->whereRaw("`id` IN ($casinos_ids)")->orderByRaw("FIELD(id, $casinos_ids)");


        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }

        $casinos = $casinos_ids ? $casinos->get(): null;

        $similar_games_ids = implode(',', @json_decode($game->similar_games, true) ?? []);
        $similar_games = $similar_games_ids ? Game::select('id', 'name', 'slug', 'logo_alt_text')
            ->whereRaw("`id` IN ($similar_games_ids)")
            ->orderByRaw("FIELD(id, $similar_games_ids)")
            ->get(): null;

        $faq_questions_ids = implode(',', @json_decode($game->faqs, true) ?? []);
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null;

        $slots = Game::select('id', 'name', 'slug', 'logo_alt_text')->where('provider',$game->provider)->where('provider','!=','')->get();
        return view('frontend.game', compact('game','similar_games','casinos','faq_questions','slots'));
    }
}
