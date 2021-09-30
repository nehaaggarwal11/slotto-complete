<?php

namespace App\Http\Controllers\Frontend;

use App\Software;
use App\Game;
use App\Casino;
use App\FaqQuestion;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoftwareController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request, $slug)
    {
        $software = Software::where('slug', $slug)->firstOrFail();
        $current_country = nj_get_current_country();

        $casinos_ids = implode(',', @json_decode($software->popular_casinos, true) ?? []);
        $casinos = Casino::select()->whereRaw("`id` IN ($casinos_ids)")->orderByRaw("FIELD(id, $casinos_ids)");


        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }

        $casinos = $casinos_ids ? $casinos->get(): null;

        $new_slots_ids = implode(',', @json_decode($software->new_slots, true) ?? []);
        $new_slots = $new_slots_ids ? Game::select('id', 'name', 'slug', 'logo_alt_text')
            ->whereRaw("`id` IN ($new_slots_ids)")
            ->orderByRaw("FIELD(id, $new_slots_ids)")
            ->get(): null;

        $popular_slots_ids = implode(',', @json_decode($software->popular_slots, true) ?? []);
        $popular_slots = $popular_slots_ids ? Game::select('id', 'name', 'slug', 'logo_alt_text')
            ->whereRaw("`id` IN ($popular_slots_ids)")
            ->orderByRaw("FIELD(id, $popular_slots_ids)")
            ->get(): null;

        $all_slots_ids = implode(',', @json_decode($software->all_slots, true) ?? []);
        $all_slots = $all_slots_ids ? Game::select()
            ->whereRaw("`id` IN ($all_slots_ids)")
            ->orderByRaw("FIELD(id, $all_slots_ids)")
            ->get(): null;

        $faq_questions_ids = implode(',', @json_decode($software->faqs, true) ?? []);
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null;
        return view('frontend.software-game', compact('software','new_slots','popular_slots','all_slots','casinos','faq_questions'))->withShortcodes();
    }
}
