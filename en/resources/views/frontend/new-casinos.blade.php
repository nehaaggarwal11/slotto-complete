@extends('layouts.frontend')

@section('title','Casino Bonus')
@section('meta_tags')
    <title>{{ $data->seo_title }}</title>
    <meta content="{{ $data->seo_keyword }}" name="keywords">
    <meta content="{{ $data->seo_description }}" name="description">
@endsection
@section('content')
    <section id="new-casino" class="new-casino">
        <div id="background-wrap">
            <div class="x1">
                <div class="cloud"></div>
            </div>
            <div class="x2">
                <div class="cloud"></div>
            </div>
            <div class="x3">
                <div class="cloud"></div>
            </div>
            <div class="x4">
                <div class="cloud"></div>
            </div>
            <div class="x5">
                <div class="cloud"></div>
            </div>
            <div class="bird-container bird-container--one">
                <div class="bird bird--one"></div>
            </div>

            <div class="bird-container bird-container--two">
                <div class="bird bird--two"></div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="new-casino-mainheading">{{ $data->heading }}</h2>
                    <p class="new-casino-subheading">{{ $data->sub_heading }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="casino-rating-headings">
                        <h1 class="new-top-casino-heading"><img
                                src="{{asset('asset/frontend/img/rating/star.png')}}"
                                alt="two golden stars"><span>Best New Casinos</span><img
                                src="{{asset('asset/frontend/img/rating/star2.png')}}"
                                alt="two golden stars"></h1>
                    </div>
                </div>
            </div>

                <div class="d-none d-lg-block d-xl-block">
                    <div class="row justify-content-md-center">
                    @if(!empty($casinos))  
                        @foreach($casinos as $cas => $casino)
                        @if($cas<=3)
                            <div class="col-md-3 mb-4">
                                <div class="casino-card" style="background-color:{{ $casino->bg_color}}">
                                    <div class="casino-card-content">
                                    @if($casino->featured_image)
                                    <a href="{{ $casino->link }}" target="_blank">
                                        <img src="{{ $casino->featured_image->getUrl('thumb') }}" alt="{{ $casino->featured_image_alt_text }}">
                                    </a>    
                                    @endif 
                                    <a href="{{ $casino->link }}" target="_blank">   
                                        <div class="casino-card-detail">
                                            <span>Welcome Bonus</span>
                                            {{ $casino->bonus_text }}
                                        </div>  
                                    </a>                                          
                                    </div>
                                    <div class="casino-play-content">
                                        <a href="{{ $casino->link }}" target="_blank" class="play-now-btn">Play Now</a>
                                    </div>
                                    <div class="casino-card-footer">
                                        <div class="age">18+</div>  
                                        <div class="casino-read-review">
                                            <a href="{{ $casino->route }}" class="read-review-btn">Read Review</a>
                                        </div>
                                        <div class="condition tooltip">T&C's 
                                            
                                            <div class="tooltiptext">
                                            <h5>T&C's Apply</h5> 
                                            <p>{{ $casino->info }}</p> 
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>
                            </div>   
                        @endif                              
                        @endforeach   
                    @endif    
                    </div>
                </div>    
                <div class="d-block d-lg-none d-xl-none">
                    <div class="row">  
                    @if(!empty($casinos)) 
                        @foreach($casinos as $cas => $casino)
                            @if($cas<=3)
                                <div class="col-6 mb-4">
                                    <div class="casino-card" style="background-color:{{ $casino->bg_color}}">
                                        <div class="casino-card-content">
                                        @if($casino->featured_image)
                                        <a href="{{ $casino->link }}" target="_blank">
                                            <img src="{{ $casino->featured_image->getUrl('thumb') }}" alt="{{ $casino->featured_image_alt_text }}">
                                        </a>
                                        @endif
                                        <a href="{{ $casino->link }}" target="_blank">
                                            <div class="casino-card-detail">
                                                <span>Welcome Bonus</span>
                                                {{ $casino->bonus_text }}
                                            </div>
                                        </a>
                                        </div>
                                        <div class="casino-play-content">
                                            <a href="{{ $casino->link }}" target="_blank" class="play-now-btn">Play Now</a>
                                        </div>
                                        <div class="casino-card-footer-mobile">

                                            <div class="condition-mobile tooltip">T&C's

                                                <div class="tooltiptext">
                                                <h5>T&C's Apply</h5>
                                                <p>{{ $casino->info }}</p>
                                                </div>
                                            </div>
                                            <div class="age">18+</div>
                                        </div>
                                        <div>
                                            <a href="{{ $casino->route }}" class="read-review-btn-mobile">Read Review</a>
                                        </div>
                                    </div>
                                </div>
                            @endif    
                        @endforeach
                    @endif    
                    </div>
                </div>

                <div class="row similar-games justify-content-md-center">
                    <div class="col-md-8 offset-md-2 pull-md-2">
                        <h2>{{ @$data->new_slots_heading }}</h2>
                        <div class="row">
                            @foreach($games ?? [] as $game)
                                <div class="col-6 col-md-2 mb-4 game-content">
                                    <div class="content">
                                        <a href="{{ $game->route }}">
                                            <div class="content-overlay"></div>
                                            <img class="content-image" src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $game->logo_alt_text }}">
                                            <div class="content-details fadeIn-top">
                                                <h5>Play {{ $game->name }} demo</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            <div class="row mt-30">
                <div class="col-md-12">
                    <div class="new-casino-detail">
                        {!! $data->new_casino_text_less !!}
                        <div id="new-casino-more-section">
                            {!! $data->new_casino_text_more !!}
                        </div>
                        <a id="new-casino-read-more" href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>
        </div>
            
            <!-- <div class="row rating-mobile d-block d-lg-none d-xl-none">
                <div class="col-md-12">
                    <div class="rating-headings">
                        <h2 class="top-casino-heading"><img
                                src="{{asset('asset/frontend/img/rating/star.png')}}"
                                alt="two golden stars"><span>New Casino</span><img
                                src="{{asset('asset/frontend/img/rating/star2.png')}}"
                                alt="two golden stars"></h2>
                    </div>
                    @include('partials.casino-table-mobile', compact('casinos'))
                    <button class="btn btn-primary view-btn mx-auto d-block">See More
                    </button>
                </div>
            </div> -->
        </div>
    </section>

    <div class="sud" style="background:#42bdf4;">
        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
             style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
             viewBox="0 0 17707.28 1306.81"
        >
        <style type="text/css">
            .fil0 { fill: #2aa5d2 }
        </style>
            <g id="Layer_x0020_1" class="DarkWaves">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <path class="fil0"
                      d="M-0 1306.81l0 -173.57c1233.44,-172.03 1430.2,-1385.58 2778.37,-642.92 1250.96,689.11 1935.19,-429.67 3799.13,195.75 829.44,278.31 1417.97,-1059.44 2750.55,-314.21 1767.11,988.23 2075.82,-1133.74 3279.04,-59.49 624.04,557.16 1053.24,504.54 1741.86,17.8 374.17,-264.48 894.65,-178.97 1302.59,21.6 714.26,351.18 930.6,-659.4 2028.15,249.9 6.49,5.37 15.91,12.18 27.59,20.06l0 685.09 -17707.28 0z"/>
            </g>
            <style type="text/css">
                .fil1 { fill: #0b014b }
            </style>
            <g id="Layer_x0020_1" class="LightWaves">
                <metadata id="CorelCorpID_0Corel-Layer"/>
                <path class="fil1"
                      d="M-0 1574.72l0 -895.97c252.71,-152.71 410.18,-143.73 669.66,-66.77 841.29,249.51 1710.41,212.85 2542.17,-171.75 968.19,-447.68 1521.42,198.03 2307.1,292.58 542.22,65.25 1184.59,-559.25 1909.56,-453.32 844.34,123.38 1172.56,746.52 2518.05,38.67 419.63,-220.76 1428.37,426.4 2113.95,426.4 1288.53,0 972.52,-842.07 2703.32,-141.96 1267.48,512.69 2325.09,-1006.19 2943.47,-496.37l0 1468.5 -17707.28 0z"/>
            </g>
    </svg>

    </div>
    <section id="new-casino-content" class="new-casino-content">
        <div class="container-fluid">
            <div class="row mt-30">
                <div class="col-md-2">
                    <div class="documentaion-shap-img">
                        <img class="d-shap-img-1 casino-jelly-img wow fadeInLeft animated"
                             data-wow-duration="1.5s" id="leftglobe"
                             src="{{ asset('asset/frontend/img/fishes/jelly-octopus.gif')}}" alt="a big red moving octopus"
                             style="visibility: visible; animation-duration: 1.5s; animation-name: bounce;width:150px;">
                    </div>
                </div>
                <div class="col-md-8">
                    {!! $data->new_online_casino_text !!}
                </div>
                <div class="col-md-2">
                    <div class="documentaion-shap-img">
                        <img class="casino-tortoise-img wow fadeInLeft animated"
                             data-wow-duration="1.5s"
                             src="{{ asset('asset/frontend/img/fishes/tortoise.gif')}}" alt="a smiling tortoise moving across the ocean"
                             style="visibility: visible; animation-duration: 1.5s; animation-name: bounce;">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-8 mx-auto">
                    <div class="section-title-item">
                        <h2 class="section-title">{{ @$data->faq_heading }}</h2>
                    </div>
                </div>
            </div><!-- row end -->
            <div class="row">
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
