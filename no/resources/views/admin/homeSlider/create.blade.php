@extends('layouts.admin')
@section('styles')

<link rel="stylesheet" href="{{ asset('asset/admin/css/jquery.minicolors.css')}}">
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.homeSlider.title_singular') }}
    </div>
</div>

<form method="POST" action="{{ route("admin.homeSlider.store") }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">Home Slider</div>
        <div class="card-body">
          <div class="form-group">
              <label for="Slider Title">{{ trans('cruds.homeSlider.fields.sTitle') }}</label><br>
              <input class="form-control" name="slide_title" type="text"placeholder="Add {{ trans('cruds.homeSlider.fields.sTitle') }}" required>
          </div>

            <div class="form-group">
                <label for="slider_img">{{ trans('cruds.homeSlider.fields.sliderImg') }}</label><br>
              <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
              </div>
            </div>
            <div class="form-group">
                <label for="game_link">{{ trans('cruds.homeSlider.fields.slider_button_link') }}</label>
                <textarea class="form-control {{ $errors->has('game_link') ? 'is-invalid' : '' }}" name="slider_button_link" id="game_link" placeholder="http://abc.com" value="{!! old('game_link', '') !!}" required></textarea>
                @if($errors->has('game_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('game_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.game.fields.game_link_helper') }}</span>
            </div>


            <div class="form-group">
                <label for="description">{{ trans('cruds.homeSlider.fields.sliderContent') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="content" id="description" placeholder="Slider Content..." required>{!! old('description', '') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.game.fields.description_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="game_category">{{ trans('cruds.homeSlider.fields.slider_status') }}</label>
                <select class="form-control" name="status" id="slider_status">
                    <option value="enable">Enable</option>
                    <option value="disable">Disable</option>
                  </select>
            </div>


        </div>
    </div>
    @include('partials.saveWideButton')
</form>



@endsection


@section('scripts')

    <script>
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
                $('form').find('input[name="slider_imgs"]').remove()
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
