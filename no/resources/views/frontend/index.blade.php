@extends('layouts.frontend')

@section('title','Home Page')
@section('meta_tags')
    <title>{{ $home_content->seo_title }}</title>
    <meta content="{{ $home_content->seo_keyword }}" name="keywords">
    <meta content="{{ $home_content->seo_description }}" name="description">
@endsection
@section('content')
<script type="application/ld+json">

{
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "https://www.slottomat.com/",
      "logo": "https://www.slottomat.com/asset/frontend/img/logo/logo2.png"
},
{
"@context": "https://schema.org",
"@graph": [{
    "@type": "WebSite",
    "@id": "https://www.slottomat.com/",
    "url": "https://www.slottomat.com/",
    "image": "https://www.slottomat.com/asset/frontend/img/logo/logo2.png",
    "name": "Slottomat",
    "description": "{{$home_content->seo_description}}",
    "potentialAction": [{
        "@type": "SearchAction",
        "target": {
            "@type": "EntryPoint",
            "urlTemplate": "https://www.slottomat.com/?s={search_term_string}"
        },
        "query-input": "required name=search_term_string"
    }]
}

</script>
    <style>
        section#slider-section {position: relative;padding-top: 0;overflow: hidden;transform: unset;display: list-item;}
        video#myVideo-desktop, video#myVideo-mobile {display: none;}
        video {position: relative;top: unset;transform: unset;left: unset;}
        .nj-hp-slider-box {display: block;position: absolute;height: 100%;width: 100%;top: -25px;}
        .nj-hp-slider-box .carousel{width: 100%;}
		.main-nav .drop-down > ul {left: 0;}

        @media only screen and (max-width: 767px) {
            video#myVideo-mobile {display: block;}
            #desktopView {display: none;}
            .top-casino-heading img{height: auto;}
        }

        @media only screen and (min-width: 768px) {
            video#myVideo-desktop , #carouselContent{display: block;}
        }
        .swal2-container {z-index: 10000;}
    </style>
    <!-- <div id="preloader" aria-label="happy pirate waving a flag">
    	<div class="preimg">
    		<img alt="slottomat preload circle" class="rotateme" src="/asset/frontend/img/slot/circle.png">
    		<img alt="online slot logo" class="prelogo" src="/asset/frontend/img/slot/logo.png">
    	</div>
    </div> -->
    @if(session('success'))
            <div class="alert alert-success mt-4" role="alert">
                {{ session('success') }}
            </div>
    @endif
    <section id="slider-section" class="slider-section shiftCon" style="background: #6f482b">

        <div id="desktopView" >
          <video class="desktopView" poster="{{asset('asset/frontend/img/desktop-img.webp')}}" title="parrot standing by a waterfall with a small pirate flag and treasure chest, sabel, pirate hat, and boat steering wheel" preload = "none" muted loop id="myVideo-desktop">
              <source src="{{ asset('asset/frontend/img/banners/casino-scenes.mp4')}}"
                      type="video/mp4">
          </video>
        </div>
        <div id="mobilView">
          <video class="mobilView" poster="" title="logo parrot standing by a waterfall and a small pirate flag and treasure chest" preload = "none"  muted loop id="myVideo-mobile">
              <source src="{{ asset('asset/frontend/img/banners/casino-mobile.mp4')}}"
                      type="video/mp4">
          </video>
        </div>
        <div class="nj-hp-slider-box">
            <div id="carouselContent" class="carousel slide" data-ride="carousel" data-interval="5000">
            	<div class="carhead">
            		<h1>Finn de beste nye online spilleautomatene</h1>
            	</div>
                <div class="carousel-inner" role="listbox">
                  @foreach($slider as $slider)
                    @if($loop->first)
                      <div class="carousel-item active">
                          <a class="thumb" href="{{$slider->slider_button_link}}"><img width="204" height="182" loading="lazy" alt="{{$slider->slide_title}}" src="{{ asset($slider->slider_img) }}" /></a>
                          <div class="text">{!! $slider->content !!}</div>
                          <div class="btnbo"><a class="splbtns" href="{{$slider->slider_button_link}}" data-text="play Demo" >Spill demo </a></div>
                      </div>
                    @else
                      <div class="carousel-item">
                          <a class="thumb" href="{{$slider->slider_button_link}}"><img width="204" height="182" loading="lazy" alt="{{$slider->slide_title}}" src="{{ asset($slider->slider_img) }}" /></a>
                          <div class="text">{!! $slider->content !!}</div>
                          <div class="btnbo"><a class="splbtns" href="{{$slider->slider_button_link}}" data-text="play Demo" >Spill demo </a></div>
                      </div>
                    @endif
                @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselContent"
                   role="button" data-slide="prev">
                <span class="carousel-control-prev-icon"
                      aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselContent"
                   role="button" data-slide="next">
                <span class="carousel-control-next-icon"
                      aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>

        <section id="rating-section" aria-label="vann" class="pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 offset-md-6 slottomat-table-tab">
                    <div class="casino-toggle">
                        <div class="wrap">
                            <input type="radio" id="casino" class="casino" name="radio">
                            <label for="casino">Casino</label>

                            <input type="radio" id="sport" class="sport" name="radio">
                            <label for="sport">Sport</label>

                            <div class="bar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-lg-none d-xl-block">
            <div class="waterfall-loop"></div>
            <div class="container-fluid">
                <div id="ripple-img"></div>
                <div class="row">
                    <div class="col-md-8 offset-md-3">
                        <div id="tabsJustifiedContent" class="tab-content">
                            <div id="casino-tab" class="casino-tab">
                                <div class="rating-headings">
                                    <h1 class="top-casino-heading"><img
                                            src="{{asset('asset/frontend/img/rating/star.png')}}"
                                            alt="to stjerner i gull med en liten og en stor stjerne"><span>Topp 10 Casino</span><img
                                            src="{{asset('asset/frontend/img/rating/star2.png')}}"
                                            alt="to stjerner i gull med en stor og en liten stjerne"></h1>
                                </div>
                                @include('partials.casino-table', compact('casinos'))
                                <button class="btn btn-primary view-btn mx-auto d-block" onclick="window.location.href='{{ route('frontend.casino-bonus') }}'">Se Alle</button>
                            </div>
                            <div id="sport-casino-tab" class="sport-casino-tab">
                                <div class="rating-headings">
                                    <h1 class="top-casino-heading"><img
                                            src="{{asset('asset/frontend/img/rating/star.png')}}"
                                            alt="to stjerner i gull med en liten og en stor stjerne"><span>Topp 10 Beste Betting Sider</span><img
                                            src="{{asset('asset/frontend/img/rating/star2.png')}}"
                                            alt="to stjerner i gull med en stor og en liten stjerne"></h1>
                                </div>
                                @include('partials.sport-table', compact('games'))
                                {{-- <button class="btn btn-primary view-btn mx-auto d-block" onclick="window.location.href='{{ route('frontend.betting') }}'">Se Alle</button> --}}
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <div class="about-div text-justify">
        <section id="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-col">
                            <h2 class="brownColor">{{ $home_content->welcome_heading }}</h2>
                            {!! $home_content->welcome_text_less !!}
                            <div id="more">
                                {!! $home_content->welcome_text_more !!}
                            </div>
                                <a class="rmore" id="myBtn" href="javascript:void(0);">Les Mer</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="sud" style="background:#2a5db8;">
        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
             style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
             viewBox="0 0 17707.28 1306.81"
        >
        <style type="text/css">
            .fil0 {
                fill: #0849a7;
            }
        </style>
            <g id="Layer_x0020_1" class="DarkWaves">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <path class="fil0"
                      d="M-0 1306.81l0 -173.57c1233.44,-172.03 1430.2,-1385.58 2778.37,-642.92 1250.96,689.11 1935.19,-429.67 3799.13,195.75 829.44,278.31 1417.97,-1059.44 2750.55,-314.21 1767.11,988.23 2075.82,-1133.74 3279.04,-59.49 624.04,557.16 1053.24,504.54 1741.86,17.8 374.17,-264.48 894.65,-178.97 1302.59,21.6 714.26,351.18 930.6,-659.4 2028.15,249.9 6.49,5.37 15.91,12.18 27.59,20.06l0 685.09 -17707.28 0z"/>
            </g>
            <style type="text/css">
                .fil1 {
                    fill: #0b014b
                }
            </style>
            <g id="Layer_x0020_1" class="LightWaves">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <path class="fil1"
                      d="M-0 1574.72l0 -895.97c252.71,-152.71 410.18,-143.73 669.66,-66.77 841.29,249.51 1710.41,212.85 2542.17,-171.75 968.19,-447.68 1521.42,198.03 2307.1,292.58 542.22,65.25 1184.59,-559.25 1909.56,-453.32 844.34,123.38 1172.56,746.52 2518.05,38.67 419.63,-220.76 1428.37,426.4 2113.95,426.4 1288.53,0 972.52,-842.07 2703.32,-141.96 1267.48,512.69 2325.09,-1006.19 2943.47,-496.37l0 1468.5 -17707.28 0z"/>
            </g>
    </svg>

    </div>

    <section class="slot-machine-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="section-title-item">
                        <h2>{{ $home_content->important_facts_heading }}
                        </h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row ">
                <div class="col-lg-12 col-md-12 wow fadeInUp"
                     data-wow-duration="1.5s"
                     style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="slot-machine-detail">
                        {!! $home_content->important_facts_text_less !!}
                        <div id="slot-machine-more-section">
                            {!! $home_content->important_facts_text_more !!}
                        </div>
                        <a class="rmore" id="slot-machine-read-more"
                           href="javascript:void(0);">Les Mer</a>
                    </div>
                </div> <!-- Col End -->

            </div> <!-- Row End -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-7 offset-md-2 mx-auto">
                    <div class="row justify-content-center">
                        @foreach($games ?? [] as $game)
                        <div class="col-6 col-md-6 col-lg-3 mb-4" data-id="{{ $game->id }}">
                            <div class="content">
                                <a href="{{ $game->route }}">
                                    <div class="content-overlay"></div>
                                    @if($game)
                                    <img loading="lazy" class="content-image"
                                        src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $game->logo_alt_text }}">
                                    @endif
                                    <div class="content-details fadeIn-top">
                                    <span class="gameh5Span">Game demo</span>
                                        <p>Read Review</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button
            class="btn btn-primary more-casino-btn mx-auto d-block splbtns" onclick="window.location.href='{{ route('frontend.all-games') }}'" data-text="Free Slots">Free Slots
            </button>
        </div>
        <div class="documentaion-shap-img">
            <img loading="lazy" class="d-shap-img-1 wow fadeInLeft animated octopus-one-img"
                 data-wow-duration="1.5s" id="leftglobe"
                 src="{{ asset('asset/frontend/img/fishes/octopus.gif')}}" alt="online slots octopus"
                 style="visibility: visible; animation-duration: 1.5s; animation-name: bounce;">
        </div>

    </section> <!-- slot machine section end -->
    <!-- wagering section start -->

    <!-- new casino section start -->
    <section class="new-casino-sec section-padding ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <img loading="lazy" src="{{ asset('asset/frontend/img/fishes/orange-fish.png')}}"
                         class="orange-fish" width="100" alt="Slottomat fish">
                    <div class="section-title-item">
                        <h2 class="d-none">New online Casino</h2>
                        <img loading="lazy" src="{{ asset('asset/frontend/img/gif/nye.gif')}}"
                             class="mx-auto d-block nye-img img-fluid" width="300" height="216"
                             alt="new online casinos">
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row">
                <div class="col-lg-12 col-md-12 wow fadeInUp"
                     data-wow-duration="1.5s"
                     style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="new-casino-detail">
                        {!! $home_content->new_online_casinos_text_less !!}
                        <div id="new-casino-more-section">
                            {!! $home_content->new_online_casinos_text_more !!}
                        </div>
                        <a class="rmore" id="new-casino-read-more" href="javascript:void(0);">les Mer</a>
                    </div>
                </div> <!-- Col End -->
            </div> <!-- Row End -->
        </div>
        <button class="btn btn-primary more-casino-btn mx-auto d-block splbtns" onclick="window.location.href='{{url ('new-slots-sites')}}'" data-text="New Slots Sites">New Slots Sites</button>
    </section> <!-- new casino section end -->

    <!-- find casino section start -->
    <section class="find-casino-sec section-padding text-justify">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <img loading="lazy" src="{{ asset('asset/frontend/img/fishes/pink-fish.png')}}"
                         class="fish d-none d-lg-block d-xl-block" width="130" alt="online casinos pink fish">
                    <div class="section-title-item">
                    <h2>{{ $home_content->find_favourite_casinos_heading }}</h2>
                    </div>
                </div>
            </div><!-- row end -->

            <div class="row">
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-duration="1.5s"
                     style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="find-casino-detail">
                        {!! $home_content->find_favourite_casinos_text_less !!}

                        <div id="find-casino-more-section">
                            {!! $home_content->find_favourite_casinos_text_more !!}
                        </div>
                        <a class="rmore" id="find-casino-read-more" href="javascript:void(0);">Les Mer</a>
                    </div>
                </div> <!-- Col End -->
            </div> <!-- Row End -->

        </div><!-- container fluid end -->

    </section> <!-- find casino section end -->

    <!-- mobile casino section start -->
    <section class="mobile-casino-sec pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="section-title-item">
                        <h2>{{ $home_content->find_mobile_casino_heading }}</h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row">
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-duration="1.5s"
                     style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="mobile-casino-detail">
                        {!! $home_content->find_mobile_casino_text_less !!}
                        <div id="mobile-casino-more-section">
                            {!! $home_content->find_mobile_casino_text_more !!}
                        </div>
                        <a class="rmore" id="mobile-casino-read-more"
                           href="javascript:void(0)">Les Mer</a>
                    </div>
                </div>
            </div><!-- row end -->
        </div><!-- container end -->

    </section> <!-- mobile casino section end -->





    <!-- Blog section start -->
    <section class="blog-sec  pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="section-title-item">
                        <span class="faqh2title">News</span>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row justify-content-center mt-30">
                @foreach($blog ?? [] as $news)
                <div class="col-md-4">
                    <div class="single-blog blog-2 mt-30">
                        <div class="blog-image">
                            <a href="{{ $news->route }}"><img loading="lazy"
                                src="{{ @$news->logo_img->url }}"
                                alt="{{ $news->logo_img_alt_text }}"></a>
                        </div>
                        <div class="blog-content">
                            <h5 class="news-blog-title"><a href="{{ $news->route }}">{{ $news->name }}</a></h5>
                            <p class="news-short-description">{{ Str::limit($news->small_description, 80) }}</p>
                            <a class="btn read-blog-btn mx-auto d-block splbtns purple"
                               href="{{ $news->route }}" data-text="Read News">Read News</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center"><a class="btn btn-primary more-blogs-btn splbtns"
                   href="{{ route('frontend.all-news') }}" data-text="More News">More News</a></div>
        </div><!-- container end -->


    </section> <!-- Blog section end -->

    <!-- Faq section start -->
    <section class="faq-sec section-padding" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="section-title-item">
                        <span class="section-title faqh2title">{{ $home_content->faq_heading }}</span>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row mt-30">
                <div class="col-lg-12 col-md-12 wow fadeInUp"
                     data-wow-duration="1.5s"
                     style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="faq-detail">
                        {!! $home_content->faq_text !!}
                     </div> <!-- Col End -->
                </div> <!-- Row End -->
            </div>
                @php
                  $faq_head = "";
                @endphp
                @include('partials.faq',compact('faq_head','faq_questions'))

                <a class="btn btn-primary mx-auto d-block faq-more-btn splbtns"
                   href="{{ route('frontend.faq') }}" data-text="More FAQ">More FAQ</a>

            </div>
            <div class="documentaion-shap-img">
            <img loading="lazy" class="d-shap-img-2 wow fadeInRight animated octopus-two-img"
                 data-wow-duration="1.5s"
                 src="{{ asset('asset/frontend/img/fishes/octopus2.gif')}}" alt="a happy yellow octopus ready to play online slots"
                 style="visibility: visible; animation-duration: 1.5s; animation-name: bounce;">

        </div>
        </div>
    </section> <!-- Faq section end -->
    <div id="newsletterModal" class="modal fade">
        <div class="modal-dialog modal-newsletter">
            <div class="modal-content" aria-label="skattekiste-spilleautomat">
                <form class="subscribeForm" action="{{ route('frontend.subscribers.subscribe') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h4>{{ $newsletter->heading}} </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! $newsletter->newsletter_description !!}
                        <div class="row">
                            <div class="col-md-12">
                                <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="checkbox" id="agree_newsletter_modal" name="agree" value="yes" required>
                            <label for="agree_newsletter_modal">
                                I accept
                                <a href="{{ route('frontend.page.terms') }}">terms & Condition </a> and
                                <a href="{{ route('frontend.page.privacy-policy') }}">Privacy Policy</a>
                            </label>
                        </div>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary">Subscribe</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
@endsection
@section('scripts')
   <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script> 
      <script>
      $(window).load(function(){
        if ($('#preloader').length) {
                  $('#preloader').delay(2000).fadeOut('slow');
              }
      });
      var sport = document.querySelector('.sport');
        var casino = document.querySelector('.casino');
        var casino_toggle = document.querySelector('.casino-toggle');
        $(".sport-casino-tab").hide();
        sport.addEventListener('click', () => {
            casino_toggle.classList.add('active');
            $(".casino-tab").hide();
            $(".sport-casino-tab").show();
        });
    
        casino.addEventListener('click', () => {
            casino_toggle.classList.remove('active');
            $(".sport-casino-tab").hide();
            $(".casino-tab").show();
        });
        $('.nj_sorting_table').DataTable();
    </script>
@endsection