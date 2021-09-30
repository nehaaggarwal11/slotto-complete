<?php

namespace App\Http\Controllers\Frontend;

use App\Game;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\StaticPage;
use App\Casino;
use App\GameCategory;
use App\FaqQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AllGameController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if($type = $request->input('rtp') || $type = $request->input('provider') || $type = $request->input('volatilitet') ||$type = $request->input('gpi') || $game_query = $request->input('game_category') || $type = $request->input('search')) {
                abort(404);
            }
              $data = StaticPage::getAllFields('all-game');
              $game_category = GameCategory::select('id','name')->get();

              $games_ids = implode(',', @$data->games ?? []);
              $games   = Game::select('id','slug','name', 'rtp','provider','volatilitet', 'gpi', 'logo_alt_text');
              $current_country = nj_get_current_country();
              $casinos_ids = implode(',', @json_decode(StaticPage::getField('all-game', 'popular_casinos'), true) ?? []);
              $casinos = Casino::select()->whereRaw("`id` IN ($casinos_ids)")->orderByRaw("FIELD(id, $casinos_ids)");
              if($current_country){
                  $casinos = $casinos->countries([$current_country]);
              }

              $casinos = $casinos_ids ? $casinos->get(): null;

              $faq_questions_ids = implode(',', @json_decode(StaticPage::getField('all-game', 'faqs'), true) ?? []);
              $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
                  ->whereRaw("`id` IN ($faq_questions_ids)")
                  ->orderByRaw("FIELD(id, $faq_questions_ids)")
                  ->get(): null;

              $games_data = Game::select('rtp','provider','volatilitet','gpi','game_category')
                  ->orderByRaw("FIELD(rtp, 'Low', 'Medium', 'High')")
                  ->orderByRaw("FIELD(volatilitet, 'Low', 'Medium', 'High')")
                  ->orderByRaw("FIELD(gpi, 'Low', 'Medium', 'High')")->get();

              $games = $games_ids ? $games->whereRaw("`id` IN ($games_ids)")
                  ->orderByRaw("FIELD(id, $games_ids)")
                  ->get(): null;

              return view('frontend.all-games', compact('data', 'games_data','games','casinos', 'game_category', 'faq_questions'));
    }

    public function filter(Request $request)
    {
      if( $request->ajax() ){
          $games =  Game::select()->where('name', 'LIKE','%'.$request->search."%")->get();
          return view('partials.game-card', compact('games'));
      }
      else {
            $data = StaticPage::getAllFields('all-game');
            $game_category = GameCategory::select('id','name')->get();

            $games_ids = implode(',', @$data->games ?? []);
            $games   = Game::select('id','slug','name', 'rtp','provider','volatilitet', 'gpi', 'logo_alt_text');
            $current_country = nj_get_current_country();
            $casinos_ids = implode(',', @json_decode(StaticPage::getField('all-game', 'popular_casinos'), true) ?? []);
            $casinos = Casino::select()->whereRaw("`id` IN ($casinos_ids)")->orderByRaw("FIELD(id, $casinos_ids)");
            if($current_country){
                $casinos = $casinos->countries([$current_country]);
            }

            $casinos = $casinos_ids ? $casinos->get(): null;

            $faq_questions_ids = implode(',', @json_decode(StaticPage::getField('all-game', 'faqs'), true) ?? []);
            $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
                ->whereRaw("`id` IN ($faq_questions_ids)")
                ->orderByRaw("FIELD(id, $faq_questions_ids)")
                ->get(): null;

            $games_data = Game::select('rtp','provider','volatilitet','gpi','game_category')
                ->orderByRaw("FIELD(rtp, 'Low', 'Medium', 'High')")
                ->orderByRaw("FIELD(volatilitet, 'Low', 'Medium', 'High')")
                ->orderByRaw("FIELD(gpi, 'Low', 'Medium', 'High')")->get();


            if($type = $request->input('rtp')){
                $games = $games->where('rtp', $type);
            }
            if($type = $request->input('provider')) {
                $games = $games->where('provider', $type);
            }
            if($type = $request->input('volatilitet')) {
                $games = $games->where('volatilitet', $type);
            }
            if($type = $request->input('gpi')) {
                $games = $games->where('gpi', $type);
            }
            if($game_query = $request->input('game_category')) {
                $game_category_ids = GameCategory::select('id')->whereIn('name', $game_query)->get()->pluck('id');
                foreach ($game_category_ids as $gc_id){
                    $games = $games->where('game_category', "LIKE", '%"'.$gc_id.'"%');
                }
            }
            if($type = $request->input('search')) {
                $games = $games->where('name', $type);
            }
            $games = $games_ids ? $games->whereRaw("`id` IN ($games_ids)")
                ->orderByRaw("FIELD(id, $games_ids)")
                ->get(): null;

            return view('frontend.all-games', compact('data', 'games_data','games','casinos', 'game_category', 'faq_questions'));
      }
    }

}
