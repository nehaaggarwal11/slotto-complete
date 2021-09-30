@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('asset/admin/css/jquery.minicolors.css')}}">
@endsection
@section('content')
@php
    $slide = \App\homeSlider::all();
@endphp
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.homeSlider.title_singular') }}
    </div>
</div>
<form method="POST" action="{{ route("admin.homeSlider.update", [$homeSlider->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card">
        <div class="card-header">GAME</div>
        <div class="card-body">
          <div class="form-group">
              <label for="Slider Title">{{ trans('cruds.homeSlider.fields.sTitle') }}</label><br>
              <input class="form-control" name="slide_title" type="text"placeholder="Add {{ trans('cruds.homeSlider.fields.sTitle') }}" required value="{{ old('slide_title',$homeSlider->slide_title) }}">
          </div>
          <div id="old_img_slider" class="form-group">
              <label for="homeSlider">{{ trans('cruds.homeSlider.fields.sliderImg') }}</label></br>
              <img width="300" alt="slider Img" src="{{asset($homeSlider->slider_img)}}">
          </div>
          <div class="form-group">
              <label for="slider_img">{{ trans('cruds.homeSlider.fields.AddNewImg') }}</label><br>
            <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
            </div>
          </div>

            <div class="form-group">
                <label for="homeSlider">{{ trans('cruds.homeSlider.fields.slider_button_link') }}</label>
                <textarea class="form-control {{ $errors->has('slider_button_link') ? 'is-invalid' : '' }}" name="slider_button_link" placeholder="http://abc.com" id="slider_button_link" >{{ old('slider_button_link',$homeSlider->slider_button_link) }}</textarea>
                @if($errors->has('slider_button_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('game_link') }}
                    </div>
                @endif
            </div>


            <div class="form-group">
                <label for="description">{{ trans('cruds.homeSlider.fields.sliderContent') }}</label>
                <textarea class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content',$homeSlider->content) !!}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="description">{{ trans('cruds.homeSlider.fields.slider_status') }}</label>
                <select class="form-control" name="status" id="slider_status">
                  @if($homeSlider->status == 'disable')
                    <option value="enable">Enable</option>
                    <option value="disable" selected>Disable</option>
                  @else
                  <option value="enable" selected>Enable</option>
                  <option value="disable">Disable</option>
                  @endif

                  </select>
            </div>


        </div>
    </div>
    @include('partials.saveWideButton')
</form>



@endsection


@section('scripts')

<script>
  var dadad ;
      function deleteImg(){
        var imgName = $('form').find('input[name="slider_imgs"]').val();
        $.ajax({
          type: "POST",
          url:'{{ route('admin.homeSlider.deleteMedia') }}',
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          data: {img : imgName},
          success: function(result){
              console.log(result);
              return result;
          }
        });
      }

      Dropzone.options.logoDropzone = {
          url: '{{ route('admin.homeSlider.storeMedia') }}',
          maxFilesize: 2, // MB
          acceptedFiles: '.jpeg,.jpg,.png,.gif',
          maxFiles: 1,
          addRemoveLinks: true,
          headers: {
              'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          params: {
              size: 2,
              width: 4086,
              height: 4096
          },
          success: function (file, response) {
              $('#old_img_slider').slideUp()
              $('form').append('<input type="hidden" name="slider_imgs" value="' + response.name + '">')
          },
          removedfile: function (file) {
            var imgDele = deleteImg();
              file.previewElement.remove()
              if (file.status !== 'error') {
                  $('form').find('input[name="slider_imgs"]').remove()
                  this.options.maxFiles = this.options.maxFiles + 1
              }
          }
      }
    </script>

<script src="http://code.jquery.com/jquery.min.js"></script>

@endsection
