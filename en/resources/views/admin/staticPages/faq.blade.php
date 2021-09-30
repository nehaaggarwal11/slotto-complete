@extends('layouts.admin')
@section('content')
@php
    $all_casinos = \App\Casino::all();
@endphp
<div class="card">
    <div class="card-header">
        {{ trans('cruds.staticPage.title') }} / {{ trans('cruds.staticPage.faq.title') }}
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route("admin.static-pages.update", $page) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="heading">{{ trans('cruds.staticPage.faq.fields.heading') }}</label>
                <input class="form-control {{ $errors->has('heading') ? 'is-invalid' : '' }}" type="text" name="heading" id="heading" value="{{ old('heading', @$data->heading) }}">
                @if($errors->has('heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.faq.fields.heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="popular_casinos_heading">{{ trans('cruds.staticPage.faq.fields.popular_casinos_heading') }}</label>
                <input class="form-control {{ $errors->has('popular_casinos_heading') ? 'is-invalid' : '' }}" type="text" name="popular_casinos_heading" id="popular_casinos_heading" value="{{ old('popular_casinos_heading', @$data->popular_casinos_heading) }}">
                @if($errors->has('popular_casinos_heading'))
                    <div class="invalid-feedback">
                        {{ $errors->first('popular_casinos_heading') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.staticPage.faq.fields.popular_casinos_heading_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="popular_casinos">{{ trans('cruds.staticPage.faq.fields.popular_casinos') }}</label>
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
                <span class="help-block">{{ trans('cruds.staticPage.faq.fields.popular_casinos_helper') }}</span>
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
        }); 
    </script>
@endsection           