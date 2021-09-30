@extends('layouts.frontend')

@section('title','Software Games')
@section('meta_tags')
    <title>{{ $software->seo_title }}</title>
    <meta content="{{ $software->seo_keyword }}" name="keywords">
    <meta content="{{ $software->seo_description }}" name="description">
@endsection
@section('content')
<section id="single-game-section">
    <div class="game-top-banner" style="background-color: {{ $software->bg_image_color}}"  no-repeat center center / cover;">
        <div class="game-banner-content position-absolute">
            <img class="game-bg-logo" src="{{ $software->bg_image_logo ? $software->bg_image_logo->url : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $software->bg_image_logo_alt_text }}">
            <h1>{{ $software->bg_image_text }}</h1>
            <button onclick="window.location.href = '{{ $software->bg_image_button_link }}'" class="play-single-btn">{{ $software->bg_image_button_text }}</button>
        </div>
    </div>

    <div class="software-content">
        <div class="container">
            <div class="row mt-30">
                <div class="col-md-12">
                    <h2 class="mb-3">{{ $software->heading }}</h2>
                    <p class="software-description">{!! $software->description !!}</p>
                </div>
            </div>

            <div class="row mt-30 mb-60">
                <div class="offset-md-3 col-md-3">
                    <div class="top-widget space50">
                        <form>
                            <div class="search-bar">
                                <input type="text" placeholder="Search..." id="search">
                                <div class="search"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>    
            <div class="row popular_casino_row">
                <div class="col-md-12 mb-4">
                    <h2 class="popular-casino-card-heading">{{ $software->popular_casino_heading }}</h2>
                </div>
            </div>    
            <div class="d-none d-lg-block d-xl-block">
                <div class="row justify-content-md-center">               
                @foreach($casinos as $cas => $casino)
                    @if($cas<=8)
                        <div class="col-md-3 mb-4" data-casino-id="{{ $casino->id }}">
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
                </div>
            </div>    
            <div class="d-block d-lg-none d-xl-none">
                <div class="row">  
                @foreach($casinos as $cas => $casino)
                    @if($cas<=8)
                        <div class="col-md-6 mb-4">
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
                                    <div class="age">18+</div>
                                    <div class="condition-mobile tooltip">T&C's

                                        <div class="tooltiptext">
                                        <h5>T&C's Apply</h5>
                                        <p>{{ $casino->info }}</p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div>
                                    <a href="{{ $casino->route }}" class="read-review-btn-mobile">Read Review</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-md-12">
                    <h2 class="mb-3">{{ $software->new_slots_heading }}</h2>
                    <div class="row justify-content-center">                        
                        @foreach($new_slots ?? [] as $new_slot)
                        <div class="col-6 col-md-2 mb-4 game-content">
                            <div class="content">
                                <a href="{{ $new_slot->route }}">
                                    <div class="content-overlay"></div>
                                    <img class="content-image"
                                        src="{{ $new_slot->logo ? $new_slot->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{$new_slot->logo_alt_text}}">
                                    <div class="content-details fadeIn-top">
                                        <h5>Play {{ $new_slot->name }} demo</h5>      
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
                    <h2 class="mb-3">{{ $software->popular_slots_heading }}</h2>
                    <div class="row justify-content-center">
                        @foreach($popular_slots ?? [] as $popular_slot)
                        <div class="col-6 col-md-2 mb-4 game-content">
                            <div class="content">
                                <a href="{{ $popular_slot->route }}">
                                    <div class="content-overlay"></div>
                                    <img class="content-image"
                                        src="{{ $popular_slot->logo ? $popular_slot->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{$popular_slot->logo_alt_text}}">
                                    <div class="content-details fadeIn-top">
                                        <h5>Play {{ $popular_slot->name }} demo</h5>
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
                    <h2 class="mb-3">{{ $software->all_slots_heading }}</h2>
                    <div class="row justify-content-center">
                        @foreach($all_slots ?? [] as $all_slot)
                        <div class="col-6 col-md-2 mb-4 game-content">
                            <div class="content">
                                <a href="{{ $all_slot->route }}">
                                    <div class="content-overlay"></div>
                                    <img class="content-image"
                                        src="{{ $all_slot->logo ? $all_slot->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $all_slot->logo_alt_text}}">
                                    <div class="content-details fadeIn-top">
                                        <h5>Play {{ $all_slot->name }} demo</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-4 html-content">
                    {!! $software->content !!}
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-lg-8 mx-auto">
                    <div class="section-title-item">
                        <h2 class="section-title">{{ @$software->faq_heading }}</h2>
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
            {{--@if($software->content && is_object($content = json_decode($software->content)))
            @foreach($content as $ckey => $row)
            <div class="row">
                <div class="col-md-12 mt-4">
                    <h2 class="mb-3">{{ @$row->heading}}</h2>
                    <p class="software-description">{!! @$row->description !!}</p>
                </div>
            </div>
            @endforeach
            @endif--}}
        </div>
    </div>
</section>
@endsection
