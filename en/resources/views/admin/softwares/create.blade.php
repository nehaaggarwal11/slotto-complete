@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('asset/admin/css/jquery.minicolors.css')}}">
@endsection
@section('content')
@php
    $all_games = \App\Game::all();
    $all_popular_software = \App\Software::all();
    $all_casinos = \App\Casino::all();
    $all_faqQuestions = \App\FaqQuestion::all();
@endphp
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.software.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.softwares.store") }}" enctype="multipart/form-software">
            @csrf

            <div class="form-group">
                <label for="color_picker">{{ trans('cruds.software.fields.color_picker') }}</label>
                <input id="swatches" class="form-control demo" name="bg_color" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#bcaaa4|#eeeeee|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e" value="#abcdef">
                @if($errors->has('color_picker'))
                    <div class="invalid-feedback">
                        {{ $errors->first('color_picker') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.color_picker_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.software.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', @$software->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.software.fields.logo') }} (recommended size 150px*150px)</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.logo_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="logo_alt_text">{{ trans('cruds.software.fields.logo_alt_text') }}</label>
                <input class="form-control {{ $errors->has('logo_alt_text') ? 'is-invalid' : '' }}" type="text" name="logo_alt_text" id="logo_alt_text" value="{{ old('logo_alt_text', @$software->logo_alt_text) }}">
                @if($errors->has('logo_alt_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo_alt_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.logo_alt_text_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="bg_image_color">{{ trans('cruds.software.fields.bg_image_color') }}</label>
                <input id="swatches" class="form-control demo" name="bg_image_color" data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#bcaaa4|#eeeeee|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e" value="#abcdef">
                @if($errors->has('bg_image_color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.bg_image_color_helper') }}</span>
            </div>

            <!-- <div class="form-group">
                <label for="bg_image">{{ trans('cruds.software.fields.bg_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bg_image') ? 'is-invalid' : '' }}" id="bg_image-dropzone">
                </div>
                @if($errors->has('bg_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.bg_image_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="bg_image_alt_text">{{ trans('cruds.software.fields.bg_image_alt_text') }}</label>
                <input class="form-control {{ $errors->has('bg_image_alt_text') ? 'is-invalid' : '' }}" type="text" name="bg_image_alt_text" id="bg_image_alt_text" value="{{ old('bg_image_alt_text', @$software->bg_image_alt_text) }}">
                @if($errors->has('bg_image_alt_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_alt_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.bg_image_alt_text_helper') }}</span>
            </div> -->

            <div class="form-group">
                <label for="bg_image_logo">{{ trans('cruds.software.fields.bg_image_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bg_image_logo') ? 'is-invalid' : '' }}" id="bg_image_logo-dropzone">
                </div>
                @if($errors->has('bg_image_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.bg_image_logo_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="bg_image_logo_alt_text">{{ trans('cruds.software.fields.bg_image_logo_alt_text') }}</label>
                <input class="form-control {{ $errors->has('bg_image_logo_alt_text') ? 'is-invalid' : '' }}" type="text" name="bg_image_logo_alt_text" id="bg_image_logo_alt_text" value="{{ old('bg_image_logo_alt_text', @$software->bg_image_logo_alt_text) }}">
                @if($errors->has('bg_image_logo_alt_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_logo_alt_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.bg_image_logo_alt_text_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="bg_image_text">{{ trans('cruds.software.fields.bg_image_text') }}</label>
                <input class="form-control {{ $errors->has('bg_image_text') ? 'is-invalid' : '' }}" type="text" name="bg_image_text" id="bg_image_text" value="{{ old('bg_image_text', @$software->bg_image_text) }}">
                @if($errors->has('bg_image_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.bg_image_text_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="bg_image_button_text">{{ trans('cruds.software.fields.bg_image_button_text') }}</label>
                <input class="form-control {{ $errors->has('bg_image_button_text') ? 'is-invalid' : '' }}" type="text" name="bg_image_button_text" id="bg_image_button_text" value="{{ old('bg_image_button_text', @$software->bg_image_button_text) }}">
                @if($errors->has('bg_image_button_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_button_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.bg_image_button_text_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="bg_image_button_link">{{ trans('cruds.software.fields.bg_image_button_link') }}</label>
                <input class="form-control {{ $errors->has('bg_image_button_link') ? 'is-invalid' : '' }}" type="text" name="bg_image_button_link" id="bg_image_button_link" value="{{ old('bg_image_button_link', @$software->bg_image_button_link) }}">
                @if($errors->has('bg_image_button_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_button_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.bg_image_button_link_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="heading">{{ trans('cruds.software.fields.heading') }}</label>
                <input class="form-control {{ $errors->has('heading') ? 'is-invalid' : '' }}" type="text" name="heading" id="heading" value="{{ old('heading', @$software->heading) }}">
                @if($errors->has('heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="description">{{ trans('cruds.software.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', @$software->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.description_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="new_slots_heading">{{ trans('cruds.software.fields.new_slots_heading') }}</label>
                <input class="form-control {{ $errors->has('new_slots_heading') ? 'is-invalid' : '' }}" type="text" name="new_slots_heading" id="new_slots_heading" value="{{ old('new_slots_heading', @$software->new_slots_heading) }}">
                @if($errors->has('new_slots_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('new_slots_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.new_slots_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="games">{{ trans('cruds.software.fields.new_slots') }}</label>
                @php
                    $new_slots = explode(",", @$software->new_slots);
                @endphp
                <select class="form-control custom_order select2_new_slots {{ $errors->has('new_slots') ? 'is-invalid' : '' }}" name="new_slots[]" id="new_slots" software-selected="{{ implode(",", $new_slots) }}" multiple>

                    @foreach($all_games as $game)
                        @if($game && !in_array($game->id, $new_slots))
                            <option value="{{ $game->id }}">{{ $game->name }} - {{ $game->provider}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('new_slots'))
                    <div class="invalid-feedback">
                        {{ $errors->first('new_slots') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.new_slots_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="popular_slots_heading">{{ trans('cruds.software.fields.popular_slots_heading') }}</label>
                <input class="form-control {{ $errors->has('popular_slots_heading') ? 'is-invalid' : '' }}" type="text" name="popular_slots_heading" id="popular_slots_heading" value="{{ old('popular_slots_heading', @$software->popular_slots_heading) }}">
                @if($errors->has('popular_slots_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_slots_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.popular_slots_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="games">{{ trans('cruds.software.fields.popular_slots') }}</label>
                @php
                    $popular_slots = explode(",", @$software->popular_slots);
                @endphp
                <select class="form-control custom_order select2_popular_slots {{ $errors->has('popular_slots') ? 'is-invalid' : '' }}" name="popular_slots[]" id="popular_slots" software-selected="{{ implode(",", $popular_slots) }}" multiple>
                    @foreach($popular_slots as $game_id)
                        @php
                            /**
                            * @var $game_id from loop
                                */
                            $game = \App\Game::find($game_id)
                        @endphp
                        @if($game)
                            <option value="{{ $game->id }}">{{ $game->name }}</option>
                        @endif
                    @endforeach
                    @foreach($all_games as $game)
                        @if($game && !in_array($game->id, $new_slots))
                            <option value="{{ $game->id }}">{{ $game->name }} - {{ $game->provider}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('popular_slots'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_slots') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.popular_slots_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="all_slots_heading">{{ trans('cruds.software.fields.all_slots_heading') }}</label>
                <input class="form-control {{ $errors->has('all_slots_heading') ? 'is-invalid' : '' }}" type="text" name="all_slots_heading" id="all_slots_heading" value="{{ old('all_slots_heading', @$software->all_slots_heading) }}">
                @if($errors->has('all_slots_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('all_slots_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.all_slots_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="games">{{ trans('cruds.software.fields.all_slots') }}</label>
                @php
                    $all_slots = explode(",", @$software->all_slots);
                @endphp
                <select class="form-control custom_order select2_all_slots {{ $errors->has('all_slots') ? 'is-invalid' : '' }}" name="all_slots[]" id="all_slots" software-selected="{{ implode(",", $all_slots) }}" multiple>
                    @foreach($all_slots as $game_id)
                        @php
                            /**
                            * @var $game_id from loop
                                */
                            $game = \App\Game::find($game_id)
                        @endphp
                        @if($game)
                            <option value="{{ $game->id }}">{{ $game->name }}</option>
                        @endif
                    @endforeach
                    @foreach($all_games as $game)
                        @if($game && !in_array($game->id, $all_slots))
                            <option value="{{ $game->id }}">{{ $game->name }} - {{ $game->provider}}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('all_slots'))
                    <div class="invalid-feedback">
                        {{ $errors->first('all_slots') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.all_slots_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="popular_casino_heading">{{ trans('cruds.software.fields.popular_casino_heading') }}</label>
                <input class="form-control {{ $errors->has('popular_casino_heading') ? 'is-invalid' : '' }}" type="text" name="popular_casino_heading" id="popular_casino_heading" value="{{ old('popular_casino_heading', @$software->popular_casino_heading) }}">
                @if($errors->has('popular_casino_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_casino_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.popular_casino_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="popular_casino">{{ trans('cruds.software.fields.popular_casino') }}</label>
                @php
                    $popular_casinos = old('popular_casinos', $data->popular_casinos ?? [])
                @endphp
                <select class="form-control custom_order select2_popular_casinos {{ $errors->has('popular_casinos') ? 'is-invalid' : '' }}" name="popular_casinos[]" id="popular_casinos" data-selected="{{ implode(",", $popular_casinos) }}" multiple required>
                    @foreach($popular_casinos as $casino_id)
                        @php
                            /**
                            * @var $casino_id from loop
                                */
                            $casino = \App\Casino::find($casino_id)
                        @endphp
                        @if($casino)
                            <option value="{{ $casino->id }}">{{ $casino->name }}</option>
                        @endif
                    @endforeach
                    @foreach($all_casinos as $casino)
                        @if($casino && !in_array($casino->id, $popular_casinos))
                            <option value="{{ $casino->id }}">{{ $casino->name }}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('popular_casinos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_casinos') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.popular_casino_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="content">{{ trans('cruds.software.fields.content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content', @$software->content) !!}</textarea>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.content_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="faq_heading">{{ trans('cruds.software.fields.faq_heading') }}</label>
                <input class="form-control {{ $errors->has('faq_heading') ? 'is-invalid' : '' }}" type="text" name="faq_heading" id="faq_heading">
                @if($errors->has('faq_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('faq_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.software.fields.faq_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="faqs">{{ trans('cruds.news.fields.faq') }}</label>
                @php
                    $faqs = old('faqs', $data->faqs ?? [])
                @endphp
                <select class="form-control custom_order select2_faq {{ $errors->has('faqs') ? 'is-invalid' : '' }}" name="faqs[]" id="faqs" data-selected="{{ implode(",", $faqs) }}" multiple>
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
                <span class="help-block">{{ trans('cruds.news.fields.faq_helper') }}</span>
            </div>

            {{--<div class="form-group m-b-20">
                <label class="m-b-15" for="content">Content<span class="text-danger">*</span></label>
                <table class="table table-bordered table-hover" id="tableAddRow">
                    <thead>
                        <tr>
                            <th>Heading</th>
                            <th>Content</th>
                            <th style="width:10px"><i class="fa fa-plus addBtn"></i></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                @if($errors->has('content'))
                    <ul class="custom_req parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('content') }}.</li>
                    </ul>
                @endif
            </div> --}}


            @php
            /**
                * @var $software from controller
            */
            $seo_title = @$software->seo_title;
            $seo_keyword = @$software->seo_keyword;
            $seo_description = @$software->seo_description;
            @endphp
            @include('partials.seoFields', compact('errors', 'seo_title', 'seo_keyword', 'seo_description'))
            @include('partials.saveWideButton')
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('select.select2_new_slots').select2_sortable({
            maximumSelectionLength: 20
        });

        $('select.select2_popular_slots').select2_sortable({
            maximumSelectionLength: 20
        });

        $('select.select2_all_slots').select2_sortable({
        });

        $('select.select2_popular_software').select2_sortable({
        });

        $('select.select2_popular_casinos').select2_sortable({
        });
        $('select.select2_faq').select2_sortable({
        });

        //append row
        $('.addBtn').on('click', function () {
            x = Math.random().toString(36).substr(2, 9);
            $("#tableAddRow tbody").append(`
                <tr>
                    <td>
                        <input type="text" name="content[${x}][heading]" class="form-control" placeholder="Please Enter Heading">
                    </td>
                    <td>
                        <textarea class="form-control" rows="5" placeholder="Please Enter Content" name="content[${x}][description]" maxlength="1030"></textarea>
                    </td>
                    <td><i class="fa fa-minus removeBtn"></i></td>
                </tr>
            `);
        });
        $(document).on("click", ".removeBtn", function () {
            $(this).parents('tr').remove();
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
                                    xhr.open('POST', '/en/admin/softwares/ckmedia', true);
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
                                    var software = new Formsoftware();
                                    software.append('upload', file);
                                    software.append('crud_id', {{ $sofware->id ?? 0 }});
                                    xhr.send(software);
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
                    extraPlugins: [SimpleUploadAdapter]
                }
            );
        }
    });
</script>
<script>
	initSample();
</script>
<script>
    Dropzone.options.logoDropzone = {
        url: '{{ route('admin.softwares.storeMedia') }}',
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
            $('form').find('input[name="logo"]').remove()
            $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
        },
        removedfile: function (file) {
            file.previewElement.remove()
            if (file.status !== 'error') {
                $('form').find('input[name="logo"]').remove()
                this.options.maxFiles = this.options.maxFiles + 1
            }
        },
        init: function () {
                @if(isset($software) && $software->logo)
            var file = {!! json_encode($software->logo) !!}
                    this.options.addedfile.call(this, file)
            this.options.thumbnail.call(this, file, '{{ $software->logo->getUrl('thumb') }}')
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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
            _ref = file.previewElement.querySelectorAll('[software-dz-errormessage]')
            _results = []
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i]
                _results.push(node.textContent = message)
            }

            return _results
        }
    }

    Dropzone.options.bgImageDropzone = {
        url: '{{ route('admin.softwares.storeMedia') }}',
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
                @if(isset($software) && $software->bg_image)
            var file = {!! json_encode($software->bg_image) !!}
                    this.options.addedfile.call(this, file)
            this.options.thumbnail.call(this, file, '{{ $software->bg_image->getUrl('thumb') }}')
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
            _ref = file.previewElement.querySelectorAll('[software-dz-errormessage]')
            _results = []
            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                node = _ref[_i]
                _results.push(node.textContent = message)
            }

            return _results
        }
    }

    Dropzone.options.bgImageLogoDropzone = {
        url: '{{ route('admin.softwares.storeMedia') }}',
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
            $('form').find('input[name="bg_image_logo"]').remove()
            $('form').append('<input type="hidden" name="bg_image_logo" value="' + response.name + '">')
        },
        removedfile: function (file) {
            file.previewElement.remove()
            if (file.status !== 'error') {
                $('form').find('input[name="bg_image_logo"]').remove()
                this.options.maxFiles = this.options.maxFiles + 1
            }
        },
        init: function () {
                @if(isset($software) && $software->bg_image_logo)
            var file = {!! json_encode($software->bg_image_logo) !!}
                    this.options.addedfile.call(this, file)
            this.options.thumbnail.call(this, file, '{{ $software->bg_image_logo->getUrl('thumb') }}')
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="bg_image_logo" value="' + file.file_name + '">')
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
            _ref = file.previewElement.querySelectorAll('[software-dz-errormessage]')
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
