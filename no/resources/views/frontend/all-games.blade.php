
@extends('layouts.frontend')

@section('title','All Games')
@section('meta_tags')
    <title>{{ $data->seo_title }}</title>
    <meta content="{{ $data->seo_keyword }}" name="keywords">
    <meta content="{{ $data->seo_description }}" name="description">
    @section('schemaMarkup')
    <script type="application/ld+json">
    [
        {
            "@context": "https://schema.org",
            "@type": "ItemList",
            "name": "Free Slots",
            "itemListElement":[
                @foreach($games ?? [] as $key => $game)
                    @if($loop->last)
                    {
                        "@type":"ListItem",
                        "position":{{ ++$key }},
                        "image": "{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}",
                        "url":"{{ $game->route }}",
                        "name": "{{ $game->name }}"
                    }
                    @else
                    {
                        "@type":"ListItem",
                        "position":{{ ++$key }},
                        "image": "{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}",
                        "url":"{{ $game->route }}",
                        "name": "{{ $game->name }}"
                    },
                    @endif
                @endforeach
            ]
        },

        {
            "@context":"https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                @foreach($faq_questions ?? [] as $faqs)
                    @if($loop->last)
                        {
                            "@type": "Question",
                            "name": "{{ $faqs->question }}",
                            "acceptedAnswer": {
                                "@type": "Answer",
                                "text": "{{ $faqs->question }}"
                            }
                        }
                    @else
                        {
                            "@type": "Question",
                            "name": "{{ $faqs->question }}",
                            "acceptedAnswer": {
                                "@type": "Answer",
                                "text": "{{ $faqs->answer }}"
                            }
                        },
                    @endif
                @endforeach

            ]
        }
    ]
    </script>
    @endsection

@endsection
@section('content')

    <section id="games-new-section">
        @php($bg_image = \App\StaticPage::getMediaField('all-game', 'bg_image'))
        <div id="newHeader" class="newHeader" style="background: url('{{ $bg_image->url }}') no-repeat center center / cover;" aria-label="{{ @$data->bg_image_alt_text }}">
            <div class="game-banner-content">
               <h1>{{ @$data->bg_image_heading }}</h1><br>
               <div class="cBreadcrumb">
                    <span><a href="/">Home</a></span>
                    <span>Free Slots</span>
               </div>
            </div>
        </div>
        <div class="games-section-content sectionPTPB">
            <div class="container">
            <p>{!!$data->bg_image_text !!} </p>
                <div class="row mt-30 mb-60">
                    <div class="col-md-12 text-center">
                        <div class="top-widget space50 softwaresearch">
                            <form method="post">
                                <div class="search-bar">
                                    <input type="text" placeholder="Search..." id="search">
                                    <div class="search"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="mobileFilterBtn" class="mx-auto filter-mobile mb-4 mt-5">
                        <button type="button" class="btn btn-primary" data-toggle="modal" id="filter-model"
                                data-target="#filterModal">
                            Filters
                        </button>
                    </div>
                </div>

                <div class="row mt-30 justify-content-md-center">
                    <div id="sideFilter" class="col-md-3">
                        <form method="post" action="{{ route('frontend.all-games') }}" id="games_filter_form">
                        @csrf
                            <div class="filter">
                                <div class="vertical-filters">
                                    <span>Filter</span>
                                    <a href="{{ route('frontend.all-games') }}" class="float-right reset-filter">Nullstill
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
                                        <a data-toggle="collapse" href="#CATEGORYCollapse" aria-expanded="false"
                                        aria-controls="myCollapseExample">
                                        <span class="vertical-filters-header">CATEGORY <i
                                                class="fa fa-chevron-down"></i></span>
                                        </a>
                                    {{-- <ul class="brand-list collapse checkbox-list" id="CATEGORYCollapse">
                                        @foreach($game_category as $game_cat)
                                            <li>
                                                <div class="form-group">
                                                    <input id="{{ Str::slug($game_cat->name) }}" name="game_category[]" type="checkbox" {{ request()->input("game_category") && in_array($game_cat->name, request()->input("game_category")) ? "checked='checked'": "" }} value="{{ $game_cat->name }}">
                                                    <label for="{{ Str::slug($game_cat->name) }}">{{ $game_cat->name }}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul> --}}
                                </div>
                                <div class="vertical-filters-filters provider-container">
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

                    <div class="col-md-9">
                        <div class="row" id="game_ajax"></div>
                        <div class="row" id="game_list">
                            @include('partials.game-card', compact('game'))
                        </div>
                    </div>
                </div>

                <div class="row game-detail-content">
                    <div class="col-md-12 mt-4">
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
                @include('partials.staytune', compact('casinos'))

                
            </div>
        </div>
    </section>
@endsection

@section('scripts')

<script>
    $("#search").on('keyup',function(){
      var value = $(this).val();
      $.ajax({
          type : 'POST',
          url : "{{ route('frontend.all-games')}}",
          data:{
            "_token": "{{ csrf_token() }}",
              search: value
          },
          success:function(data){
          //  console.log(data);
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
