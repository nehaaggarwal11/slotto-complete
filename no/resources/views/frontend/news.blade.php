@extends('layouts.frontend')

@section('title','News')
@section('meta_tags')
<title>{{ $news->seo_title }}</title>
<meta content="{{ $news->seo_keyword }}" name="keywords">
<meta content="{{ $news->seo_description }}" name="description">

<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "url": "{{ $news->route }}",
        "publisher":{
            "@type":"Organization",
            "name":"{{ $news->name }}",
            "logo":"{{ @$news->logo_img->url }}"
        },
        "headline": "{{ $news->name }}",
        "mainEntityOfPage": "{{ $news->route }}",
        "articleBody": "{{ $news->small_description }}",
        "image":"{{ @$news->bg_image->url }}",
        "datePublished":"{{ $news->created_at }}",
        "dateModified":"{{ $news->updated_at }}",
        "author": "slottomat"
    }
</script>
@endsection
@section('styles')
<style>
.gtco-testimonials {
  position: relative;
}
.gtco-testimonials h2 {
  font-size: 30px;
  text-align: center;
  color: #333333;
  margin-bottom: 50px;
}
.gtco-testimonials .owl-stage-outer {
  padding: 0px 0 30px;
}
.gtco-testimonials .owl-nav {
  display: block;
}
.gtco-testimonials .owl-dots {
  text-align: center;
}
.gtco-testimonials .owl-dots span {
  position: relative;
  height: 10px;
  width: 10px;
  border-radius: 50%;
  display: block;
  background: #fff;
  border: 2px solid #01b0f8;
  margin: 0 5px;
}
.gtco-testimonials .owl-dots .active {
  box-shadow: none;
}
.gtco-testimonials .owl-dots .active span {
  background: #01b0f8;
  box-shadow: none;
  height: 12px;
  width: 12px;
  margin-bottom: -1px;
}
.gtco-testimonials .card {
  background: #fff;
  box-shadow: 0 8px 30px -7px #c9dff0;
  margin: 0 20px;
  padding: 0 10px;
  border-radius: 20px;
  border: 0;
}
.gtco-testimonials .card .card-img-top {
  max-width: 100px;
  border-radius: 50%;
  margin: 15px auto 0;
  box-shadow: 0 8px 20px -4px #95abbb;
  width: 100px;
  height: 100px;
}
.gtco-testimonials .card h5 {
  color: #01b0f8;
  font-size: 21px;
  line-height: 1.3;
}
.gtco-testimonials .card h5 span {
  font-size: 18px;
  color: #666666;
}
.gtco-testimonials .card p {
  font-size: 18px;
  color: #555;
  padding-bottom: 15px;
}
.gtco-testimonials .center h5 {
  font-size: 24px;
}
.gtco-testimonials .center h5 span {
  font-size: 20px;
}
.gtco-testimonials .center .card-img-top {
  max-width: 100%;
  height: 120px;
  width: 120px;
}
.owl-prev, .owl-next {
	position: absolute;
	top: 50%;
	height: 100%;
}
.sl-new-section li{
  list-style: disc;
}
.owl-prev {
	left: 7px;
}

