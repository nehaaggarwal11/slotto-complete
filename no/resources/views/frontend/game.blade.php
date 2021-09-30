@extends('layouts.frontend')

@section('title','Casino Bonus')
@section('meta_tags')
    <title>{{ $game->seo_title }}</title>
    <meta content="{{ $game->seo_keyword }}" name="keywords">
    <meta content="{{ $game->seo_description }}" name="description">
    <meta property="og:site_name" content="Slottomat" />
    <meta property="og:url" content="{{ $game->route }}" />
    <meta property="og:title" content="{{ $game->name }}" />
    <meta property="og:description" content="{{$game->seo_description}}" />
    <meta property="og:image" content="{{ asset($game->bg_image_logo->url??"") }}" />
    <meta property="bt:type" content="GameReview" />
    <meta name="date" content="{{$game->created_at}}" />
    <meta property="og:article:modified_time" content="{{$game->updated_at}}" />
    @section('schemaMarkup')
    <script type="application/ld+json">
    [

      {
        "@context": "http://schema.org",
        "@type": "VideoGame",
        "name": "{{ $game->name }}",
        "url": "{{ $game->route }}",
        "image": "{{ asset($game->bg_image_logo->url??"") }}",
        "description" : "Read our Ted Megaways slot review and find out how to enjoy Ted’s features and 117,649 megaways. Play for free or real money now.",
        "applicationCategory": [
            "Game"
        ],
        "operatingSystem" : "Multi-platform",
        "aggregateRating" : {
            "@type":"AggregateRating",
            "itemReviewed" : "{{ $game->name }} Review",
            "ratingValue" : "4.3928571428571",
            "ratingCount" : "28"
        },
        "author":{
            "@type" : "Organization",
            "name" : "{{ $game->provider }}",
            "url" : "{{ $game->route }}"
        }
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


    <section id="single-game-section">
    <div id="newHeader"  class="newHeader">
       <img class="software-bg-logo" width="160px" style="background-color: {{ $game->bg_image_color}}" src="{{ $game->bg_image_logo ? $game->bg_image_logo->url : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $game->bg_image_logo_alt_text }}">
       <h1>{{ $game->bg_image_text }}</h1><br>
       <div class="cBreadcrumb">
            <span><a href="/">Hjem</a></span>
            <span><a href="{{ route('frontend.all-games') }}">Gratis Spilleautomater</a></span>
            <span>{{ $game->bg_image_text }}</span>
       </div>
    </div>
        <div class="single-game-content sectionPTPB">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pull-md-2">
                        {{--<div class="play-game-frame">
                           <h4>Game Frame Section</h4>
                        </div>--}}
                        @if($game->game_link)
                        <iframe
                            src="{{$game->game_link}}"
                            class="game-frame"></iframe>
                        @endif
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row popular_casino_row">
                    <div class="col-md-12 mb-4">
                        <h2 class="popular-casino-card-heading">{{ @$game->popular_casino_heading }}</h2>
                    </div>
                </div>
                    @include('partials.staytune', compact('casinos'))
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pull-md-1">
                        <div class="play-game-content mt-4">
                            <h2>{{$game->name}}</h2>
                            <figure class="table text-center" style="display: none;">
                            <table>
                                  <tr>
                                  	<th>RTP <sup>(Tilbakebetalingsprosent)</sup></th>
                                  	<th>Layout</th>
                                  	<th>Gevinstlinjer</th>
                                  	<th>Maks mynt gevinst</th>
                                  	<th>Volatilitet</th>
                                  	<th>Min. innsats</th>
                                  	<th>Maks innsats</th>
                                  </tr>
                                  <tr>
                                  	<td>{{$game->rtp_game}}</td>
                                  	<td>{{$game->layout}}</td>
                                  	<td>{{$game->gevinstlinjer}}</td>
                                  	<td>{{$game->maks_mynt_gevinst}}</td>
                                  	<td>{{$game->volatilitet_game}}</td>
                                  	<td>{{$game->min_innsats}}</td>
                                  	<td>{{$game->maks_innsats}}</td>
                                  </tr>
							</table>
                            </figure>

                            <div id="newTable" class="text-center mb-4">
                                  <ul id="single-game-table">
                                      <li class="tablehead">
                                              <div class="tLi">RTP <sub>(Tilbakebetalingsprosent)</sub></div>
                                              <div class="tLi">Layout</div>
                                              <div class="tLi">Gevinstlinjer</div>
                                              <div class="tLi">Maks mynt gevinst</div>
                                              <div class="tLi">Volatilitet</div>
                                              <div class="tLi">Min. innsats</div>
                                              <div class="tLi">Maks innsats</div>
                                          </li>
                                          <li class="tablebody">
                                              <div class="tLi" data-id="RTP: ">{{$game->rtp_game}}</div>
                                              <div class="tLi"  data-id="Layout: ">{{$game->layout}}</div>
                                              <div class="tLi" data-id="Paylines: ">{{$game->gevinstlinjer}}</div>
                                              <div class="tLi" data-id="Max win: ">{{$game->maks_mynt_gevinst}}</div>
                                              <div class="tLi" data-id="Volatility: ">{{$game->volatilitet_game}}</div>
                                              <div class="tLi" data-id="Min stake: " >{{$game->min_innsats}}</div>
                                          	  <div class="tLi" data-id="Max Bet: ">{{$game->maks_innsats}}</div>

                                      </li>
                                  </ul>
                              </div>
                            {!! $game->description !!}
                            {{-- <p>Gonzo's Quest har et Sør- Amerikansk azteker tema der vi blir med eventyreren Gonzo på
                                jakt etter Eldorado, en by som er fullstendig dekket av gull!. Spillet var det første av
                                sitt slag som var basert på en "skred" funksjon ( avalanche), og ble lansert i 2013 av
                                den svenske spillprodusenten NetEnt. Med sitt innovative spilleoppsett, lekker grafikk
                                og store gevinster, ble denne spilleautomaten raskt en stor hit blant gamblere på nett,
                                og er fortsatt den dag i dag en av de mest populære spilleautomatene for nordmenn. </p>
                            <h4>Spilleoppsett</h4>
                            <p>Gonzo's Quest har fem rekker vannrett og 3 rader ned. På denne spilleautomaten er det
                                altså ingen hjul. Her ramler det ned store steinblokker inn på spillbrettet hver gang du
                                trykker på spinn knappen, og nye faller på plass for hvert spinn. Dette kalles en skred
                                funksjon istedenfor hjul som spinner og stopper opp på visse symboler.

                                Spillet har totalt 20 gevinstlinjer som betales fra venstre til høyre og byr på rikelig
                                med muligheter for å justere innsats mellom 2- 500 kroner per spinn. For å justere
                                myntverdiene bruker du "Level" og "Coin value" tastene som du finner på hver sin side av
                                spinn knappen i midten.
                                Spillet har også en autospinn funksjon hvor du kan velge at spilleautomaten kjører 10-
                                1000 spinn uten at du trenger å trykke på spinn knappen. Du har også en egen knapp for
                                Max Bet som velger automatisk høyeste innsats i spillet når du spinner.
                            </p>
                            <h4>Bonusfunksjoner på Gonzo's Quest</h4>
                            <p>Avalanche- For hver gang du spinner og får en gevinst, får du ytterligere en sjanse i
                                spillet uten at dette koster deg noe. Denne funksjonen kalles da "Avalanche Freefall".
                                Øverst til høyre har du i tillegg en multiplikator stige som øker for hver eneste gang
                                du lander gevinst, uten at du behøver å spinne på nytt. </p>
                            <p>
                                Free Fall Symbolet - Dette symbolet fungerer som en scatter, hvor du får 10 free falls
                                om du lander minst 3 av disse i radene. Disse symbolene må da lande i en av
                                gevinstlinjene, og trigges ikke om de kommer vilkårlig plassert i spillet slik som en
                                vanlig scatter på spilleautomater.
                            </p>
                            <p>Wild Symbol- Denne erstatter alle andre symboler i spillet som kan utbetale gevinst. Den
                                erstatter ikke Free Fall symbolet.</p>
                            <h4>Gevinstmuligheter</h4>
                            <p>Gonso'z Quest byr på 187 500 mynter i toppgevinst. selv om RTP er noe lav og få
                                gevinstlinjer, har du bonusfunksjoner i spillet som hjelper deg ofte for å holde ut
                                lengre i spillet.
                                Hoved Symbolene i spillet er gudebilder innrisset i steinblokkene som ramler ned på
                                hjulene.
                            </p>
                            <p>Utbetalingene er fra:
                            <ul>
                                <li>3- 50 x linje innsats med tre like</li>
                                <li>10- 250 x linje innsats med 4 like</li>
                                <li>50- 2500 x innsats per linje om du får 5 like symboler</li>
                            </ul>
                            </p>
                            <p>Spiller du med 2 kroner per spinn, blir dette fordelt på 20 gevinstlinjer, altså 0,2
                                kroner per linje. Slik kan du beregne hvor stor utbetalingene blir på de forskjellige
                                symbolene i spillet. I tillegg kan du få multiplikatorer opptil 15 ganger innsats om du
                                lander gevinster under Free Falls, noe som virkelig setter fart på spillkontoen.</p> --}}
                        </div>
                    </div>

                </div>
                @if(!empty($similar_games))
                <div class="row similar-games justify-content-center">
                    <div class="col-md-12 pull-md-2">
                        <h2 class="text-center">Similar Games</h2>
                        <div class="row justify-content-center">
                            @foreach($similar_games ?? [] as $similar_game)
                                <div class="col-6 col-md-2 mb-4 game-content">
                                    <div class="content">
                                        <a href="{{ $similar_game->route }}">
                                            <div class="content-overlay"></div>
                                            <img class="content-image" src="{{ $similar_game->logo ? $similar_game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $similar_game->logo_alt_text }}">
                                            <div class="content-details fadeIn-top">
                                            <span class="gameh5Span">Play {{ $similar_game->name }} demo</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
                @if(!empty($slots) && count($slots)!=0)
                <div class="row similar-games justify-content-center">
                    <div class="col-md-12 pull-md-2 mb-4">
                    @if(!empty($game->slots_heading))
                        <h2 class="text-center">{{ $game->slots_heading }}</h2>
                    @endif
                        <div class="row justify-content-center">
                            @foreach($slots ?? [] as $slot)
                             {{-- @if($slot->name != $game->name) --}}
                                <div class="col-6 col-md-2 mb-4 game-content">
                                    <div class="content">
                                        <a href="{{ $slot->route }}">
                                            <div class="content-overlay"></div>
                                            <img class="content-image" src="{{ $slot->logo ? $slot->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $slot->logo_alt_text }}">
                                            <div class="content-details fadeIn-top">
                                                <span class="gameh5Span">Play {{ $slot->name }} demo</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                               {{-- @endif --}}
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @php
                  $faq_head = $game->faq_heading;
                @endphp
            @include('partials.faq',compact('faq_head','faq_questions'))
            </div>
        </div>
    </section>
    <script>
      $(document).ready(function(){
        var jImgCasinoUrl = "{{ $game->bg_image_logo ? $game->bg_image_logo->url : asset('asset/frontend/img/logo/game.png') }}",
         jImgCasinoAlt = "{{ $game->bg_image_logo_alt_text }}",
         jCasinoName = "{{$game->name}}",
         jCasinoLink = "no";
        singlePop(jImgCasinoUrl,jImgCasinoAlt,jCasinoName,jCasinoLink);
      });
    </script>
@endsection
