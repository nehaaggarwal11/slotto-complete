<?php

namespace App\Http\Controllers\Frontend;

use App\Casino;
use App\FaqQuestion;
use App\Game;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CasinoController extends Controller
{
    use MediaUploadingTrait;

    // public function index(Request $request, $slug)
    // {
    //     $casino = Casino::where('slug', $slug)->firstOrFail();
    //     return view('frontend.casino', compact('casino'));
    // }

    public function index(Request $request, $slug)
    {
        $casino = Casino::where('slug', $slug)->firstOrFail();

        $current_country = nj_get_current_country();
        $popular_casinos_ids = implode(',', @json_decode($casino->popular_casinos, true) ?? []);
        $popular_casino = Casino::whereRaw("`id` IN ($popular_casinos_ids)")->orderByRaw("FIELD(id, $popular_casinos_ids)");


        if($current_country){
            $popular_casino = $popular_casino->countries([$current_country]);
        }

        $popular_casino = $popular_casinos_ids ? $popular_casino->get(): null;

        $faq_questions_ids = implode(',', @json_decode($casino->faqs, true) ?? []);
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null;

        $games_ids = implode(',', @json_decode($casino->games, true) ?? []);
        $games = $games_ids ? Game::select('id', 'name', 'slug', 'logo_alt_text')
            ->whereRaw("`id` IN ($games_ids)")
            ->orderByRaw("FIELD(id, $games_ids)")
            ->get(): null;    

        return view('frontend.casino', compact('casino','popular_casino','faq_questions','games'));
    }
}
