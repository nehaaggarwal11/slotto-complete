<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\homeSlider;
use Gate;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\StoreHomeSliderRequest;


class homeSliderController extends Controller
{
    //use MediaUploadingTrait;

    public function index()
    {
      $games = homeSlider::orderBy('order_id')->get();
       return view('admin.homeSlider.index', compact('games'));
    }

    public function create()
    {
        return view('admin.homeSlider.create');
    }

    public function store(StoreHomeSliderRequest $request)
    {
        $data['countries'] = implode(',', $request->countries ?? []);
        $img = 'storage/sliderImgs/'.$request->input('slider_imgs');
        $request->merge(['slider_img'=>$img]);
        $data = $request->all();
        $homeSlider = homeSlider::create($data);
        return redirect()->route('admin.homeSlider.index');
    }

    public function show(homeSlider $game)
    {
         return view('admin.homeSlider.show', compact('game'));
    }

    public function edit(homeSlider $homeSlider)
    {
      return view('admin.homeSlider.edit', compact('homeSlider'));
    }

    public function update(Request $request,$id)
    {
        $slider =   homeSlider::find($id);

        if(!empty($request->input('slider_imgs'))){
            $old_img = pathinfo($slider->slider_img,PATHINFO_BASENAME);
            Storage::delete('sliderImgs/'.$old_img);
            $img = 'storage/sliderImgs/'.$request->input('slider_imgs');
            $request->merge(['slider_img'=>$img]);
        }
          $data = $request->all();
         $slider->update($data);
       return redirect()->route('admin.homeSlider.index');
    }

    public function destroy(homeSlider $homeSlider)
    {
        $old_img = pathinfo($homeSlider->slider_img,PATHINFO_BASENAME);
        Storage::delete('sliderImgs/'.$old_img);
        $homeSlider->delete();
        return redirect()->route('admin.homeSlider.index');
    }

    public function addMedia(request $request){
      $img = $request->file('file');
      $img_name = $img->getClientOriginalName();
      $filename = date('his').'-'.$img_name;
      $img_name = $img->storePubliclyAs('sliderImgs',$filename );
      return response()->json([
            'name' => $filename,
        ]);
    }

    public function deleteMedia(request $request){
        if(Storage::delete('sliderImgs/'.$request->img)){
            echo "done";
        }
        else{
            echo "Fail";
        }

    }
}
