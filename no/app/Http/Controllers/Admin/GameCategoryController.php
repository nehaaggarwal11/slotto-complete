<?php

namespace App\Http\Controllers\Admin;

use App\GameCategory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGameCategoryRequest;
use App\Http\Requests\UpdateGameCategoryRequest;
use App\Http\Requests\MassDestroyGameCategoryRequest;
use Gate;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class GameCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //abort_if(Gate::denies('game_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $game_category = GameCategory::all();
        return view('admin.gameCategories.index', compact('game_category'));
    }

    public function create()
    {
        //abort_if(Gate::denies('game_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gameCategories.create');
    }

    public function store(StoreGameCategoryRequest $request)
    {
        $data = $request->all();
        $game_category = GameCategory::create($data);

        return redirect()->route('admin.game-categories.index');
    }


    public function edit(GameCategory $game_category)
    {
        //abort_if(Gate::denies('game_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gameCategories.edit', compact('game_category'));
    }

    public function update(UpdateGameCategoryRequest $request, GameCategory $game_category)
    {
        $data = $request->all();
        $game_category->update($data);

        return redirect()->back();
    }

    public function destroy(GameCategory $game_category)
    {
        //abort_if(Gate::denies('game_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $game_category->delete();

        return back();
    }

    public function massDestroy(MassDestroyGameCategoryRequest $request)
    {
        GameCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
