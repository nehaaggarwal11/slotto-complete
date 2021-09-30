@extends('layouts.admin')
@section('content')

@php
    $all_casinos = \App\Casino::all();
    $all_faqQuestions = \App\FaqQuestion::all();
@endphp
<div class="card">
    <div class="card-header">
        {{ trans('cruds.staticPage.title') }} / {{ trans('cruds.staticPage.software.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.static-pages.update", $page) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="bg_image">{{ trans('cruds.staticPage.software.fields.bg_image') }}(recommended size 1903*250)</label>
                <div class="needsclick dropzone {{ $errors->has('bg_image') ? 'is-invalid' : '' }}" id="bg_image-dropzone">
                </div>
                @if($errors->has('bg_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.bg_image_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="bg_image_alt_text">{{ trans('cruds.staticPage.software.fields.bg_image_alt_text') }}</label>
                <input class="form-control {{ $errors->has('bg_image_alt_text') ? 'is-invalid' : '' }}" type="text" name="bg_image_alt_text" id="bg_image_alt_text" value="{{ old('bg_image_alt_text', @$data->bg_image_alt_text) }}">
                @if($errors->has('bg_image_alt_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_alt_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.bg_image_alt_text_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="bg_image_heading">{{ trans('cruds.staticPage.software.fields.bg_image_heading') }}</label>
                <input class="form-control {{ $errors->has('bg_image_heading') ? 'is-invalid' : '' }}" type="text" name="bg_image_heading" id="bg_image_heading" value="{{ old('bg_image_heading', @$data->bg_image_heading) }}">
                @if($errors->has('bg_image_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.bg_image_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="bg_image_text">{{ trans('cruds.staticPage.software.fields.bg_image_text') }}</label>
                <input class="form-control {{ $errors->has('bg_image_text') ? 'is-invalid' : '' }}" type="text" name="bg_image_text" id="bg_image_text" value="{{ old('bg_image_text', @$data->bg_image_text) }}">
                @if($errors->has('bg_image_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bg_image_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.bg_image_text_helper') }}</span>
            </div>

            <!-- <div class="form-group m-b-20">
                <label class="m-b-15" for="content">{{ trans('cruds.staticPage.software.fields.content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content', @$data->content) !!}</textarea>
                @if($errors->has('content'))
                    <ul class="custom_req parsley-errors-list filled">
                        <li class="parsley-required">{{ $errors->first('content') }}.</li>
                    </ul>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.content_helper') }}</span>
            </div>             -->

            <div class="form-group">
                <label for="popular_casinos_heading">{{ trans('cruds.staticPage.software.fields.popular_casinos_heading') }}</label>
                <input class="form-control {{ $errors->has('popular_casinos_heading') ? 'is-invalid' : '' }}" type="text" name="popular_casinos_heading" id="popular_casinos_heading" value="{{ old('popular_casinos_heading', @$data->popular_casinos_heading) }}">
                @if($errors->has('popular_casinos_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_casinos_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.popular_casinos_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="popular_casinos">{{ trans('cruds.staticPage.software.fields.popular_casinos') }}</label>
                @php
                    $popular_casinos = old('popular_casinos', $data->popular_casinos ?? [])
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
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.popular_casinos_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="software_heading">{{ trans('cruds.staticPage.software.fields.heading') }}</label>
                <input class="form-control {{ $errors->has('software_heading') ? 'is-invalid' : '' }}" type="text" name="software_heading" id="software_heading" value="{{ old('software_heading', @$data->software_heading) }}">
                @if($errors->has('software_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('software_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="software_description">{{ trans('cruds.staticPage.software.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('software_description') ? 'is-invalid' : '' }}" name="software_description" id="software_description">{!! old('software_description', @$data->software_description) !!}</textarea>
                @if($errors->has('software_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('software_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.description_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="faq_heading">{{ trans('cruds.staticPage.software.fields.faq_heading') }}</label>
                <input class="form-control {{ $errors->has('faq_heading') ? 'is-invalid' : '' }}" type="text" name="faq_heading" id="faq_heading" value="{{ old('faq_heading', @$data->faq_heading) }}">
                @if($errors->has('faq_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('faq_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.faq_heading_helper') }}</span>
            </div>

            <div class="form-group"> 
                <label class="required" for="faq">{{ trans('cruds.staticPage.software.fields.faq') }}</label>
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
                        @if($faq)
                            <option value="{{ $faq->id }}">{{ $faq->question }}</option>
                        @endif
                    @endforeach
                    @foreach($all_faqQuestions as $faq)
                        @if($faq && !in_array($faq->id, $faqs))
                            <option value="{{ $faq->id }}">{{ $faq->question }}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('faqs'))
                    <div class="invalid-feedback">
                        {{ $errors->first('faqs') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.software.fields.faq_helper') }}</span>
            </div>

            @php
            /**
                     * @var $data from controller
                    */
                    $seo_title = @$data->seo_title;
                    $seo_keyword = @$data->seo_keyword;
                    $seo_description = @$data->seo_description;
                    @endphp
                    @include('partials.seoFields', compact('errors', 'seo_title', 'seo_keyword', 'seo_description'))


            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            $('select.select2_popular_casinos').select2_sortable({
            });
            $('select.select2_faq').select2_sortable({
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

            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
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

        Dropzone.options.bgImageDropzone = {
            url: '{{ route('admin.static-pages.storeMedia') }}',
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
                $('form').find('input[name="images[bg_image]"]').remove()
                $('form').append('<input type="hidden" name="images[bg_image]" value="' + response.name + '">')

                $('form').find('input[name="bg_image"]').remove()
                $('form').append('<input type="hidden" name="bg_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="images[bg_image]"]').val('')
                    $('form').find('input[name="bg_image"]').val('')
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @php
                    /**
                     * @var $page from controller
                    */
                    $image = \App\StaticPage::getMediaField($page, 'bg_image');
                @endphp
                @if(isset($data) && $image)
                    var file = {!! json_encode($image) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, '{{ $image->getUrl('thumb') }}')
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="images[bg_image]" value="' + file.file_name + '">')
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
@endsection
