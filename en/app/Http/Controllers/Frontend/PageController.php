<?php

namespace App\Http\Controllers\Frontend;

use App\DynamicPage;
use App\Casino;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\LayoutPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request, $slug)
    {
        $dynamic_page = DynamicPage::where('slug', $slug)->firstOrFail();
        $casinos_ids = implode(',', @json_decode($dynamic_page->popular_casinos, true) ?? []);
        $casinos = $casinos_ids ? Casino::select()
            ->whereRaw("`id` IN ($casinos_ids)")
            ->orderByRaw("FIELD(id, $casinos_ids)")->get(): null;
        $current_country = nj_get_current_country();
        if($current_country){
            $casinos = $casinos->countries([$current_country]);
        }
        return view('frontend.page', compact('dynamic_page','casinos'));
    }

    public function layoutPage(Request $request, $slug)
    {
        $layout_page = LayoutPage::select('title', 'slug', 'html', 'css', 'js', 'seo_title', 'seo_keyword', 'seo_description')->where('slug', $slug)->firstOrFail();
        return view('frontend.layout-page', compact('layout_page'))->withShortcodes();
    }
}
