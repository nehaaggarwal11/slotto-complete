@extends('layouts.frontend')

@section('title','News')
@section('meta_tags')
<title>{{ $news->seo_title }}</title>
<meta content="{{ $news->seo_keyword }}" name="keywords">
<meta content="{{ $news->seo_description }}" name="description">
@endsection
@section('content')
@if(session('success'))
<div class="alert alert-success mt-4" role="alert" id="success-msg">
    {{ session('success') }}
</div>
@endif
<section id="single-news-section">
    <div class="container">
        <div class="news-allscreen-view">
            <div class="row">
                <div class="col-lg-10 col-md-8 col-sm-12 offset-lg-1">
                    <div class="top-banner"
                        aria-label="{{ $news->bg_image_alt_text }}"
                        style="background-image: url('{{ @$news->bg_image->url }}');">
                    </div>
                    <div class="entry-main">
                        <div class="entry-meta"></div>
                        <div class="entry-header">
                            <h1>{{$news->name}}</h1>
                        </div>
                        <div class="entry-content">
                            {!! $news->description !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-30">
                <div class="col-md-12">
                    <h2 class="popular-casino-card-heading">{{ $news->similar_news_title }}</h2>
                </div>
                <div class="row">    
                    @foreach($similar_news ?? [] as $similar_news)
                    <div class="col-md-4">
                        <div class="single-blog blog-2 mt-30">
                            <div class="blog-image">
                                <a href="{{ $similar_news->route }}"><img
                                    src="{{ @$similar_news->logo_img->url }}"
                                    alt="{{ $similar_news->logo_img_alt_text }}"></a>
                            </div>
                            <div class="blog-content">
                                <h4 class="news-blog-title"><a href="{{ $similar_news->route }}">{{ $similar_news->name }}</a></h4>
                                <p>{{ Str::limit($similar_news->small_description, 80) }}</p>
                                <a class="btn read-blog-btn mx-auto d-block"
                                href="{{ $similar_news->route }}">Read News</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div> 
            
            <div class="row">
                <div class="col-lg-10 col-md-8 col-sm-12 offset-lg-1">   
                    
                    <div class="section-comment">
                        <h2>Comment 
                        <!-- <span>({{ $comments->count() }})</span> -->
                        </h2>
                        <ul class="comments-list list-unstyled">
                            @foreach($comments as $comment)
                            @if($comment->status==1)
                            <li>
                                <article class="comment clearfix">
                                    <div class="comment-inner">
                                        <header class="comment-header">
                                            <cite
                                                class="comment-author">{{ $comment->name }}</cite>
                                            <time class="comment-datetime"
                                                datetime="2019-10-27">{{ $comment->created_at->format('F d, Y') }}
                                            </time>
                                        </header>
                                        <div class="comment-body">
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="section-reply-form">
                        <h2>Leave a Comment</h2>
                        <form action="{{ route("frontend.news.comment") }}"
                            method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control">
                                        <input type="hidden" name="news_id"
                                            value="{{ $news->id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea class="form-control"
                                            name="comment" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" id="netent">
                                    <label id="accept-label" for="netent">I accept <a
                                            href="{{ route('frontend.page.terms') }}">terms & condition</a>
                                        and <a
                                            href="{{ route('frontend.page.privacy-policy') }}">Privacy Policy</a>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-comment"
                                        value="Submit">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            
        </div>

        <div class="news-tablet-view">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="top-banner"
                        aria-label="{{ $news->bg_image_alt_text }}"
                        style="background-image: url('{{ @$news->bg_image->url }}');">
                    </div>
                    <div class="entry-main">
                        <div class="entry-meta"></div>
                        <div class="entry-header">
                            <h2>{{$news->name}}</h2>
                        </div>
                        <div class="entry-content">
                            {!! $news->description !!}
                        </div>
                    </div>
                    <div class="section-comment">
                        <h2>Comment 
                        <!-- <span>({{ $comments->count() }})</span> -->
                        </h2>
                        <ul class="comments-list list-unstyled">
                            @foreach($comments as $comment)
                            @if($comment->status==1)
                            <li>
                                <article class="comment clearfix">
                                    <div class="comment-inner">
                                        <header class="comment-header">
                                            <cite
                                                class="comment-author">{{ $comment->name }}</cite>
                                            <time class="comment-datetime"
                                                datetime="2019-10-27">{{ $comment->created_at->format('F d, Y') }}
                                            </time>
                                        </header>
                                        <div class="comment-body">
                                            <p>{{ $comment->comment }}</p>
                                        </div>
                                    </div>
                                </article>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="section-reply-form">
                        <h2>Leave Your Comment</h2>
                        <form action="{{ route("frontend.news.comment") }}"
                            method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name"
                                            class="form-control">
                                        <input type="hidden" name="news_id"
                                            value="{{ $news->id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <textarea class="form-control"
                                            name="comment" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" id="netent">
                                    <label id="accept-label" for="netent">I accept <a
                                            href="{{ route('frontend.page.terms') }}">terms & condition</a>
                                        and <a
                                            href="{{ route('frontend.page.privacy-policy') }}">privacy policy</a>
                                    </label>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-comment"
                                        value="Submit">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row popular_casino_row">
            <div class="col-md-12 mb-4">
                <h2 class="popular-casino-card-heading">{{ $news->popular_casinos_heading }}</h2>
            </div>            
        </div> 
        <div class="d-none d-lg-block d-xl-block">
            <div class="row justify-content-md-center">
            @if(!empty($casinos))  
                @include('partials.casino-card', compact('casinos'))
            @endif    
            </div>
        </div>    
        <div class="d-block d-lg-none d-xl-none">
            <div class="row">  
            @if(!empty($casinos)) 
                @include('partials.casino-table-mobile', compact('casinos'))
            @endif    
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-8 mx-auto">
                <div class="section-title-item">
                    <h2 class="section-title">{{ @$news->faq_heading }}</h2>
                </div>
            </div>
        </div><!-- row end -->
        <div class="row mt-30">
            <div class="col-md-12">
                <div class="faq-accordion">
                    <div class="panel-group" id="accordion" role="tablist"
                        aria-multiselectable="true">
                        @foreach($faq_questions ?? [] as $faq)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab"
                                id="heading{{ $faq->id }}">
                                <h4 class="panel-title">
                                    <a class="collapsed"
                                    data-toggle="collapse"
                                    data-parent="#accordion"
                                    href="#collapse{{ $faq->id }}"
                                    aria-expanded="false"
                                    aria-controls="collapse{{ $faq->id }}">{{ $faq->question }}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $faq->id }}"
                                class="panel-collapse collapse"
                                role="tabpanel"
                                aria-labelledby="heading{{ $faq->id }}">
                                <div class="panel-body">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection