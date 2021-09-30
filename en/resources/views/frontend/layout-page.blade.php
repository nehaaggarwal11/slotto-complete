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
    .row { flex-wrap: wrap; }
    .cell { flex-basis: 50%; }
    </style>
@endsection

@section('scripts')
    <script>{!! html_entity_decode($layout_page->js) !!}</script>
@endsection

@section('content')
    <div class="container">
    {!! html_entity_decode($layout_page->html) !!}
    </div>
@endsection
