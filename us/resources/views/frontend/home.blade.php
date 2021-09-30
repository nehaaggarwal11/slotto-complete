@extends('layouts.frontend')

@section('title','Home Page')
@section('meta_tags')
    <title>{{ $home_content->seo_title }}</title>
    <meta content="{{ $home_content->seo_keyword }}" name="keywords">
    <meta content="{{ $home_content->seo_description }}" name="description">
@endsection
@section('content')
    <style>
        section#slider-section {
            position: relative;
            padding-top: 0;
            overflow: hidden;
            transform: unset;
            display: list-item;
            margin-bottom: -5px
        }

        div#carouselContentMobile {
            position: absolute;
            top: 50%;
            width: 100%;
            transform: translateY(-50%);
        }

        div#carouselContentMobile {
            top: 42%;
            width: 100%;
            transform: translateY(-50%);
            position: absolute;
            left: unset;
            right: unset;
        }

        video#myVideo-desktop, video#myVideo-mobile, #carouselContent, #carouselContentMobile {
            display: none;
        }

        video {
            position: relative;
            top: unset;
            transform: unset;
            left: unset;
        }

        .nj-hp-slider-box {
            display: block;
            position: absolute;
            height: 100%;
            width: 100%;
            top: -25px;
        }
        .nj-hp-slider-box .carousel{ width: 100%; }

        .main-nav .drop-down > ul {
            right: 0;
            left: unset;
        }

        .slot-machine-sec .container-fluid {
            position: relative
        }

        @media only screen and (max-width: 767px) {
            video#myVideo-mobile, #carouselContentMobile {
                display: block;
            }
            video#myVideo-desktop {
                display: none;
            }
            .mobile-pirate, .mobile-submarine
            {
                display: block;
            }
            .screen-pirate,.screen-submarine
            {
                display: none;
            }
        }

        @media only screen and (min-width: 768px) {
            video#myVideo-desktop , #carouselContent{
                display: block;
            }

            .mobile-pirate, .mobile-submarine
            {
                display: none;
            }
            .screen-pirate,.screen-submarine
            {
                display: block;
            }
            #carouselContent {
                position: absolute;
                top: 50%;
                left: unset;
                right: unset;
                transform: translateY(-50%);
            }
        }
        .swal2-container {z-index: 10000;}
    </style>
    <div id="preloader" aria-label="happy pirate waving a flag"></div>
    @if(session('success'))
            <div class="alert alert-success mt-4" role="alert">
                {{ session('success') }}
            </div>
    @endif
    <section id="slider-section">
        <video title="parrot standing by a waterfall with a small pirate flag and treasure chest, sabel, pirate hat, and boat steering wheel" autoplay muted loop id="myVideo-desktop">
            <source src="{{ asset('asset/frontend/img/banners/casino-scenes.mp4')}}"
                    type="video/mp4">
        </video>
        <video title="logo parrot standing by a waterfall and a small pirate flag and treasure chest" autoplay muted loop id="myVideo-mobile">
            <source src="{{ asset('asset/frontend/img/banners/casino-mobile.mp4')}}"
                    type="video/mp4">
        </video>
        <div class="nj-hp-slider-box">
            <div id="carouselContent" class="carousel slide" data-ride="carousel" data-interval="5000">
                <div class="carousel-inner" role="listbox">
                    @foreach($slider_casinos as $casino_num => $casino)
                        <div class="carousel-item {{ $casino_num == 0 ? 'active':'' }} text-center">
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <div class="slider-content">
                                        <h2>{{ $casino->home_page_slider_title }}</h2>
                                        <p>{{ $casino->info }}</p>
                                        <button class="casino-btn" onclick="window.location.href = '{{ $casino->link }}'">Visit Casino</button>
                                    </div>
                                </div>
                                <div class="col-md-1 pull-md-2">
                                    <div class="slider-image">
                                        <img src="{{ @$casino->transparent_logo_image->url }}"
                                         alt="{{ $casino->transparent_logo_image_alt_text }}" class="logo-icon-img">
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <div id="carouselContentMobile" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                @foreach($slider_casinos as $casino_num => $casino)
                    <div class="carousel-item {{ $casino_num == 0 ? 'active':'' }} text-center">
                        <div class="content-left">
                            <h2>{{ $casino->home_page_slider_title }}</h2>
                            <p>{{ $casino->info }}</p>
                            <button class="casino-btn" onclick="window.location.href = '{{ $casino->link }}'">Visit Casino</button>
                        </div>
                        <div class="content-right">
                            <img src="{{ @$casino->transparent_logo_image->url }}"
                                 alt="{{ $casino->transparent_logo_image_alt_text }}" class="img-responsive logo-icon-img">
                        </div>
                    </div>
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

    <section id="rating-section" aria-label="vann">
        <div class="d-none d-lg-block d-xl-block">
            <div class="waterfall-loop"></div>
            <div class="container-fluid">
                <div id="ripple-img"></div>
                <div class="row">
                    <div class="col-md-8 offset-md-3">
                        <div class="rating-headings">
                            <h1 class="top-casino-heading"><img
                                    src="{{asset('asset/frontend/img/rating/star.png')}}"
                                    alt="two golden stars"><span>Best online casinos 2020</span><img
                                    src="{{asset('asset/frontend/img/rating/star2.png')}}"
                                    alt="two golden stars"></h1>
                        </div>
                        @include('partials.casino-table', compact('casinos'))
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="rating-section-mobile">
        <div class="d-block d-lg-none d-xl-none">
            <div class="container-fluid">
                <div id="ripple-img"></div>
                <div class="row rating-mobile">
                    <div class="col-md-12">
                        <div class="rating-headings">
                            <h2 class="top-casino-heading">
                                <img src="{{asset('asset/frontend/img/rating/star.png')}}" alt="two golden stars of different sizes">
                                <span>Best online casinos 2020</span>
                                <img src="{{asset('asset/frontend/img/rating/star2.png')}}" alt="two golden stars of different sizes">
                            </h2>
                        </div>
                        @include('partials.casino-table-mobile', compact('casinos'))
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="about-div" aria-label="brun bakgrunn">
        <section id="about-section">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('asset/frontend/img/gif/boat.gif')}}" class="water-ripple-img" alt="a sailing boat with three sails with the number seven and a small sign that says welcome">
                    </div>
                    <div class="col-md-7">
                        <div class="about-col">
                            <h3>{{ $home_content->welcome_heading }}</h3>
                            {!! $home_content->welcome_text_less !!}
                            <span id="more">
                                {!! $home_content->welcome_text_more !!}
                            </span>
                                <a id="myBtn" href="javascript:void(0);">Read More</a>
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
        <div class="container-fluid">
            <div id="particle"></div>
            <div class="row">
                <div class="col-md-2 mobile-pirate">
                    <img src="{{ asset('asset/frontend/img/gif/diving.gif')}}"
                         alt="a pirate with scuba diving gear swimming underwater with a bag of gold coins" class="diving-mobile">
                </div>
                <div class="col-lg-8 mx-auto">
                    <div class="section-title-item">
                        <h2 class="section-title">{{ $home_content->important_facts_heading }}
                        </h2>

                    </div>
                </div>
            </div><!-- row end -->
            <div class="row">
                <div class="col-lg-8 col-md-8 offset-md-2 wow fadeInUp"
                     data-wow-duration="1.5s"
                     style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="slot-machine-detail">
                        {!! $home_content->important_facts_text_less !!}
                        <div id="slot-machine-more-section">
                            {!! $home_content->important_facts_text_more !!}
                        </div>
                        <a id="slot-machine-read-more"
                           href="javascript:void(0);">Read More</a>
                    </div>
                </div> <!-- Col End -->
                <div class="col-md-2 screen-pirate">
                    <img src="{{ asset('asset/frontend/img/gif/diving.gif')}}"
                         alt="a pirate with scuba diving gear swimming underwater with a bag of gold coins" class="diving pirate">
                </div>
            </div> <!-- Row End -->
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 offset-md-2 mx-auto">
                    <div class="row">
                        @foreach($games ?? [] as $game)
                        <div class="col-6 col-md-3 mb-4">
                            <div class="content">
                                <a href="{{ $game->route }}">
                                    <div class="content-overlay"></div>
                                    @if($game)
                                    <img class="content-image"
                                        src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $game->logo_alt_text }}">
                                    @endif
                                    <div class="content-details fadeIn-top">
                                        <h5>Game demo</h5>
                                        <p>Read Review</p>                                                    </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button
            class="btn btn-primary more-casino-btn mx-auto d-block" onclick="window.location.href='{{ route('frontend.all-games') }}'">Games
            </button>
        </div>
        <div class="documentaion-shap-img">
            <img class="d-shap-img-1 wow fadeInLeft animated octopus-one-img"
                 data-wow-duration="1.5s" id="leftglobe"
                 src="{{ asset('asset/frontend/img/fishes/octopus.gif')}}" alt="a big blue octopus walking away"
                 style="visibility: visible; animation-duration: 1.5s; animation-name: bounce;">
        </div>

    </section> <!-- slot machine section end -->
    <!-- wagering section start -->
    
    <!-- find casino section start -->
    <section class="find-casino-sec section-padding" style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 mobile-submarine">
                    <img src="{{ asset('asset/frontend/img/gif/submarine.gif')}}"
                         class="diving-submarine" alt="a moving casino submarine with a pink propeller and bubbles coming out of the engine">
                </div>
                <div class="col-lg-8 mx-auto">
                    <img src="{{ asset('asset/frontend/img/fishes/pink-fish.png')}}"
                         class="fish d-none d-lg-block d-xl-block" width="130" alt="a small pink fish with big eyes">
                    <div class="section-title-item">
                    <h2 class="section-title">{{ $home_content->find_favourite_casinos_heading }}</h2>
                    </div>
                </div>
            </div><!-- row end -->

            <div class="row">
                <div class="col-lg-6 col-md-6 screen-submarine">
                    <img src="{{ asset('asset/frontend/img/gif/submarine.gif')}}"
                         class="diving" alt="a moving casino submarine with a pink propeller and bubbles coming out of the engine">
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                     style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="find-casino-detail">
                        {!! $home_content->find_favourite_casinos_text_less !!}

                        <div id="find-casino-more-section">
                            {!! $home_content->find_favourite_casinos_text_more !!}
                        </div>
                        <a id="find-casino-read-more" href="javascript:void(0);">Read More</a>
                    </div>
                </div> <!-- Col End -->
            </div> <!-- Row End -->

        </div><!-- container fluid end -->

    </section> <!-- find casino section end -->

    <!-- mobile casino section start -->
    <section class="mobile-casino-sec">
        <div class="container">
            <div class="row">
            <div class="col-md-2 mobile-pirate">
                    <img src="{{ asset('asset/frontend/img/gif/typing-on-mobile.gif')}}"
                         class="typing-mobile-imgs mx-auto d-block" alt="a pirate holding a mobile phone and a large mobile phone in the background showing what he is writing">
                </div>
                <div class="col-lg-8 mx-auto">
                    <div class="section-title-item">
                        <h2 class="hvordan-title section-title">{{ $home_content->find_mobile_casino_heading }}</h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row">
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-duration="1.5s"
                     style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <div class="mobile-casino-detail">
                        {!! $home_content->find_mobile_casino_text_less !!}
                        <div id="mobile-casino-more-section">
                            {!! $home_content->find_mobile_casino_text_more !!}
                        </div>
                        <a id="mobile-casino-read-more"
                           href="javascript:void(0)">Read More</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mx-auto wow fadeInUp screen-submarine"
                     data-wow-duration="1.5s"
                     style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                    <img src="{{ asset('asset/frontend/img/gif/typing-on-mobile.gif')}}"
                         class="typing-mobile-img" alt="a pirate holding a mobile phone and a large mobile phone in the background showing what he is writing">
                </div>
            </div><!-- row end -->
        </div><!-- container end -->

    </section> <!-- mobile casino section end -->





    <!-- Blog section start -->
    <section class="blog-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="section-title-item">
                        <h2 class="section-title">Blog
                        </h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row justify-content-center mt-30">
                @foreach($blog ?? [] as $news)
                <div class="col-md-4">
                    <div class="single-blog blog-2 mt-30">
                        <div class="blog-image">
                            <a href="{{ $news->route }}"><img
                                src="{{ @$news->logo_img->url }}"
                                alt="{{ $news->logo_img_alt_text }}"></a>
                        </div>
                        <div class="blog-content">
                            <h4 class="news-blog-title"><a href="{{ $news->route }}">{{ $news->name }}</a></h4>
                            <p>{{ Str::limit($news->small_description, 80) }}</p>
                            <a class="btn read-blog-btn mx-auto d-block"
                               href="{{ $news->route }}">Read Blog</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="btn btn-primary more-blogs-btn"
                   href="{{ route('frontend.all-news') }}">More Blog</a>
        </div><!-- container end -->


    </section> <!-- Blog section end -->

    <!-- Faq section start -->
    <section class="faq-sec section-padding" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="section-title-item">
                        <h2 class="section-title">{{ $home_content->faq_heading }}</h2>
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
                <div class="col-md-12">
                    <div class="faq-accordion">
                        <div class="panel-group" id="accordion" role="tablist"
                             aria-multiselectable="true">
                             @foreach($faq_questions as $faq)
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
                <a class="btn btn-primary mx-auto d-block faq-more-btn"
                   href="{{ route('frontend.faq') }}">More FAQ</a>

            </div>
            <div class="documentaion-shap-img">
            <img class="d-shap-img-2 wow fadeInRight animated octopus-two-img"
                 data-wow-duration="1.5s"
                 src="{{ asset('asset/frontend/img/fishes/octopus2.gif')}}" alt="a happy yellow octopus wearing a bandana and holding a sword"
                 style="visibility: visible; animation-duration: 1.5s; animation-name: bounce;">

        </div>
        </div>
    </section> <!-- Faq section end -->
    <div id="newsletterModal" class="modal fade">
        <div class="modal-dialog modal-newsletter">
            <div class="modal-content" aria-label="skattekiste-spilleautomat">
                <form id="subscribeForm" action="{{ route('frontend.subscribers.subscribe') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h4>{{ $newsletter->heading}}</h4>
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
                            <input type="checkbox" id="agree_newsletter" name="agree" value="yes" required>
                            <label for="agree_newsletter">
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
