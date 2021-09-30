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
                    <label class="required" for="title">{{ trans('cruds.staticPage.home.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', @$data->title) }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staticPage.home.fields.title_helper') }}</span>
                </div>

                {{-- <div class="form-group">
                    <label class="required" for="slider_casinos">{{ trans('cruds.staticPage.home.fields.slider_casinos') }}</label>
                    @php
                        $slider_casinos = old('slider_casinos', $data->slider_casinos ?? [])
                    @endphp

                    <select class="form-control custom_order select2_slider_casinos {{ $errors->has('slider_casinos') ? 'is-invalid' : '' }}" name="slider_casinos[]" id="slider_casinos" data-selected="{{ implode(",", $slider_casinos) }}" multiple required>
                        @foreach($slider_casinos as $casino_id)
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
                            @if($casino && !in_array($casino->id, $slider_casinos))
                                <option value="{{ $casino->id }}">{{ $casino->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('slider_casinos'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slider_casinos') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staticPage.home.fields.slider_casinos_helper') }}</span>
                </div> --}}

                <div class="form-group">
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
                </div>

                <div class="form-group">
                    <label class="required" for="games">{{ trans('cruds.staticPage.home.fields.games') }}</label>
                    @php
                        $games = old('games', $data->games ?? [])
                    @endphp
                    <select class="form-control custom_order select2_games {{ $errors->has('games') ? 'is-invalid' : '' }}" name="games[]" id="games" data-selected="{{ implode(",", $games) }}" multiple required>
                        @foreach($games as $game_id)
                            @php
                                $game = \App\Game::find($game_id)
                            @endphp
                            @if($game)
                                <option value="{{ $game->id }}">{{ $game->name }} - {{$game->provider}}</option>
                            @endif
                        @endforeach
                        @foreach($all_games as $game)
                            @if($game && !in_array($game->id, $games))
                                <option value="{{ $game->id }}">{{ $game->name }} - {{$game->provider}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('games'))
                        <div class="invalid-feedback">
                            {{ $errors->first('games') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.staticPage.home.fields.games_helper') }}</span>
                </div>

                <div class="form-group">
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
                </div>

                <div class="form-group">
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
                </div>

                <div class="card">
                    <div class="card-header">Velkommen til Slottomat.com</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="welcome_heading">{{ trans('cruds.staticPage.home.fields.section_heading') }}</label>
                            <input class="form-control {{ $errors->has('welcome_heading') ? 'is-invalid' : '' }}" type="text" name="welcome_heading" id="welcome_heading" value="{{ old('welcome_heading', @$data->welcome_heading) }}">
                            @if($errors->has('welcome_heading'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('welcome_heading') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_heading_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="welcome_text_less">{{ trans('cruds.staticPage.home.fields.section_text_less') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('welcome_text_less') ? 'is-invalid' : '' }}" name="welcome_text_less" id="welcome_text_less">{!! old('welcome_text_less', @$data->welcome_text_less) !!}</textarea>
                            @if($errors->has('welcome_text_less'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('welcome_text_less') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_less_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="welcome_text_more">{{ trans('cruds.staticPage.home.fields.section_text_more') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('welcome_text_more') ? 'is-invalid' : '' }}" name="welcome_text_more" id="welcome_text_more">{!! old('welcome_text_more', @$data->welcome_text_more) !!}</textarea>
                            @if($errors->has('welcome_text_more'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('welcome_text_more') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_more_helper') }}</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Viktige fakta om spilleautomater</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="important_facts_heading">{{ trans('cruds.staticPage.home.fields.section_heading') }}</label>
                            <input class="form-control {{ $errors->has('important_facts_heading') ? 'is-invalid' : '' }}" type="text" name="important_facts_heading" id="important_facts_heading" value="{{ old('important_facts_heading', @$data->important_facts_heading) }}">
                            @if($errors->has('important_facts_heading'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('important_facts_heading') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_heading_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="important_facts_text_less">{{ trans('cruds.staticPage.home.fields.section_text_less') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('important_facts_text_less') ? 'is-invalid' : '' }}" name="important_facts_text_less" id="important_facts_text_less">{!! old('important_facts_text_less', @$data->important_facts_text_less) !!}</textarea>
                            @if($errors->has('important_facts_text_less'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('important_facts_text_less') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_less_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="important_facts_text_more">{{ trans('cruds.staticPage.home.fields.section_text_more') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('important_facts_text_more') ? 'is-invalid' : '' }}" name="important_facts_text_more" id="important_facts_text_more">{!! old('important_facts_text_more', @$data->important_facts_text_more) !!}</textarea>
                            @if($errors->has('important_facts_text_more'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('important_facts_text_more') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_more_helper') }}</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Nye Online Casinos</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="new_online_casinos_text_less">{{ trans('cruds.staticPage.home.fields.section_text_less') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('new_online_casinos_text_less') ? 'is-invalid' : '' }}" name="new_online_casinos_text_less" id="new_online_casinos_text_less">{!! old('new_online_casinos_text_less', @$data->new_online_casinos_text_less) !!}</textarea>
                            @if($errors->has('new_online_casinos_text_less'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('new_online_casinos_text_less') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_less_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="new_online_casinos_text_more">{{ trans('cruds.staticPage.home.fields.section_text_more') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('new_online_casinos_text_more') ? 'is-invalid' : '' }}" name="new_online_casinos_text_more" id="new_online_casinos_text_more">{!! old('new_online_casinos_text_more', @$data->new_online_casinos_text_more) !!}</textarea>
                            @if($errors->has('new_online_casinos_text_more'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('new_online_casinos_text_more') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_more_helper') }}</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Finn ditt favoritt casino på nett</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="find_favourite_casinos_heading">{{ trans('cruds.staticPage.home.fields.section_heading') }}</label>
                            <input class="form-control {{ $errors->has('find_favourite_casinos_heading') ? 'is-invalid' : '' }}" type="text" name="find_favourite_casinos_heading" id="find_favourite_casinos_heading" value="{{ old('find_favourite_casinos_heading', @$data->find_favourite_casinos_heading) }}">
                            @if($errors->has('find_favourite_casinos_heading'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('find_favourite_casinos_heading') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_heading_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="find_favourite_casinos_text_less">{{ trans('cruds.staticPage.home.fields.section_text_less') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('find_favourite_casinos_text_less') ? 'is-invalid' : '' }}" name="find_favourite_casinos_text_less" id="find_favourite_casinos_text_less">{!! old('find_favourite_casinos_text_less', @$data->find_favourite_casinos_text_less) !!}</textarea>
                            @if($errors->has('find_favourite_casinos_text_less'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('find_favourite_casinos_text_less') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_less_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="find_favourite_casinos_text_more">{{ trans('cruds.staticPage.home.fields.section_text_more') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('find_favourite_casinos_text_more') ? 'is-invalid' : '' }}" name="find_favourite_casinos_text_more" id="find_favourite_casinos_text_more">{!! old('find_favourite_casinos_text_more', @$data->find_favourite_casinos_text_more) !!}</textarea>
                            @if($errors->has('find_favourite_casinos_text_more'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('find_favourite_casinos_text_more') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_more_helper') }}</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Hvordan finne beste Mobil Casino</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="find_mobile_casino_heading">{{ trans('cruds.staticPage.home.fields.section_heading') }}</label>
                            <input class="form-control {{ $errors->has('find_mobile_casino_heading') ? 'is-invalid' : '' }}" type="text" name="find_mobile_casino_heading" id="find_mobile_casino_heading" value="{{ old('find_mobile_casino_heading', @$data->find_mobile_casino_heading) }}">
                            @if($errors->has('find_mobile_casino_heading'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('find_mobile_casino_heading') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_heading_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="find_mobile_casino_text_less">{{ trans('cruds.staticPage.home.fields.section_text_less') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('find_mobile_casino_text_less') ? 'is-invalid' : '' }}" name="find_mobile_casino_text_less" id="find_mobile_casino_text_less">{!! old('find_mobile_casino_text_less', @$data->find_mobile_casino_text_less) !!}</textarea>
                            @if($errors->has('find_mobile_casino_text_less'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('find_mobile_casino_text_less') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_less_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="find_mobile_casino_text_more">{{ trans('cruds.staticPage.home.fields.section_text_more') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('find_mobile_casino_text_more') ? 'is-invalid' : '' }}" name="find_mobile_casino_text_more" id="find_mobile_casino_text_more">{!! old('find_mobile_casino_text_more', @$data->find_mobile_casino_text_more) !!}</textarea>
                            @if($errors->has('find_mobile_casino_text_more'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('find_mobile_casino_text_more') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_text_more_helper') }}</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">FAQ</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="faq_heading">{{ trans('cruds.staticPage.home.fields.section_heading') }}</label>
                            <input class="form-control {{ $errors->has('faq_heading') ? 'is-invalid' : '' }}" type="text" name="faq_heading" id="faq_heading" value="{{ old('faq_heading', @$data->faq_heading) }}">
                            @if($errors->has('faq_heading'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faq_heading') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.staticPage.home.fields.section_heading_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="faq_text">{{ trans('cruds.staticPage.home.fields.section_text') }}</label>
                            <textarea class="form-control ckeditor {{ $errors->has('faq_text') ? 'is-invalid' : '' }}" name="faq_text" id="faq_text">{!! old('faq_text', @$data->faq_text) !!}</textarea>
                            @if($errors->has('faq_text'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faq_text') }}
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
