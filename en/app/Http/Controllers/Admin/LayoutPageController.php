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
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LayoutPageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('layout_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $layoutPages = LayoutPage::all();

        return view('admin.layoutPages.index', compact('layoutPages'));
    }

    public function create()
    {
        abort_if(Gate::denies('layout_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $is_edit = false;
        return view('admin.layoutPages.manage', compact('is_edit'));
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
        abort_if(Gate::denies('layout_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.layoutPages.show', compact('layoutPage'));
    }

    public function edit(LayoutPage $layoutPage)
    {
        abort_if(Gate::denies('layout_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $is_edit = true;
        return view('admin.layoutPages.manage', compact('layoutPage', 'is_edit'));
    }

    public function update(UpdateLayoutPageRequest $request, LayoutPage $layout_page)
    {
        $data = $request->all();
        $data['slug'] = $data['slug'] ?? Str::slug($request->title);
        $layout_page->update($data);
        return back();
    }

    public function destroy(LayoutPage $layout_page)
    {
        abort_if(Gate::denies('layout_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $layout_page->delete();

        return back();
    }

    public function massDestroy(MassDestroyLayoutPageRequest $request)
    {
        LayoutPage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