.owl-next {
	right: 7px;
}
.owl-nav .fas{
    color:#fff
}
@media (max-width: 767px) {
  .gtco-testimonials {
    margin-top: 20px;
  }
}
.owl-carousel .owl-nav button.owl-next, .owl-carousel .owl-nav button.owl-prev {
  outline: 0;
}
.owl-carousel button.owl-dot {
  outline: 0;
}
</style>
@endsection
@section('content')
<section id="single-news-section">
  <div class="sectionPTPB">
    <div class="container">
      <div id="NewsTtile">
           <span  class="text-uppercase" class="pb-2">Slottomat News</span>
       </div>
      <div class="row">
          <div id="leftNewsSection" class="col-md-8 col-sm-12">
            <div class="entry-header mb-4">
                      <h1 class="text-left">{{$news->name}}</h1>
                  </div>
              <div class="top-banner"
                  aria-label="{{ $news->bg_image_alt_text }}"
                  style="background-image: url('{{ @$news->bg_image->url }}');">
              </div>
              <div class="entry-main">
                  <div class="entry-meta"></div>
                  <div class="row">
                     <div class="col-md-6 sl-new-section">
                      <div class="entry-content">
                        {!! $news->description !!}
                      </div>
                  </div>
                  <div class="col-md-6 sl-new-section">
                      <div class="entry-content">
                        {!! $news->description2 !!}
                      </div>
                  </div>
                  </div>
              </div>
          </div>
          <div id="RightNewSection" class="col-md-4 col-sm-12">
            <div id="sideSecContent" class="row pl-3 mb-4">
              <div id="latestGames" class="bb">
                 <h2 class="text-left">Latest Games :</h2>
                  <div class="row">
                    @foreach($latest_games as $latest_game)
                    <div class="col-md-6 game-content mb-4">
                          <div class="content">
                              <a href="{{ $latest_game->route }}">
                                  <div class="content-overlay"></div>
                                  @if($latest_game)
                                  <img class="content-image"
                                      src="{{ $latest_game->logo ? $latest_game->logo->url : asset('asset/frontend/img/logo/game.png')}}" alt="{{ $latest_game->logo_alt_text }}">
                                  @endif
                                  <div class="content-details fadeIn-top">
                                      <span class="gameh5Span">Play <br/> {{ $latest_game->name }}<br/> demo</span>
                                  </div>
                              </a>
                          </div>
                    </div>
                    @endforeach
                  </div>
                    <div class="entry-meta"></div>
                  <div class="pl-1 pt-2">
                    <a class="splbtns" href="{{route('frontend.all-games')}}" data-text="View our free slots now">View our free slots</a>
                  </div>
                  <div class="entry-meta mt-2"></div>
              </div>
              <div class="entry-meta"></div>
              <div id="latestPost">
                <h2 class="text-left">Latest News :</h2>
                  <a href="/news/{{$latest_news->last()->slug}}">
                    <img src="{{$latest_news->last()->logo_img->url}}" alt="{{$latest_news->last()->logo_img_alt_text}}" width="100%" class="img-responsive mb-2">
                    <h5 class="text-left lthead">{{$latest_news->last()->name}}</h5>
                      </a>
                    <p>{{ $latest_news->last()->small_description }}</p>
              </div>
            </div>
            <div id="sideCol3" class="row pl-3 sl-new-section">
              <div class="">
                  <div class="entry-content">
                    {!! $news->description3 !!}
                  </div>
              </div>
            </div>

          </div>
      </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-12">
                    <h2 class="popular-casino-card-heading">Similar News</h2>
                </div>
            </div>

            <div class="gtco-testimonials">
                <div class="owl-carousel owl-carousel1 owl-theme" style="padding: 0 30px;" >
                    @foreach($similar_news ?? [] as $similar_news)
                    <div style="margin: 0 15px;" class="@if ($similar_news->id == $news->id) active-news @else inactive-news @endif">
                        <div class="single-blog blog-2 mt-30">
                            <div class="blog-image">
                                <a href="{{ $similar_news->route }}"><img
                                    src="{{ @$similar_news->logo_img->url }}"
                                    alt="{{ $similar_news->logo_img_alt_text }}"></a>
                            </div>
                            <div class="blog-content">
                                <h4 class="news-blog-title"><a href="{{ $similar_news->route }}">{{ $similar_news->name }}</a></h4>
                                <p class="news-short-description">{{ Str::limit($similar_news->small_description, 80) }}</p>
                                <a class="btn read-blog-btn mx-auto d-block splbtns purple" data-text="Read News"
                                href="{{ $similar_news->route }}">Read News</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

		<div class="row ">
    		<div class="spcomsec col-lg-12">@include('partials.news-comments')</div>
    	</div>
    </div>

    <div class="container">
        <div class="row popular_casino_row">
            <div class="col-md-12 mb-4">
                <h2 class="popular-casino-card-heading">{{ $news->popular_casinos_heading }}</h2>
            </div>
        </div>
                @include('partials.staytune', compact('casinos'))

    </div>
  </div>
</section>
@endsection
@section('scripts')
<script>
(function () {
  "use strict";
  $.getScript('https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js',function(){
      $(".owl-carousel1").owlCarousel({
        loop: true,
        center: true,
        margin: 0,
        responsiveClass: true,
        dots: false,
        nav: true,
        navText: ['<span class="fas fa-chevron-left fa-2x"></span>','<span class="fas fa-chevron-right fa-2x"></span>'],
        responsive: {
          0: {
            items: 1,
            nav: true
          },
          680: {
            items: 2,
            nav: true,
            loop: false
          },
          1000: {
            items: 3,
            nav: true
          }
        }
      });
  });


  (function ($) {

  })(jQuery);

    if(window.location.hash) {
        $([document.documentElement, document.body]).animate({
            scrollTop: $(window.location.hash).offset().top - 100
        }, 2000);
    }
})();

</script>
@endsection
