@extends('layouts.frontend')

@section('title','Review Page')
@section('meta_tags')
    <title>{{ $casino->seo_title }}</title>
    <meta content="{{ $casino->seo_keyword }}" name="keywords">
    <meta content="{{ $casino->seo_description }}" name="description">
@endsection
@section('content')
    <section id="review-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-30 ">
                    <div class="top-banner" style="background-color: {{ @$casino->bg_image_color }};">
                        <div class="casino-content position-absolute">
                            <h1>{{ $casino->name }}</h1>
                            <div class="casino-rating">
                                <div class="casino-star-rating">
                                    @if($casino->rating)
                                        <p>
                                            @for($i = 0; $i < $casino->rating; $i++)
                                                <span class="fa fa-star text-orange"></span>
                                            @endfor
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="casino-bonus">
                                <i class="fa fa-2x fa-gift" aria-hidden="true"></i>
                                <span class="bonus-amount">{{ $casino->banner_info }}</span>
                                {{--<span class="bonus-amount">Up to {{ $casino->bonus }}% Bonus</span>
                                <span class="spins-amount">+ {{ $casino->spins }} Free Spins</span>--}}
                            </div>
                            <div class="review-casino-btn">
                                <button class="btn btn-primary play-btn mx-auto d-block" onclick="window.location.href ='{{$casino->link}}'">Play Now</button>
                            </div>
                        </div>
                        <div class="casino-logo position-absolute">
                        <img src="{{ @$casino->logo_image->url }}" alt="{{ @$casino->logo_image_alt_text }}">
                        </div>
                    </div>

                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-overview"><i class="fa fa-eye" aria-hidden="true"></i> Overview</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-details"><i class="fa fa-bars" aria-hidden="true"></i> Details</a>
                    </div>

                    <div class="tab-content" id="nav-tab-review-content">
                        <div class="tab-pane fade show active" id="nav-overview" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="casino-review-tab">
                                <h6><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Casino Review</h6>
                                {!! $casino->overview !!}
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="nav-details" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="detail-review-tab">
                                <h6><i class="fa fa-tasks" aria-hidden="true"></i> Details</h6>
                                {!! $casino->detail !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row popular_casino_row">
                <div class="col-md-12">
                    <h2 class="popular-casino-card-heading">{{ @$casino->popular_casino_heading }}</h2>
                </div>
            </div>
            <div class="d-none d-lg-block d-xl-block">            
                <div class="row justify-content-md-center">
                @if(!empty($popular_casino))  
                    @foreach($popular_casino as $cas => $casino)
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
                    @endforeach   
                @endif    
                </div>
            </div>    
            <div class="d-block d-lg-none d-xl-none">
                <div class="row">  
                @if(!empty($popular_casino)) 
                    @foreach($popular_casino as $cas => $casino)
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
                    @endforeach
                @endif    
                </div>
            </div>

            <div class="row mt-30">
                <div class="col-md-12 mx-auto">
                    <h2 class="popular-casino-card-heading">{{ @$casino->games_heading }}</h2>
                    <div class="row justify-content-center">
                        @foreach($games ?? [] as $game)
                        <div class="col-6 col-md-2 mb-4 game-content">
                            <div class="content">
                                <a href="{{ $game->route }}">
                                    <div class="content-overlay"></div>
                                    <img class="content-image"
                                        src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{$game->logo_alt_text}}">
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

            <div class="row mt-4">
                <div class="col-lg-8 mx-auto">
                    <div class="section-title-item">
                        <h2 class="section-title">{{ @$casino->faq_heading }}</h2>
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
