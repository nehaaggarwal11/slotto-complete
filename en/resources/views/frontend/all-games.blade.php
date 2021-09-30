@extends('layouts.frontend')

@section('title','All Games')
@section('meta_tags')
    <title>{{ $data->seo_title }}</title>
    <meta content="{{ $data->seo_keyword }}" name="keywords">
    <meta content="{{ $data->seo_description }}" name="description">
@endsection
@section('content')
    <section id="games-new-section">
        @php($bg_image = \App\StaticPage::getMediaField('all-game', 'bg_image'))
        <div class="game-top-banner" style="background: url('{{ $bg_image->url }}') no-repeat center center / cover;" aria-label="{{ @$data->bg_image_alt_text }}">
            <div class="game-banner-content position-absolute">
                <h1>{{ @$data->bg_image_heading }}</h1>
                <p>{{ @$data->bg_image_text }} </p>
            </div>
        </div>
        <div class="games-section-content">
            <div class="container-fluid">
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
                <div class="row mt-30 justify-content-md-center">
                    <div class="col-md-2 filter-screen">
                        <form method="get" action="{{ route('frontend.all-games') }}" id="games_filter_form">
                            <div class="filter">
                                <div class="vertical-filters">
                                    <span>Filter</span>
                                    <a href="{{ route('frontend.all-games') }}" class="float-right reset-filter">Reset
                                    </a>
                                </div>
                                <div class="vertical-filters-filters provider-container">
                                    <a data-toggle="collapse" href="#providerCollapse" aria-expanded="false"
                                    aria-controls="myCollapseExample">
                                    <span class="vertical-filters-header">Provider <i
                                            class="fa fa-chevron-down"></i></span>
                                    </a>
                                    <ul class="brand-list collapse checkbox-list" id="providerCollapse">
                                        @foreach($games_data->unique('provider') as $game)
                                            @if(!empty($game->provider))
                                                <li>
                                                    <div class="form-group">
                                                        <input id="{{ Str::slug($game->provider) }}" name="provider[]" type="checkbox" {{ request()->input("provider") && in_array($game->provider, request()->input("provider")) ? "checked='checked'": "" }} value="{{ $game->provider }}">
                                                        <label for="{{ Str::slug($game->provider) }}">{{ $game->provider }}</label>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="vertical-filters-filters provider-container">
                                    <span class="vertical-filters-header">RTP</span>
                                    <ul class="brand-list">
                                        @foreach($games_data->unique('rtp') as $game)
                                            @if(!empty($game->rtp))

                                                <li>
                                                    <label class="form-check-label rtp-label" id="filter{{ $game->rtp }}" for="{{ $game->rtp }}">
                                                        <input name="rtp" type="radio" class="form-check-input"
                                                            {{ $game->rtp == request()->input("rtp") ? "checked": "" }}
                                                            value="{{ $game->rtp }}" id="{{ $game->rtp }}">
                                                            <span>{{ $game->rtp }}</span>
                                                        <div class="common-radioIndicator"></div>
                                                    </label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="vertical-filters-filters provider-container">
                                    <span class="vertical-filters-header">CATEGORY</span>
                                    <ul class="brand-list checkbox-list">
                                        @foreach($game_category as $game_cat)
                                            <li>
                                                <div class="form-group">
                                                    <input id="{{ Str::slug($game_cat->name) }}" name="game_category[]" type="checkbox" {{ request()->input("game_category") && in_array($game_cat->name, request()->input("game_category")) ? "checked='checked'": "" }} value="{{ $game_cat->name }}">
                                                    <label for="{{ Str::slug($game_cat->name) }}">{{ $game_cat->name }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="vertical-filters-filters provider-container mb-3">
                                    <span class="vertical-filters-header">Volatility</span>
                                    <ul class="brand-list">
                                        @foreach(@$games_data->unique('volatilitet') as $game)
                                            @if(!empty($game->volatilitet))
                                                <li>
                                                    <label class="form-check-label rtp-label" id="filter{{ $game->volatilitet }}">
                                                        <input name="volatilitet" type="radio" class="form-check-input"
                                                            {{ $game->volatilitet == request()->input("volatilitet") ? "checked": ""}}
                                                            value="{{ $game->volatilitet }}"><span>{{ $game->volatilitet }}</span>
                                                        <div class="common-radioIndicator"></div>
                                                    </label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="vertical-filters-filters provider-container mb-3">
                                    <span class="vertical-filters-header">Average Win Per Bet</span>
                                    <ul class="brand-list">
                                        @foreach($games_data->unique('gpi') as $game)
                                            @if(!empty($game->gpi))
                                                <li>
                                                    <label class="form-check-label rtp-label" id="filter{{ $game->gpi }}">
                                                        <input name="gpi" type="radio" class="form-check-input"
                                                            {{ $game->gpi == request()->input("gpi") ? "checked": "" }}
                                                            value="{{ $game->gpi }}"><span>{{ $game->gpi }}</span>
                                                        <div class="common-radioIndicator"></div>
                                                    </label>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                                {{-- <div class="py-3 px-3">
                                    <button type="submit" class="btn btn-block btn-danger">Filter</button>
                                </div> --}}
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 offset-md-1 filter-mobile mb-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" id="filter-model"
                                data-target="#filterModal">
                            Filters
                        </button>
                    </div>
                    <div class="col-md-8">
                        <div class="row" id="game_ajax"></div>
                        <div class="row" id="game_list">
                            @foreach($games as $game)
                                <div class="col-6 col-md-2 mb-4 game-content">
                                    <div class="content">
                                        <a href="{{ $game->route }}">
                                            <div class="content-overlay"></div>
                                            @if($game)
                                            <img class="content-image"
                                                src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $game->logo_alt_text }}">
                                            @endif
                                            <div class="content-details fadeIn-top">
                                                <h5>Play {{ $game->name }} demo</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="col-md-3 game-popular-casino">
                        @include('partials.popular-casino-widget')
                    </div> --}}
                </div>
                <div class="modal" id="filterModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                {{-- <h4 class="modal-title">Filters</h4>--}}
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form method="get" action="{{ route('frontend.all-games') }}" id="games_filter_mobile_form">
                                    <div class="filter">
                                        <div class="vertical-filters">
                                            <span>FILTERS</span>
                                            <a href="{{ route('frontend.all-games') }}" class="float-right reset-filter">Reset
                                            </a>
                                        </div>
                                        <div class="vertical-filters-filters provider-container">
                                            <a data-toggle="collapse" href="#providerCollapse" aria-expanded="false"
                                                aria-controls="myCollapseExample">
                                                <span class="vertical-filters-header">Provider <i
                                                class="fa fa-chevron-down"></i></span>
                                            </a>
                                            <ul class="brand-list collapse checkbox-list" id="providerCollapse">
                                                @foreach($games_data->unique('provider') as $game)
                                                    @if(!empty($game->provider))
                                                        <li>
                                                            <div class="form-group">
                                                                <input id="{{ Str::slug($game->provider) }}" name="provider[]" type="checkbox" {{ request()->input("provider") && in_array($game->provider, request()->input("provider")) ? "checked='checked'": "" }} value="{{ $game->provider }}">
                                                                <label for="{{ Str::slug($game->provider) }}">{{ $game->provider }}</label>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="vertical-filters-filters provider-container">
                                            <span class="vertical-filters-header">RTP</span>
                                            <ul class="brand-list">
                                                @foreach($games_data->unique('rtp') as $game)
                                                    @if(!empty($game->rtp))
                                                        <li>
                                                            <label class="form-check-label rtp-label" id="filter{{ $game->rtp }}">
                                                                <input name="rtp" type="radio" class="form-check-input"
                                                                    {{ $game->rtp == request()->input("rtp") ? "checked": "" }}
                                                                    value="{{ $game->rtp }}" id="{{ $game->rtp }}"><span>{{ $game->rtp }}</span>
                                                                <div class="common-radioIndicator"></div>
                                                            </label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="vertical-filters-filters provider-container">
                                            <span class="vertical-filters-header">CATEGORY</span>
                                            <ul class="brand-list checkbox-list">
                                                @foreach($game_category as $game_cat)
                                                    <li>
                                                        <div class="form-group">
                                                            <input id="{{ Str::slug($game_cat->name) }}" name="game_category[]" type="checkbox" {{ request()->input("game_category") && in_array($game_cat->name, request()->input("game_category")) ? "checked='checked'": "" }} value="{{ $game_cat->name }}">
                                                            <label for="{{ Str::slug($game_cat->name) }}">{{ $game_cat->name }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="vertical-filters-filters provider-container mb-3">
                                            <span class="vertical-filters-header">Volatility</span>
                                            <ul class="brand-list">
                                                @foreach($games_data->unique('volatilitet') as $game)
                                                    @if(!empty($game->volatilitet))
                                                        <li>
                                                            <label class="form-check-label rtp-label" id="filter{{ $game->volatilitet }}">
                                                                <input name="volatilitet" type="radio" class="form-check-input"
                                                                    {{ $game->volatilitet == request()->input("volatilitet") ? "checked": "" }}
                                                                    value="{{ $game->volatilitet }}"><span>{{ $game->volatilitet }}</span>
                                                                <div class="common-radioIndicator"></div>
                                                            </label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="vertical-filters-filters provider-container mb-3">
                                            <span class="vertical-filters-header">GPI</span>
                                            <ul class="brand-list">
                                                @foreach($games_data->unique('gpi') as $game)
                                                    @if(!empty($game->gpi))
                                                        <li>
                                                            <label class="form-check-label rtp-label" id="filter{{ $game->gpi }}">
                                                                <input name="gpi" type="radio" class="form-check-input"
                                                                    {{ $game->gpi == request()->input("gpi") ? "checked": "" }}
                                                                    value="{{ $game->gpi }}"><span>{{ $game->gpi }}</span>
                                                                <div class="common-radioIndicator"></div>
                                                            </label>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row software-content">
                    <div class="col-md-10 offset-md-1 mt-4">
                        <p class="software-description">{!! @$data->content !!}</p>
                    </div>
                </div>
                
            </div>
            <div class="container">                
                <div class="row popular_casino_row">
                    <div class="col-md-12 mb-4">
                        <h2 class="popular-casino-card-heading">{{ @$data->popular_casinos_heading }}</h2>
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
                            <h2 class="section-title">{{ @$data->faq_heading }}</h2>
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
        </div>
    </section>
@endsection

@section('scripts')

<script>
    $("#search").on('keyup',function(){
        var value = $(this).val();
        $.ajax({
            type : 'get',
            url : "{{ route('frontend.all-games.search')}}",
            data:{
                search: value,
            },
            success:function(data){
                $('#game_list').hide();
                $('#game_ajax').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                 console.log("AJAX error: " + textStatus + ' : ' + errorThrown)
            }
        })
    });
 </script>

@endsection
