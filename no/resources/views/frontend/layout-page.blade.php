@extends('layouts.frontend')
{{--
    @extends('layouts.frontend')
    @section('title','Layout Page')
--}}
@section('meta_tags')
    <title>{{ $layout_page->seo_title }}</title>
    <meta content="{{ $layout_page->seo_keyword }}" name="keywords">
    <meta content="{{ $layout_page->seo_description }}" name="description">
@endsection

@section('styles')
    <style>{!! html_entity_decode($layout_page->css) !!}</style>
    <style>
    .row { flex-wrap: wrap;display:flex;padding:0;margin-left:-15px;margin-right:-15px;width:auto; }
    .cell { flex-basis: 50%;flex-grow:1;height:auto }
    video { position:relative;left:auto;top:auto;bottom:auto;right:auto;transform:none;height:auto}
    .layout-page-banner { position:absolute;left:0;width:100%;height:150px}
    @media (max-width: 768px){
        .cell {
            width: 100%;
            display: block;
            flex-basis: 100%;
        }
        .layout-page-banner {
            height: auto;
        }  
    }
    </style>
@endsection

@section('scripts')
    <script>{!! html_entity_decode($layout_page->js) !!}</script>
@endsection

@section('content')
    <div id="laypage" class="container">
    {!! html_entity_decode($layout_page->html) !!}
    </div>
@endsection
