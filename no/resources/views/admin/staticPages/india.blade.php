@extends('layouts.admin')
@section('content')
    @php
        $all_casinos = \App\Casino::all();
        $all_faqQuestions = \App\FaqQuestion::all();
        $all_games = \App\Game::all();
        $all_blog = \App\News::all();
    @endphp

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.staticPage.title') }} / {{ trans('cruds.staticPage.home.title') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route("admin.static-pages.update", $page) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="required" for="title">Page Title</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', @$data->title) }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staticPage.home.fields.title_helper') }}</span>
                </div>
                {{-- Add Casino --}}
                {{-- <div class="form-group">
                    <label class="required" for="casinos">{{ trans('cruds.staticPage.home.fields.casinos') }}</label>
                    @php
                        $casinos = old('casinos', $data->casinos ?? [])
                    @endphp
                    <select class="form-control custom_order select2_casinos {{ $errors->has('casinos') ? 'is-invalid' : '' }}" name="casinos[]" id="casinos" data-selected="{{ implode(",", $casinos) }}" multiple required>
                        @foreach($casinos as $casino_id)
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
                            @if($casino && !in_array($casino->id, $casinos))
                                <option value="{{ $casino->id }}">{{ $casino->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('casinos'))
                        <div class="invalid-feedback">
                            {{ $errors->first('casinos') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staticPage.home.fields.casinos_helper') }}</span>
                </div> --}}


                    {{-- Blogs --}}
                {{-- <div class="form-group">
                    <label class="required" for="blog">{{ trans('cruds.staticPage.home.fields.blog') }}</label>
                    @php
                        $blogs = old('blog', $data->blog ?? [])
                    @endphp
                    <select class="form-control custom_order select2_blog {{ $errors->has('blog') ? 'is-invalid' : '' }}" name="blog[]" id="blog" data-selected="{{ implode(",", $blogs) }}" multiple required>
                        @foreach($blogs as $blog_id)
                            @php
                                $blog = \App\News::find($blog_id)
                            @endphp
                            @if($blog)
                                <option value="{{ $blog->id }}">{{ $blog->name }}</option>
                            @endif
                        @endforeach
                        @foreach($all_blog as $blog)
                            @if($blog && !in_array($blog->id, $blogs))
                                <option value="{{ $blog->id }}">{{ $blog->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('blog'))
                        <div class="invalid-feedback">
                            {{ $errors->first('blog') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staticPage.home.fields.blog_helper') }}</span>
                </div> --}}
                {{-- Faq --}}
                {{-- <div class="form-group">
                    <label class="required" for="faqs">{{ trans('cruds.staticPage.home.fields.faqs') }}</label>
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
                    <span class="help-block">{{ trans('cruds.staticPage.home.fields.faqs_helper') }}</span>
                </div> --}}

                <div class="card">
                    <div class="card-header">Bg Image</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="bg_image">{{ trans('cruds.staticPage.all-game.fields.bg_image') }}(recommended size 1920*853)</label>
                                <div class="needsclick dropzone {{ $errors->has('bg_image') ? 'is-invalid' : '' }}" id="bg_image-dropzone">
                                </div>
                                @if($errors->has('bg_image'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('bg_image') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.staticPage.all-game.fields.bg_image_helper') }}</span>
                            </div>
                    </div>
                </div>
                 <div class="card">
                    <div class="card-header">Front Left Main Image</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="main_image">Front Main Images (recommended size 540*557)</label>
                                <div class="needsclick dropzone {{ $errors->has('main_image') ? 'is-invalid' : '' }}" id="main_image-dropzone">
                                </div>
                                @if($errors->has('main_image'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('main_image') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.staticPage.all-game.fields.bg_image_helper') }}</span>
                            </div>
                    </div>
                </div>
                <div class="card">
                  <div class="card-header">Button Link</div>
                  <div class="card-body">
                      <div class="form-group">
                          <input class="form-control {{ $errors->has('btn_link') ? 'is-invalid' : '' }}" type="text" name="btn_link" id="btn_link" value="{{ old('title', @$data->btn_link) }}" required>
                          @if($errors->has('btn_link'))
                              <div class="invalid-feedback">
                                  {{ $errors->first('btn_link') }}
                              </div>
                          @endif
                          <span class="help-block">{{ trans('cruds.staticPage.home.fields.title_helper') }}</span>
                      </div>
                  </div>
              </div>
                <div class="card">
                    <div class="card-header">Main Headings on Right</div>
                    <div id="heading-portion" class="card-body">
                        @if(!empty($data->main_headings))
                            @foreach ($data->main_headings as $key=>$item)
                                @if(!empty($item))
                                <div id="{{++$key}}" class="form-group loop-form-group">
                                    <label for="main_headings">{{ trans('cruds.staticPage.home.fields.section_heading').' '.$key }}</label>
                                    <input class="form-control {{ $errors->has('main_headings') ? 'is-invalid' : '' }}" type="text" name="main_headings[]" id="main_headings" value="{{ old('main_headings', $item ) }}">
                                    @if($errors->has('main_headings'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('main_headings') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_heading_helper') }}</span>
                                </div>
                           @endif
                        @endforeach
                       @endif
                         <div id="clone-section"></div>
                             <div id="0" class="form-group d-none">
                                <label for="main_headings">{{ trans('cruds.staticPage.home.fields.section_heading') }}</label>
                                <input class="form-control {{ $errors->has('main_headings') ? 'is-invalid' : '' }}" type="text" name="" id="main_headings" value="">
                                @if($errors->has('main_headings'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('main_headings') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_heading_helper') }}</span>
                            </div>
                        <button id="clone-button" class="btn btn-primary">Add Heading</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Text Section</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="text_area_head">{{ trans('cruds.staticPage.home.fields.section_heading') }}</label>
                            <input class="form-control {{ $errors->has('text_area_head') ? 'is-invalid' : '' }}" type="text" name="text_area_head" id="text_area_head" value="{{ old('text_area_head', @$data->text_area_head) }}">
                            @if($errors->has('text_area_head'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('text_area_head') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_heading_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="text_area">{{ trans('cruds.staticPage.home.fields.section_text') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('text_area') ? 'is-invalid' : '' }}" name="text_area" id="text_area">{!! old('text_area', @$data->text_area) !!}</textarea>
                            @if($errors->has('text_area'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('text_area') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_helper') }}</span>
                        </div>
                    </div>
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
                    <button class="btn btn-danger w-100" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('#clone-button').click(function(e){
                e.preventDefault();
                var id =$('#clone-section').find('.form-group:last').attr('id')??$('#heading-portion').find('.loop-form-group:last').attr('id')??$(this).prev().attr('id');
                $(this).prev().clone().appendTo('#clone-section');
                $('#clone-section .form-group:last').attr('id',++id).removeClass('d-none').children('label').append(' '+id)
                $('#clone-section .form-group:last').children('input').attr('name','main_headings[]')
            });
        });
        Dropzone.options.bgImageDropzone = {
            url: '{{ route('admin.static-pages.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
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
         Dropzone.options.mainImageDropzone = {
            url: '{{ route('admin.static-pages.storeMedia') }}',
            maxFilesize: 2, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.webp',
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
                $('form').find('input[name="images[main_image]"]').remove()
                $('form').append('<input type="hidden" name="images[main_image]" value="' + response.name + '">')

                $('form').find('input[name="main_image"]').remove()
                $('form').append('<input type="hidden" name="main_image" value="' + response.name + '">')
            },
            removedfile: function (file) {
                file.previewElement.remove()
                if (file.status !== 'error') {
                    $('form').find('input[name="images[main_image]"]').val('')
                    $('form').find('input[name="main_image"]').val('')
                    this.options.maxFiles = this.options.maxFiles + 1
                }
            },
            init: function () {
                @php
                    /**
                     * @var $page from controller
                    */
                    $image = \App\StaticPage::getMediaField($page, 'main_image');
                @endphp
                @if(isset($data) && $image)
                    var file = {!! json_encode($image) !!}
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, '{{ $image->getUrl('thumb') }}')
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="images[main_image]" value="' + file.file_name + '">')
                    $('form').append('<input type="hidden" name="main_image" value="' + file.file_name + '">')
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
        $(document).ready(function () {
            $('select.select2_slider_casinos').select2_sortable({
            });
            $('select.select2_casinos').select2_sortable({

            });
            $('select.select2_faq').select2_sortable({

            });
            $('select.select2_games').select2_sortable({

            });
            $('select.select2_blog').select2_sortable({

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
                                        data.append('crud_id', {{ @$casino->id ?? 0 }});
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
@endsection
