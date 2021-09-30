<?php

namespace App\Http\Controllers\Frontend;

use App\Game;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request, $id, $slug=null)
    {
        $games = Game::findOrFail($id);
        abort_if($slug != $games->slug, 404);
        return view('frontend.game', compact('games'));
    }
}
