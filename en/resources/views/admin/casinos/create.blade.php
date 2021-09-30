@extends('layouts.admin')
@section('styles')

<link rel="stylesheet" href="{{ asset('asset/admin/css/jquery.minicolors.css')}}">
@endsection
@section('content')

@php
    $all_casinos = \App\Casino::all();
    $all_faqQuestions = \App\FaqQuestion::all();
    $all_games = \App\Game::all();
@endphp

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.casino.title_singular') }}
    </div>
</div>

<form method="POST" action="{{ route("admin.casinos.store") }}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">Casino</div>
        <div class="card-body">
            <div class="form-group">
                <label for="color_picker">{{ trans('cruds.casino.fields.color_picker') }}</label>
                <input id="swatches" class="form-control demo" name="bg_color" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#bcaaa4|#eeeeee|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e" value="#abcdef">
                @if($errors->has('color_picker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('color_picker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.color_picker_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="name">{{ trans('cruds.casino.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.casino.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_page_slider_title">{{ trans('cruds.casino.fields.home_page_slider_title') }}</label>
                <input class="form-control {{ $errors->has('home_page_slider_title') ? 'is-invalid' : '' }}" type="text" name="home_page_slider_title" id="home_page_slider_title" value="{{ old('home_page_slider_title', '') }}">
                @if($errors->has('home_page_slider_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('home_page_slider_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.home_page_slider_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="small_description">{{ trans('cruds.casino.fields.small_description') }}</label>
                <input class="form-control {{ $errors->has('small_description') ? 'is-invalid' : '' }}" type="text" name="small_description" id="small_description" value="{{ old('small_description', '') }}">
                @if($errors->has('small_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('small_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.small_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rating">{{ trans('cruds.casino.fields.rating') }}</label>
                <input class="form-control {{ $errors->has('rating') ? 'is-invalid' : '' }}" type="number" name="rating" id="rating" value="{{ old('rating', '') }}" min="0" max="5">
                @if($errors->has('rating'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rating') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.casino.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" cols="10" rows="5">{{ old('description', '') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="info">{{ trans('cruds.casino.fields.tandc') }}</label>
                <input class="form-control {{ $errors->has('info') ? 'is-invalid' : '' }}" type="text" name="info" id="info" value="{{ old('info', '') }}">
                @if($errors->has('info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.tandc_helper') }}</span>
            </div>
            <!-- <div class="form-group">
                <label for="spins">{{ trans('cruds.casino.fields.spins') }}</label>
                <input class="form-control {{ $errors->has('spins') ? 'is-invalid' : '' }}" type="number" name="spins" id="spins" value="{{ old('spins', '') }}">
                @if($errors->has('spins'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spins') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.spins_helper') }}</span>
            </div> -->

            {{--<div class="form-group">
                <label for="spins_text">{{ trans('cruds.casino.fields.spins_text') }}</label>
                <input class="form-control {{ $errors->has('spins_text') ? 'is-invalid' : '' }}" type="text" name="spins_text" id="spins_text" value="{{ old('spins_text', '') }}">
                @if($errors->has('spins_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spins_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.spins_text_helper') }}</span>
            </div>--}}


            <!-- <div class="form-group">
                <label for="bonus">{{ trans('cruds.casino.fields.bonus') }}</label>
                <input class="form-control {{ $errors->has('bonus') ? 'is-invalid' : '' }}" type="number" name="bonus" id="bonus" value="{{ old('bonus', '') }}">
                @if($errors->has('bonus'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bonus') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.bonus_helper') }}</span>
            </div> -->

            <div class="form-group">
                <label for="bonus_text">{{ trans('cruds.casino.fields.bonus_text') }}</label>
                <input class="form-control {{ $errors->has('bonus_text') ? 'is-invalid' : '' }}" type="text" name="bonus_text" id="bonus_text" value="{{ old('bonus_text', '') }}">
                @if($errors->has('bonus_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bonus_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.bonus_text_helper') }}</span>
            </div>

            {{--<div class="form-group">
                <label for="wagering_requirements">{{ trans('cruds.casino.fields.wagering_requirements') }}</label>
                <input class="form-control {{ $errors->has('wagering_requirements') ? 'is-invalid' : '' }}" type="number" name="wagering_requirements" id="wagering_requirements" value="{{ old('wagering_requirements', '') }}">
                @if($errors->has('wagering_requirements'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wagering_requirements') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.wagering_requirements_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="wagering_requirements_text">{{ trans('cruds.casino.fields.wagering_requirements_text') }}</label>
                <input class="form-control {{ $errors->has('wagering_requirements_text') ? 'is-invalid' : '' }}" type="text" name="wagering_requirements_text" id="wagering_requirements_text" value="{{ old('wagering_requirements_text', '') }}">
                @if($errors->has('wagering_requirements_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wagering_requirements_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.wagering_requirements_text_helper') }}</span>
            </div>--}}

            <div class="form-group">
                <label for="banner_info">{{ trans('cruds.casino.fields.banner_info') }}</label>
                <input class="form-control {{ $errors->has('banner_info') ? 'is-invalid' : '' }}" type="text" name="banner_info" id="banner_info" value="{{ old('banner_info', '') }}">
                @if($errors->has('banner_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.banner_info_helper') }}</span>
            </div>

            {{--<div class="form-group">
                <label for="popular_casino_hover_info">{{ trans('cruds.casino.fields.popular_casino_hover_info') }}</label>
                <input class="form-control {{ $errors->has('popular_casino_hover_info') ? 'is-invalid' : '' }}" type="text" name="popular_casino_hover_info" id="popular_casino_hover_info" value="{{ old('popular_casino_hover_info', '') }}">
                @if($errors->has('popular_casino_hover_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_casino_hover_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.popular_casino_hover_info_helper') }}</span>
            </div>--}}

            <div class="form-group">
                <label for="overview">{{ trans('cruds.casino.fields.overview') }}</label>
                <textarea class="form-control ckeditor{{ $errors->has('overview') ? 'is-invalid' : '' }}" name="overview" id="editor">{!! old('overview', '') !!}</textarea>
                @if($errors->has('overview'))
                    <div class="invalid-feedback">
                        {{ $errors->first('overview') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.overview_helper') }}</span>

            </div>
            <div class="form-group">
                <label for="detail">{{ trans('cruds.casino.fields.detail') }}</label>
                <textarea class="form-control ckeditor{{ $errors->has('detail') ? 'is-invalid' : '' }}" name="detail" >{!! old('detail', '') !!}</textarea>
                @if($errors->has('detail'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detail') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.detail_helper') }}</span>

            </div>
            <div class="form-group">
                <label for="featured_image">{{ trans('cruds.casino.fields.featured_image') }} (recommended size  150px*150px)</label>
                <div class="needsclick dropzone {{ $errors->has('featured_image') ? 'is-invalid' : '' }}" id="featured_image-dropzone">
                </div>
                @if($errors->has('featured_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('featured_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.featured_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="featured_image_alt_text">{{ trans('cruds.casino.fields.featured_image_alt_text') }}</label>
                <input class="form-control {{ $errors->has('featured_image_alt_text') ? 'is-invalid' : '' }}" type="text" name="featured_image_alt_text" id="featured_image_alt_text" value="{{ old('featured_image_alt_text', '') }}">
                @if($errors->has('featured_image_alt_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('featured_image_alt_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.featured_image_alt_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo_image">{{ trans('cruds.casino.fields.logo_image') }}(recommended size   max-width:200px & max-height:150px)</label>
                <div class="needsclick dropzone {{ $errors->has('logo_image') ? 'is-invalid' : '' }}" id="logo_image-dropzone">
                </div>
                @if($errors->has('logo_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.logo_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo_image_alt_text">{{ trans('cruds.casino.fields.logo_image_alt_text') }}</label>
                <input class="form-control {{ $errors->has('logo_image_alt_text') ? 'is-invalid' : '' }}" type="text" name="logo_image_alt_text" id="logo_image_alt_text" value="{{ old('logo_image_alt_text', '') }}">
                @if($errors->has('logo_image_alt_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo_image_alt_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.logo_image_alt_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transparent_logo_image">{{ trans('cruds.casino.fields.transparent_logo_image') }} (recommended size  max-width:300px & max-height:200px)</label>
                <div class="needsclick dropzone {{ $errors->has('transparent_logo_image') ? 'is-invalid' : '' }}" id="transparent_logo_image-dropzone">
                </div>
                @if($errors->has('transparent_logo_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transparent_logo_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.transparent_logo_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transparent_logo_image_alt_text">{{ trans('cruds.casino.fields.transparent_logo_image_alt_text') }}</label>
                <input class="form-control {{ $errors->has('transparent_logo_image_alt_text') ? 'is-invalid' : '' }}" type="text" name="transparent_logo_image_alt_text" id="transparent_logo_image_alt_text" value="{{ old('transparent_logo_image_alt_text', '') }}">
                @if($errors->has('transparent_logo_image_alt_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transparent_logo_image_alt_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.transparent_logo_image_alt_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bg_image_color">{{ trans('cruds.casino.fields.bg_image_color') }}</label>
                <input id="swatches" class="form-control demo" name="bg_image_color" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#bcaaa4|#eeeeee|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e" value="#abcdef">
                @if($errors->has('bg_image_color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.bg_image_color_helper') }}</span>
            </div>
            <!-- <div class="form-group">
                <label for="bg_image">{{ trans('cruds.casino.fields.bg_image') }}(recommended size 870*260)</label>
                <div class="needsclick dropzone {{ $errors->has('bg_image') ? 'is-invalid' : '' }}" id="bg_image-dropzone">
                </div>
                @if($errors->has('bg_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.bg_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bg_image_alt_text">{{ trans('cruds.casino.fields.bg_image_alt_text') }}</label>
                <input class="form-control {{ $errors->has('bg_image_alt_text') ? 'is-invalid' : '' }}" type="text" name="bg_image_alt_text" id="bg_image_alt_text" value="{{ old('bg_image_alt_text', '') }}">
                @if($errors->has('bg_image_alt_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_alt_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.bg_image_alt_text_helper') }}</span>
            </div> -->

            <div class="form-group">
                <label for="popular_casino_heading">{{ trans('cruds.casino.fields.popular_casino_heading') }}</label>
                <input class="form-control {{ $errors->has('popular_casino_heading') ? 'is-invalid' : '' }}" type="text" name="popular_casino_heading" id="popular_casino_heading" value="{{ old('popular_casino_heading', @$casino->popular_casino_heading) }}">
                @if($errors->has('popular_casino_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_casino_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.popular_casino_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="popular_casino">{{ trans('cruds.casino.fields.popular_casino') }}</label>
                @php
                    $popular_casinos = old('popular_casinos', $data->popular_casinos ?? [])
                @endphp
                <select class="form-control custom_order select2_popular_casinos {{ $errors->has('popular_casinos') ? 'is-invalid' : '' }}" name="popular_casinos[]" id="popular_casinos" data-selected="{{ implode(",", $popular_casinos) }}" multiple required>
                    @foreach($popular_casinos as $casino_id)
                        @php
                            /**
                            * @var $casino_id from loop
                                */
                            $casino_popular = \App\Casino::find($casino_id)
                        @endphp
                        @if($casino_popular)
                            <option value="{{ $casino_popular->id }}">{{ $casino_popular->name }}</option>
                        @endif
                    @endforeach
                    @foreach($all_casinos as $casino_popular)
                        @if($casino_popular && !in_array($casino_popular->id, $popular_casinos))
                            <option value="{{ $casino_popular->id }}">{{ $casino_popular->name }}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('popular_casinos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_casinos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.popular_casino_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="faq_heading">{{ trans('cruds.casino.fields.faq_heading') }}</label>
                <input class="form-control {{ $errors->has('faq_heading') ? 'is-invalid' : '' }}" type="text" name="faq_heading" id="faq_heading">
                @if($errors->has('faq_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('faq_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.faq_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="faqs">{{ trans('cruds.casino.fields.faq') }}</label>
                @php
                    $faqs = old('faqs', $data->faqs ?? [])
                @endphp
                <select class="form-control custom_order select2_faq {{ $errors->has('faqs') ? 'is-invalid' : '' }}" name="faqs[]" id="faqs" data-selected="{{ implode(",", $faqs) }}" multiple required>
                    @foreach($faqs as $faq_id)
                        @php
                            /**
                            * @var $faq_id from loop
                                */
                            $faq = \App\FaqQuestion::find($faq_id)
                        @endphp
                        <option value="{{ $faq->id }}">{{ $faq->question }}</option>
                    @endforeach
                    @foreach($all_faqQuestions as $faq)
                        @if(!in_array($faq->id, $faqs))
                            <option value="{{ $faq->id }}">{{ $faq->question }}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('faqs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('faqs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.faq_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="games_heading">{{ trans('cruds.casino.fields.games_heading') }}</label>
                <input class="form-control {{ $errors->has('games_heading') ? 'is-invalid' : '' }}" type="text" name="games_heading" id="games_heading" value="{{ old('games_heading', @$casino->games_heading) }}">
                @if($errors->has('games_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('games_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.games_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="games">{{ trans('cruds.casino.fields.games') }}</label>
                @php
                    $games = explode(",", @$casino->games);
                @endphp
                <select class="form-control custom_order select2_games {{ $errors->has('games') ? 'is-invalid' : '' }}" name="games[]" id="games" software-selected="{{ implode(",", $games) }}" multiple>

                    @foreach($all_games as $game)
                        @if($game && !in_array($game->id, $games))
                            <option value="{{ $game->id }}">{{ $game->name }} - {{ $game->provider}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('games'))
                    <div class="invalid-feedback">
                        {{ $errors->first('games') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.casino.fields.games_helper') }}</span>
            </div>
        </div>
    </div>
    @php
        $seo_title = $seo_keyword = $seo_description = '';
        $countries = [];
    @endphp
    @include('partials.seoFields', compact('errors', 'seo_title', 'seo_keyword', 'seo_description'))
    @include('partials.countriesFields', compact('errors', 'countries'))
    @include('partials.saveWideButton')
</form>



@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $('select.select2_popular_casinos').select2_sortable({
            });
            $('select.select2_faq').select2_sortable({
            });
            $('select.select2_games').select2_sortable({
            });

            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '/en/admin/casinos/ckmedia', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() { reject(genericErrorText) });
                                        xhr.addEventListener('abort', function() { reject() });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({ default: response.url });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', {{ $casino->id ?? 0 }});
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter],
                    }
                );
            }

            // SUNEDITOR.create('editor_inline1', {
            //     mode: 'inline',
            //     display: 'block',
            //     width: '100%',
            //     height: '204',
            //     popupDisplay: 'full',
            //     buttonList: [
            //         ['font', 'fontSize', 'formatBlock'],
            //         ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
            //         ['codeView']
            //     ],
            //     placeholder: 'Start typing something...'
            // });
        });
    </script>
 <script>
	initSample();
</script>
    <script>
        Dropzone.options.featuredImageDropzone = {
            url: '{{ route('admin.casinos.storeMedia') }}',
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
                $('form').find('input[name="featured_image"]').remove()
                $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="featured_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                    @if(isset($casino) && $casino->featured_image)
                var file = {!! json_encode($casino->featured_image) !!}
                        this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $casino->featured_image->getUrl('thumb') }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
        Dropzone.options.logoImageDropzone = {
            url: '{{ route('admin.casinos.storeMedia') }}',
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
                $('form').find('input[name="logo_image"]').remove()
                $('form').append('<input type="hidden" name="logo_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="logo_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                    @if(isset($casino) && $casino->logo_image)
                var file = {!! json_encode($casino->logo_image) !!}
                        this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $casino->logo_image->getUrl('thumb') }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="logo_image" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
        Dropzone.options.transparentLogoImageDropzone = {
            url: '{{ route('admin.casinos.storeMedia') }}',
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
                $('form').find('input[name="transparent_logo_image"]').remove()
                $('form').append('<input type="hidden" name="transparent_logo_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="transparent_logo_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                    @if(isset($casino) && $casino->transparent_logo_image)
                var file = {!! json_encode($casino->transparent_logo_image) !!}
                        this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $casino->transparent_logo_image->getUrl('thumb') }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="transparent_logo_image" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
        Dropzone.options.bgImageDropzone = {
            url: '{{ route('admin.casinos.storeMedia') }}',
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
                $('form').find('input[name="bg_image"]').remove()
                $('form').append('<input type="hidden" name="bg_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="bg_image"]').remove()
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                    @if(isset($casino) && $casino->bg_image)
                var file = {!! json_encode($casino->bg_image) !!}
                        this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, '{{ $casino->bg_image->getUrl('thumb') }}')
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="bg_image" value="' + file.file_name + '">')
                this.options.maxFiles = this.options.maxFiles - 1
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="{{ asset('asset/admin/css/jquery.minicolors.js')}}"></script>
<script>
    $(document).ready( function() {
      $('.demo').each( function() {
        $(this).minicolors({
          control: $(this).attr('data-control') || 'hue',
          defaultValue: $(this).attr('data-defaultValue') || '',
          format: $(this).attr('data-format') || 'hex',
          keywords: $(this).attr('data-keywords') || '',
          inline: $(this).attr('data-inline') === 'true',
          letterCase: $(this).attr('data-letterCase') || 'lowercase',
          opacity: $(this).attr('data-opacity'),
          position: $(this).attr('data-position') || 'bottom',
          swatches: $(this).attr('data-swatches') ? $(this).attr('data-swatches').split('|') : [],
          change: function(value, opacity) {
            if( !value ) return;
            if( opacity ) value += ', ' + opacity;
            if( typeof console === 'object' ) {
              console.log(value);
            }
          },
          theme: 'bootstrap'
        });

      });

    });
</script>
@endsection
