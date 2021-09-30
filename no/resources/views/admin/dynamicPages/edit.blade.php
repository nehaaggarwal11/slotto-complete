@extends('layouts.admin')
@section('content')
@php
    $all_casinos = \App\Casino::all();
@endphp
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.software.title_singular') }}
    </div>
</div>
<form method="POST" action="{{ route("admin.dynamic-pages.update", [$dynamic_page->id]) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card">
        <div class="card-header">Dynamic Page</div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{ trans('cruds.dynamicPage.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $dynamic_page->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dynamicPage.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bg_heading">{{ trans('cruds.dynamicPage.fields.bg_heading') }}</label>
                <input class="form-control {{ $errors->has('bg_heading') ? 'is-invalid' : '' }}" type="text" name="bg_heading" id="bg_heading" value="{{ old('bg_heading', $dynamic_page->bg_heading) }}">
                @if($errors->has('bg_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dynamicPage.fields.bg_heading_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bg_heading">{{ trans('cruds.dynamicPage.fields.heading') }}</label>
                <input class="form-control {{ $errors->has('heading') ? 'is-invalid' : '' }}" type="text" name="heading" id="heading" value="{{ old('heading', $dynamic_page->heading) }}">
                @if($errors->has('heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dynamicPage.fields.heading_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.dynamicPage.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', @$dynamic_page->description) !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dynamicPage.fields.description_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="popular_casino_heading">{{ trans('cruds.dynamicPage.fields.popular_casino_heading') }}</label>
                <input class="form-control {{ $errors->has('popular_casino_heading') ? 'is-invalid' : '' }}" type="text" name="popular_casino_heading" id="popular_casino_heading" value="{{ old('popular_casino_heading', @$dynamic_page->popular_casino_heading) }}">
                @if($errors->has('popular_casino_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_casino_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.dynamicPage.fields.popular_casino_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="popular_casino">{{ trans('cruds.dynamicPage.fields.popular_casino') }}</label>
                @php
                    $popular_casinos = explode(",", $dynamic_page->popular_casinos)
                @endphp
                <select class="form-control custom_order select2_popular_casinos {{ $errors->has('popular_casinos') ? 'is-invalid' : '' }}" name="popular_casinos[]" id="popular_casinos" data-selected="{{ implode(",", $popular_casinos) }}" multiple>
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
                <span class="help-block">{{ trans('cruds.dynamicPage.fields.popular_casino_helper') }}</span>
            </div>

            <div class="form-group m-b-20">
                <label class="m-b-15" for="content">{{ trans('cruds.dynamicPage.fields.content') }}</label>
                <table class="table table-bordered table-hover" id="tableAddRow">
                    <thead>
                        <tr>
                            <th>Heading</th>
                            <th>Description</th>
                            <th style="width:10px"><i class="fa fa-plus addBtn"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    @if($dynamic_page->content && is_object($content = json_decode($dynamic_page->content)))
                        @foreach ($content as $ckey => $row)
                            <tr>
                                <td>
                                    <input type="text" name="content[{{ $ckey }}][heading]" class="form-control" placeholder="Please Enter Heading" value="{{ @$row->heading }}">
                                </td>
                                <td>
                                    <textarea class="form-control" rows="5" placeholder="Please Enter Content" name="content[{{ $ckey }}][description]" maxlength="1030">{{ @$row->description }}</textarea>
                                </td>
                                <td><i class="fa fa-minus removeBtn"></i></td>
                            </tr>
                        @endforeach
                    @endif  
                    </tbody>
                </table>
                @if($errors->has('content'))
                    <ul class="custom_req parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('content') }}.</li>
                    </ul>
                @endif
                <span class="help-block">{{ trans('cruds.dynamicPage.fields.content_helper') }}</span>
            </div>

            @php
            /**
                     * @var $dynamic_page from controller
                    */
                    $seo_title = @$dynamic_page->seo_title;
                    $seo_keyword = @$dynamic_page->seo_keyword;
                    $seo_description = @$dynamic_page->seo_description;
                    @endphp
                    @include('partials.seoFields', compact('errors', 'seo_title', 'seo_keyword', 'seo_description'))


            
        </div>
    </div>
    @include('partials.saveWideButton')
</form>



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

        $('select.select2_popular_casinos').select2_sortable({
        });


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
    });
    $(document).ready(function () {
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
                                    var data = new FormData();
                                    data.append('upload', file);
                                    data.append('crud_id', {{ $software->id ?? 0 }});
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
                    extraPlugins: [SimpleUploadAdapter]
                }
            );
        }
    });
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
            _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
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
@endsection    

