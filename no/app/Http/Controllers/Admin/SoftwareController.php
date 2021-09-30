<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MassDestroySoftwareRequest;
use App\Software;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSoftwareRequest;
use App\Http\Requests\UpdateSoftwareRequest;
use App\Http\Requests\MassDestroySoftwareProviderRequest;
use Gate;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SoftwareController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        //abort_if(Gate::denies('software_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $software = Software::all();
        return view('admin.softwares.index',compact('software'));
    }

    public function create()
    {
        //abort_if(Gate::denies('software_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.softwares.create');
    }

    public function store(StoreSoftwareRequest $request)
    {
        $data = $request->all();
        $data['new_slots'] = json_encode($request->new_slots);
        $data['popular_slots'] = json_encode($request->popular_slots);
        $data['all_slots'] = json_encode($request->all_slots);
        $data['popular_casinos'] = json_encode($request->popular_casinos);
        $data['slug'] = Str::slug($request->title);
        $data['faqs'] = json_encode($request->faqs);
        $software = Software::create($data);
        if ($request->input('logo', false)) {
            if (!$software->logo || $request->input('logo') !== $software->logo->file_name) {
                $software->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($software->logo) {
            $software->logo->delete();
        }

        if ($request->input('bg_image', false)) {
            if (!$software->bg_image || $request->input('bg_image') !== $software->bg_image->file_name) {
                $software->addMedia(storage_path('tmp/uploads/' . $request->input('bg_image')))->toMediaCollection('bg_image');
            }
        } elseif ($software->bg_image) {
            $software->bg_image->delete();
        }

        if ($request->input('bg_image_logo', false)) {
            if (!$software->bg_image_logo || $request->input('bg_image_logo') !== $software->bg_image_logo->file_name) {
                $software->addMedia(storage_path('tmp/uploads/' . $request->input('bg_image_logo')))->toMediaCollection('bg_image_logo');
            }
        } elseif ($software->bg_image_logo) {
            $software->bg_image_logo->delete();
        }

        return redirect()->route('admin.softwares.index');

    }

    public function show(Software $software)
    {
        //abort_if(Gate::denies('software_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.softwares.show', compact('software'));
    }

    public function edit(Software $software)
    {
        //abort_if(Gate::denies('software_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.softwares.edit', compact('software'));
    }

    public function update(UpdateSoftwareRequest $request, Software $software)
    {
        $data = $request->all();
        $data['new_slots'] = json_encode($request->new_slots);
        $data['popular_slots'] = json_encode($request->popular_slots);
        $data['all_slots'] = json_encode($request->all_slots);
        $data['popular_casinos'] = json_encode($request->popular_casinos);
        $data['slug'] = Str::slug($request->title);
        $data['faqs'] = json_encode($request->faqs);

        if (!$request->input('new_slots', false)) {
            $software->new_slots = "";
        }

        if (!$request->input('popular_slots', false)) {
            $software->popular_slots = "";
        }

        if (!$request->input('all_slots', false)) {
            $software->all_slots = "";
        }

        if (!$request->input('popular_casinos', false)) {
            $software->popular_casinos = "";
        }

        if (!$request->input('faqs', false)) {
            $software->faqs = "";
        }

        $software->update($data);

        if ($request->input('logo', false)) {
            if (!$software->logo || $request->input('logo') !== $software->logo->file_name) {
                $software->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($software->logo) {
            $software->logo->delete();
        }

        if ($request->input('bg_image', false)) {
            if (!$software->bg_image || $request->input('bg_image') !== $software->bg_image->file_name) {
                $software->addMedia(storage_path('tmp/uploads/' . $request->input('bg_image')))->toMediaCollection('bg_image');
            }
        } elseif ($software->bg_image) {
            $software->bg_image->delete();
        }

        if ($request->input('bg_image_logo', false)) {
            if (!$software->bg_image_logo || $request->input('bg_image_logo') !== $software->bg_image_logo->file_name) {
                $software->addMedia(storage_path('tmp/uploads/' . $request->input('bg_image_logo')))->toMediaCollection('bg_image_logo');
            }
        } elseif ($software->bg_image_logo) {
            $software->bg_image_logo->delete();
        }

        return redirect()->back();
    }

    public function destroy(Software $software)
    {
        //abort_if(Gate::denies('software_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $software->delete();

        return back();
    }

    public function massDestroy(MassDestroySoftwareRequest $request)
    {
        Software::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        //abort_if(Gate::denies('software_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Software();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
