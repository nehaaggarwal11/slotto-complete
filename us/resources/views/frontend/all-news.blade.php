@extends('layouts.frontend')

@section('title','News Page')
@section('meta_tags')
    <title>{{ $data_news->seo_title }}</title>
    <meta content="{{ $data_news->seo_keyword }}" name="keywords">
    <meta content="{{ $data_news->seo_description }}" name="description">
@endsection
@section('content')
    <section id="news-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h1 class="news-heading">{{ $data_news->heading }}</h1>
                    <div class="news-detail">
                        {!! $data_news->news_text_less !!}
                        <div id="news-more-section" style="display: none">   
                            {!! $data_news->news_text_more !!}
                        </div>  
                        <a id="news-read-more" href="javascript:void(0);">Read More</a>  
                    </div>   
                </div>
            </div>


            <div class="row">
                <div class="col-md-8 offset-md-1 mt-4">
                    <h4 class="tips-heading">See your latest casino tips below</h4>

                    
                        <div class="search-bar">
                            <input type="text" placeholder="Search..." id="search">
                            <div class="search"></div>
                        </div>
                    <form method="get" action="{{ route('frontend.all-news') }}" id="news_form">    
                        <div class="form-group select-search-bar">
                            <select class="form-control search-select-option" name="category">
                                @foreach($news_category->unique('category') as $new)
                                    <option value="{{ $new->category }}" {{ $new->category == request()->input("category") ? 'selected="selected"' : '' }}>{{ $new->category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>

            </div>

            <div class="news-allscreen-view">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 offset-lg-1">
                        <div class="row" id="news-ajax"></div>
                        <div class="row justify-content-center" id="news-list">
                            @foreach($news as $news)
                                <div class="col-md-4 mb-4">
                                    <div class="single-blog blog-2 mt-30">
                                        <div class="blog-image">
                                            <a href="{{ $news->route }}"><img
                                                    src="{{ @$news->logo_img->url }}"
                                                    alt="{{ $news->logo_img_alt_text }}"></a>
                                        </div>
                                        <div class="blog-content">
                                            <h4 class="news-blog-title"><a href="{{ $news->route }}">{{ $news->name }}</a></h4>
                                            <p class="news-short-description">{{ Str::limit($news->small_description, 80) }}</p>
                                            <a class="btn read-blog-btn mx-auto d-block"
                                            href="{{ $news->route }}">Read Blog</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12 mt-30">
                        @include('partials.popular-casino-widget')
                    </div>
                </div>
            </div>    
           
            <div class="news-tablet-view">
                <div class="row">
                    <div class="col-md-10 offset-md-1 pull-md-1">
                        <div class="row" id="news-two-ajax"></div>
                        <div class="row justify-content-center mt-30" id="news-two-list">
                            @foreach($news_other as $news)
                                <div class="col-md-4 mt-4">
                                    <div class="single-blog blog-2">
                                        <div class="blog-image">
                                            <a href=""><img
                                                    src="{{ @$news->logo_img->url }}"
                                            alt="{{$news->logo_img_alt_text}}"></a>
                                        </div>
                                        <div class="blog-content">
                                            <h4 class="news-blog-title"><a
                                                    href="">{{$news->name}}</a></h4>
                                            <p class="news-short-description">{{ Str::limit($news->small_description, 100) }}</p>
                                            <a class="btn read-blog-btn mx-auto d-block"
                                            href="">Read Blog</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="row mt-30">
                    <div class="col-md-10 offset-md-1">
                        @include('partials.popular-casino-widget')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')

<script>
    $("#search").on('keyup',function(){
        var value = $(this).val();
        $.ajax({
            type : 'get',
            url : "{{ route('frontend.all-news.search')}}",
            data:{
                search: value,
            },
            success:function(data){
                $('#news-list').hide();
                $('#news-ajax').html(data);
                $('#news-two-list').hide();
                $('#news-two-ajax').html(data);
            },

            error: function(jqXHR, textStatus, errorThrown) {
                 console.log("AJAX error: " + textStatus + ' : ' + errorThrown)
            }
        })
    });  

 </script>

@endsection