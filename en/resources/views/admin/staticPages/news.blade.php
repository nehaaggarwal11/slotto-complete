@extends('layouts.admin')
@section('content')

@php
    $all_casinos = \App\Casino::all();
    $all_faqQuestions = \App\FaqQuestion::all();
@endphp
<div class="card">
    <div class="card-header">
        {{ trans('cruds.staticPage.title') }} / {{ trans('cruds.staticPage.news.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.static-pages.update", $page) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="heading">{{ trans('cruds.staticPage.news.fields.heading') }}</label>
                <input class="form-control {{ $errors->has('heading') ? 'is-invalid' : '' }}" type="text" name="heading" id="heading" value="{{ old('heading', @$data->heading) }}">
                @if($errors->has('heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.news.fields.heading_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="news_text_less">{{ trans('cruds.staticPage.news.fields.section_text_less') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('news_text_less') ? 'is-invalid' : '' }}" name="news_text_less" id="news_text_less">{!! old('news_text_less', @$data->news_text_less) !!}</textarea>
                @if($errors->has('news_text_less'))
                    <div class="invalid-feedback">
                        {{ $errors->first('news_text_less') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.news.fields.section_text_less_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="news_text_more">{{ trans('cruds.staticPage.news.fields.section_text_more') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('news_text_more') ? 'is-invalid' : '' }}" name="news_text_more" id="news_text_more">{!! old('news_text_more', @$data->news_text_more) !!}</textarea>
                @if($errors->has('news_text_more'))
                    <div class="invalid-feedback">
                        {{ $errors->first('news_text_more') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.news.fields.section_text_more_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="popular_casinos_heading">{{ trans('cruds.staticPage.news.fields.popular_casinos_heading') }}</label>
                <input class="form-control {{ $errors->has('popular_casinos_heading') ? 'is-invalid' : '' }}" type="text" name="popular_casinos_heading" id="popular_casinos_heading" value="{{ old('popular_casinos_heading', @$data->popular_casinos_heading) }}">
                @if($errors->has('popular_casinos_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_casinos_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.news.fields.popular_casinos_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="popular_casinos">{{ trans('cruds.staticPage.news.fields.popular_casinos') }}</label>
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
                <span class="help-block">{{ trans('cruds.staticPage.news.fields.popular_casinos_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="faq_heading">{{ trans('cruds.staticPage.news.fields.faq_heading') }}</label>
                <input class="form-control {{ $errors->has('faq_heading') ? 'is-invalid' : '' }}" type="text" name="faq_heading" id="faq_heading" value="{{ old('faq_heading', @$data->faq_heading) }}">
                @if($errors->has('faq_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('faq_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.news.fields.faq_heading_helper') }}</span>
            </div>

            <div class="form-group"> 
                <label class="required" for="faq">{{ trans('cruds.staticPage.news.fields.faq') }}</label>
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
                <span class="help-block">{{ trans('cruds.staticPage.news.fields.faq_helper') }}</span>
            </div>

            @php
            /**
                     * @var $casino from controller
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
            extraPlugins: [SimpleUploadAdapter]
        }
    );
}
</script>
@endsection