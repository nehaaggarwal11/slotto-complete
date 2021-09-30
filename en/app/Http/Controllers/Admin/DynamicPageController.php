<?php

namespace App\Http\Controllers\Admin;

use App\DynamicPage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDynamicPageRequest;
use App\Http\Requests\UpdateDynamicPageRequest;
use App\Http\Requests\MassDestroySoftwareProviderRequest;
use Gate;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DynamicPageController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('dynamic_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dynamic_page = DynamicPage::all();
        return view('admin.dynamicPages.index',compact('dynamic_page'));
    }

    public function create()
    {
        abort_if(Gate::denies('dynamic_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dynamicPages.create');
    }

    public function store(StoreDynamicPageRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['content'] = json_encode($request->content);
        $data['popular_casinos'] = json_encode($request->popular_casinos);
        $dynamic_page = DynamicPage::create($data);

        return redirect()->route('admin.dynamic-pages.index');
    }

    public function show(DynamicPage $dynamic_page)
    {
        abort_if(Gate::denies('dynamic_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dynamicPages.show', compact('dynamic_page'));
    }

    public function edit(DynamicPage $dynamic_page)
    {
        abort_if(Gate::denies('dynamic_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dynamicPages.edit', compact('dynamic_page'));
    }

    public function update(UpdateDynamicPageRequest $request, DynamicPage $dynamic_page)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['content'] = json_encode($request->content);
        $dynamic_page->update($data);               
        return redirect()->back();
    }

    public function destroy(DynamicPage $dynamic_page)
    {
        abort_if(Gate::denies('dynamic_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dynamic_page->delete();

        return back();
    }

    public function massDestroy(MassDestroyDynamicPageRequest $request)
    {
        DynamicPage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }


    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('dynamic_page_create') && Gate::denies('dynamic_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DynamicPages();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

}

?>