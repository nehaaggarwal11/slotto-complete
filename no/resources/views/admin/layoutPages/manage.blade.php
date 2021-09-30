@extends('layouts.admin')

@section('styles_before')
    <link rel="stylesheet" href="https://unpkg.com/toastr@2.1.4/build/toastr.min.css">
    <link rel="stylesheet" href="https://unpkg.com/grapesjs@0.17.3/dist/css/grapes.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/grapesjs-preset-webpage@0.1.11/dist/grapesjs-preset-webpage.min.css">
    <link rel="stylesheet" href="https://unpkg.com/grapesjs-plugin-filestack@0.1.1/dist/grapesjs-plugin-filestack.css">
    <link rel="stylesheet" href="https://unpkg.com/grapick@0.1.13/dist/grapick.min.css">
    <link rel="stylesheet" href="{{ asset('asset/admin/css/tooltip.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('asset/admin/css/demos.css') }}">--}}
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('asset/admin/css/grapesjs-nj-app.css') }}">
@endsection

@section('scripts_before')
    {{--<script src="//static.filestackapi.com/v3/filestack.js"></script>
    <script src="https://grapesjs.com/js/aviary.js"></script> old //feather.aviary.com/imaging/v3/editor.js
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        window.sc = {
            grapesjs_images_path : "{{ asset('asset/admin/img/grapejs/') }}"
        };
    </script>--}}
    <script>
        window.gjs_assets = {!! json_encode($gjs_assets) !!};
        window.gjs_assets_route = "{{ route('admin.layout-pages.gjs-assets') }}";
    </script>
    <script src="https://unpkg.com/toastr@2.1.4/build/toastr.min.js"></script>
    <script src="https://unpkg.com/grapesjs@0.17.3/dist/grapes.min.js"></script>
    <script src="https://unpkg.com/grapesjs-preset-webpage@0.1.11/dist/grapesjs-preset-webpage.min.js"></script>
    <script src="https://unpkg.com/grapesjs-lory-slider@0.1.5/dist/grapesjs-lory-slider.min.js"></script>
    <script src="https://unpkg.com/grapesjs-tabs@1.0.6/dist/grapesjs-tabs.min.js"></script>
    <script src="https://unpkg.com/grapesjs-custom-code@0.1.3/dist/grapesjs-custom-code.min.js"></script>
    <script src="https://unpkg.com/grapesjs-touch@0.1.1/dist/grapesjs-touch.min.js"></script>
    <script src="https://unpkg.com/grapesjs-parser-postcss@0.1.1/dist/grapesjs-parser-postcss.min.js"></script>
    <script src="https://unpkg.com/grapesjs-tooltip@0.1.5/dist/grapesjs-tooltip.min.js"></script>
    <script src="https://unpkg.com/grapesjs-tui-image-editor@0.1.3/dist/grapesjs-tui-image-editor.min.js"></script>
    <script src="https://unpkg.com/grapesjs-typed@1.0.5/dist/grapesjs-typed.min.js"></script>
    <script src="https://unpkg.com/grapesjs-style-bg@1.0.5/dist/grapesjs-style-bg.min.js"></script>
    <script src="{{ asset('asset/admin/js/grapesjs-nj-blocks-plugin.js') }}?v=1.0.0.1"></script>
    <script src="{{ asset('asset/admin/js/grapesjs-nj-code-editor-plugin.js') }}?v=1.0.0.1"></script>
    <script src="{{ asset('asset/admin/js/grapesjs-nj-help-modal-plugin.js') }}?v=1.0.0.1"></script>
{{--    <script src="https://unpkg.com/grapesjs-blocks-basic@0.1.8/dist/grapesjs-blocks-basic.min.js"></script>--}}
@endsection

@section('scripts')
    <script src="{{ asset('asset/admin/js/grapesjs-nj-app.js') }}?v=1.0.0.1"></script>
@endsection

