<?php

namespace App\Http\Controllers\Frontend;

use App\Casino;
use App\FaqQuestion;
use App\FaqQuestions;
use App\Game;
use App\News;
use App\homeSlider;
use App\GameCategory;
use App\Software;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\StaticPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\SubscriberEmail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        $current_country = nj_get_current_country();

        $slider_casinos_ids = implode(',', @json_decode(StaticPage::getField('home', 'slider_casinos'), true) ?? []);
        $slider_casinos = Casino::select('id','slug', 'home_page_slider_title','info','link', 'transparent_logo_image_alt_text')
            ->whereRaw("`id` IN ($slider_casinos_ids)")
            ->orderByRaw("FIELD(id, $slider_casinos_ids)");

        if($current_country){
            $slider_casinos = $slider_casinos->countries([$current_country]);
        }

        $slider_casinos = $slider_casinos_ids ? $slider_casinos->get(): null;

        $casinos_ids = implode(',', @json_decode(StaticPage::getField('home', 'casinos'), true) ?? []);
        $casinos = Casino::select(
            'id', 'bg_color', 'slug', 'name', 'spins', 'spins_text', 'bonus', 'countries',
            'bonus_text', 'wagering_requirements', 'wagering_requirements_text','rating',
            'small_description', 'info', 'link', 'seo_title', 'seo_keyword', 'seo_description', 'featured_image_alt_text'
        )->whereRaw("`id` IN ($casinos_ids)")
        ->orderByRaw("FIELD(id, $casinos_ids)");

        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }
        $casinos = $casinos_ids ? $casinos->get(): null;

        $new_casino_data = StaticPage::getAllFields('new-casino');

        $top3_casinos = [
            [
                'image' => StaticPage::getMediaField('new-casino', 'top3_first_image'),
                'content' => "<li>".str_replace(PHP_EOL, "</li><li>", $new_casino_data->top3_first_content)."</li>",
                'link' => $new_casino_data->top3_first_link,
                'image_alt_text' => $new_casino_data->top3_first_image_alt_text,
            ],
            [
                'image' => StaticPage::getMediaField('new-casino', 'top3_second_image'),
                'content' => "<li>".str_replace(PHP_EOL, "</li><li>", $new_casino_data->top3_second_content)."</li>",
                'link' => $new_casino_data->top3_second_link,
                'image_alt_text' => $new_casino_data->top3_second_image_alt_text,
            ],
            [
                'image' => StaticPage::getMediaField('new-casino', 'top3_third_image'),
                'content' => "<li>".str_replace(PHP_EOL, "</li><li>", $new_casino_data->top3_third_content)."</li>",
                'link' => $new_casino_data->top3_third_link,
                'image_alt_text' => $new_casino_data->top3_third_image_alt_text,
            ],
        ];
        $top3_casinos = json_decode(json_encode($top3_casinos));


        $games_ids = implode(',', @json_decode(StaticPage::getField('home', 'games'), true) ?? []);
        $games = $games_ids ? Game::select('id','name','slug','logo_alt_text')
            ->whereRaw("`id` IN ($games_ids)")
            ->orderByRaw("FIELD(id, $games_ids)")
            ->get(): null;

        $blog_ids = implode(',', @json_decode(StaticPage::getField('home', 'blog'), true) ?? []);
        $blog = $blog_ids ? News::select('id','name','slug', 'small_description', 'logo_img_alt_text')
            ->whereRaw("`id` IN ($blog_ids)")
            ->orderByRaw("FIELD(id, $blog_ids)")
            ->get(): null;


        $faq_questions_ids = implode(',', @json_decode(StaticPage::getField('home', 'faqs'), true) ?? []);
        $faq_questions = $faq_questions_ids ? FaqQuestion::select('id','question', 'answer')
            ->whereRaw("`id` IN ($faq_questions_ids)")
            ->orderByRaw("FIELD(id, $faq_questions_ids)")
            ->get(): null;

        $home_content = StaticPage::getAllFields('home');
        $newsletter = StaticPage::getAllFields('newsletter');

        $slider =  homeSlider::where('status','Enable')
            ->orderBy('order_id')
            ->get();

        return view('frontend.index', compact('slider_casinos', 'casinos', 'top3_casinos', 'games', 'blog', 'faq_questions', 'home_content','newsletter','slider'));
    }

    public function india(request $request)
   {
     if ($request->ajax()) {
          // dd($request);
          if ($request->type == "sub") {
              if ($request->title == "all-games" || $request->title == "slots" ||  $request->title == "game_category") {
                  if ($request->id == "-2") {
                      $games = Game::latest()->take(20)->get();
                  } else {
                      $games = Game::where('game_category', "LIKE", '%"' . $request->id . '"%')->get();
                  }
              } elseif ($request->title == "volatilitet_game" || $request->title == "provider") {
                  $games = Game::where($request->title, $request->data)->get();
              }
          } else {
              if ($request->data == "all-games") {
                  $games = Game::latest()->take(20)->get();
              }
              elseif($request->data == "slots" || $request->data == "game_category"){
                  $games = Game::where('game_category', "LIKE", '%"' .$request->actChild. '"%')->get();
              }
              elseif($request->data == "volatilitet_game" || $request->data == "provider"){
                  $games = Game::where($request->data, $request->actChildData)->get();
              }
              else{
                  $games = Game::inRandomOrder()->take(10)->get();
              }
          }
          return view('partials.game-card', compact('games'));
      } else {
           $page_content = StaticPage::getAllFields('india');
          $games = Game::latest()->take(20)->get();
          $game_cate = GameCategory::select('id', 'name')->get();
          $software = Software::select('id', 'title', 'slug')->get();
          return view('frontend.india', compact('games', 'page_content', 'game_cate', 'software'))->withShortcodes();
      }

   }

}
