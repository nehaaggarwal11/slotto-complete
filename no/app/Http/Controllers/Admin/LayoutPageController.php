<?php

namespace App\Http\Controllers\Admin;

use App\LayoutPage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLayoutPageRequest;
use App\Http\Requests\StoreLayoutPageRequest;
use App\Http\Requests\UpdateLayoutPageRequest;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LayoutPageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //abort_if(Gate::denies('layout_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $layoutPages = LayoutPage::all();

        return view('admin.layoutPages.index', compact('layoutPages'));
    }

    public function create(LayoutPage $layoutPage)
    {
        //abort_if(Gate::denies('layout_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $is_edit = false;
        $gjs_assets = [];
        return view('admin.layoutPages.manage', compact('layoutPage','is_edit', 'gjs_assets'));
    }

    public function store(StoreLayoutPageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = $data['slug'] ?? Str::slug($request->title);
        $layout_page = LayoutPage::create($data);

        return redirect()->route('admin.layout-pages.index');

    }

    public function show(LayoutPage $layoutPage)
    {
        //abort_if(Gate::denies('layout_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.layoutPages.show', compact('layoutPage'));
    }

    public function edit(LayoutPage $layoutPage)
    {
        //abort_if(Gate::denies('layout_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $is_edit = true;
        $gjs_assets = [];
        //$model = new \App\LayoutPage;
        //$model->id = 0;
        //$model->exists = true;
        //$gjs_assets_files = $model->getMedia('gjs_assets');
        //foreach($gjs_assets_files as $file) {
        //    $gjs_assets[] = url($file->getUrl());
        //}
        return view('admin.layoutPages.manage', compact('layoutPage', 'is_edit', 'gjs_assets'));
    }

    public function update(UpdateLayoutPageRequest $request, LayoutPage $layout_page)
    {
        $data = $request->all();
        $data['slug'] = $data['slug'] ?? Str::slug($request->title);
        $layout_page->update($data);
        return back();
    }

    public function copy(LayoutPage $layout_page)
    {
        $title = $layout_page->title . ' - Copied on '.date('Y-m-d H:i:s');
        $slug = Str::slug($title);
        $new_layout_page = $layout_page->replicate();
        $new_layout_page->title = $title;
        $new_layout_page->slug = $slug;
        $new_layout_page->save();
        return redirect()->route('admin.layout-pages.edit', $new_layout_page->id);
    }

    public function destroy(LayoutPage $layout_page)
    {
        //abort_if(Gate::denies('layout_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $layout_page->delete();

        return back();
    }

    public function massDestroy(MassDestroyLayoutPageRequest $request)
    {
        //abort_if(Gate::denies('layout_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        LayoutPage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @throws FileIsTooBig
     * @throws DiskDoesNotExist
     * @throws FileDoesNotExist
     */
    public function gjsAssets(Request $request)
    {
        //abort_if(Gate::denies('layout_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if($request->method() === 'POST'){
            $model = new LayoutPage();
            $model->id = $request->input('crud_id', 0);
            $model->exists = true;
            try {
                $media = $model->addMediaFromRequest('file')->toMediaCollection('gjs_assets', 'public');
            } catch (DiskDoesNotExist | FileDoesNotExist | FileIsTooBig $e) {
            }
            return response()->json(["data" => [url($media->getUrl())]]);
        }
        return false;
    }
}