@section('content')
    <div class="card" style="width:100%">
        <div class="card-header">
            {{ trans('global.'.$is_edit ? 'edit': 'create') }} {{ trans('cruds.layoutPage.title_singular') }}
        </div>
    </div>
    <form id="layoutPageForm" method="POST" action="{{ $is_edit ? route("admin.layout-pages.update", [$layoutPage->id]) : route("admin.layout-pages.store") }}" enctype="multipart/form-data">
        @if($is_edit)
            @method('PUT')
        @endif
        @csrf
        <textarea style="display: none" name="data">{{ old('data', $is_edit ? $layoutPage->data: '') }}</textarea>
        <textarea style="display: none" name="html">{{ old('html', $is_edit ? $layoutPage->html: '') }}</textarea>
        <textarea style="display: none" name="css">{{ old('css', $is_edit ? $layoutPage->css: '') }}</textarea>
        <textarea style="display: none" name="js">{{ old('js', $is_edit ? $layoutPage->js: '') }}</textarea>
        <div class="card" style="width:100%">
            <div class="card-body">
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.layoutPage.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $is_edit ? $layoutPage->title: '') }}" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.layoutPage.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="slug">{{ trans('cruds.layoutPage.fields.slug') }}</label>
                    <div class="input-group">
                        <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $is_edit ? $layoutPage->slug : '') }}">
                        @if($is_edit)
                            <a href="{{ $layoutPage->route }}" class="btn btn-link" target="_blank">View</a>
                        @endif
                    </div>
                    @if($errors->has('slug'))
                        <div class="invalid-feedback">
                            {{ $errors->first('slug') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.layoutPage.fields.slug_helper') }}</span>
                </div>
            </div>
        </div>
        <div class="card" style="width:100%">
            <div class="gjs-body card-body">
                <div style="display: none">
                    <div class="gjs-logo-cont">
                        <a href="https://grapesjs.com"><img class="gjs-logo" src="https://grapesjs.com/img/grapesjs-logo-cl.png"></a>
                        <div class="gjs-logo-version"></div>
                    </div>
                </div>
                <div id="gjs">
                    @if($is_edit)
                        {!! html_entity_decode($layoutPage->html) !!}
                        <style>
                            {!! html_entity_decode($layoutPage->css) !!}
                        </style>
                    @else
                        @include('admin.layoutPages.template')
                    @endif
                </div>
                {{--<div id="info-panel" style="display:none">
                    <br/>
                    <svg class="info-panel-logo" xmlns="https://www.w3.org/2000/svg" version="1"><g id="gjs-logo">
                            <path d="M40 5l-12.9 7.4 -12.9 7.4c-1.4 0.8-2.7 2.3-3.7 3.9 -0.9 1.6-1.5 3.5-1.5 5.1v14.9 14.9c0 1.7 0.6 3.5 1.5 5.1 0.9 1.6 2.2 3.1 3.7 3.9l12.9 7.4 12.9 7.4c1.4 0.8 3.3 1.2 5.2 1.2 1.9 0 3.8-0.4 5.2-1.2l12.9-7.4 12.9-7.4c1.4-0.8 2.7-2.2 3.7-3.9 0.9-1.6 1.5-3.5 1.5-5.1v-14.9 -12.7c0-4.6-3.8-6-6.8-4.2l-28 16.2" style="fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-width:10;stroke:#fff"/>
                        </g></svg>
                    <br/>
                    <div class="info-panel-label">
                        <b>GrapesJS Webpage Builder</b> is a simple showcase of what is possible to achieve with the
                        <a class="info-panel-link gjs-four-color" target="_blank" href="https://github.com/artf/grapesjs">GrapesJS</a>
                        core library
                        <br/><br/>
                        For any hint about the demo check the
                        <a class="info-panel-link gjs-four-color" target="_blank" href="https://github.com/artf/grapesjs-preset-webpage">Webpage Preset repository</a>
                        and open an issue. For problems with the builder itself, open an issue on the main
                        <a class="info-panel-link gjs-four-color" target="_blank" href="https://github.com/artf/grapesjs">GrapesJS repository</a>
                        <br/><br/>
                        Being a free and open source project contributors and supporters are extremely welcome.
                        If you like the project support it with a donation of your choice or become a backer/sponsor via
                        <a class="info-panel-link gjs-four-color" target="_blank" href="https://opencollective.com/grapesjs">Open Collective</a>
                    </div>
                </div> --}}
            </div>
        </div>
        @php
            $seo_title = $layoutPage->seo_title;
            $seo_keyword = $layoutPage->seo_keyword;
            $seo_description = $layoutPage->seo_description;
            $countries = [];
        @endphp
        @include('partials.seoFields', compact('errors', 'seo_title', 'seo_keyword', 'seo_description'))
        @include('partials.saveWideButton')
    </form>
@endsection
