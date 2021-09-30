@extends('layouts.frontend')

@section('title','Casino Bonus')
@section('meta_tags')
    <title>{{ $game->seo_title }}</title>
    <meta content="{{ $game->seo_keyword }}" name="keywords">
    <meta content="{{ $game->seo_description }}" name="description">
@endsection
@section('content')
    <section id="single-game-section">
        <div class="game-top-banner" style="background: url('{{ $game->bg_image ? $game->bg_image->url : '' }}') no-repeat center center / cover;">
            <div class="game-banner-content position-absolute">
                <img class="game-bg-logo" src="{{ $game->bg_image_logo ? $game->bg_image_logo->url : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $game->bg_image_logo_alt_text }}">
                <h1>{{$game->bg_image_text}}</h1>
            </div>
        </div>

        <div class="single-game-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2 pull-md-2">
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
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-md-2 pull-md-2">
                        <div class="play-game-content">
                            <h2>{{$game->name}}</h2>
                            <table class="table-responsive single-game-table d-none d-lg-block d-xl-block">
                                <tr>
                                    <td>RTP (Return To Player)</td>
                                    <td>{{$game->rtp_game}}</td>
                                </tr>
                                <tr>
                                    <td>Layout</td>
                                    <td>{{$game->layout}}</td>
                                </tr>
                                <tr>
                                    <td>Paylines</td>
                                    <td>{{$game->gevinstlinjer}}</td>
                                </tr>
                                <tr>
                                    <td>Max coin win</td>
                                    <td>{{$game->maks_mynt_gevinst}}</td>
                                </tr>
                                <tr>
                                    <td>Volatility</td>
                                    <td>{{$game->volatilitet_game}}</td>
                                </tr>
                                <tr>
                                    <td>Min. stake</td>
                                    <td>{{$game->min_innsats}}</td>
                                </tr>
                                <tr>
                                    <td>Max Bet</td>
                                    <td>{{$game->maks_innsats}}</td>
                                </tr>
                            </table>
                            <div class="play-game-list mobile-game-table d-lg-none d-xl-none">
                                <p>RTP (Return To Player) <span>{{$game->rtp_game}}</span></p>
                                <p>Layout <span>{{$game->layout}}</span></p>
                                <p>Paylines <span>{{$game->gevinstlinjer}}</span></p>
                                <p>Max coin win <span>{{$game->maks_mynt_gevinst}}</span></p>
                                <p>Volatility <span>{{$game->volatilitet_game}}</span></p>
                                <p>Min. stake <span>{{$game->min_innsats}}</span></p>
                                <p>Max Bet <span>{{$game->maks_innsats}}</span></p>
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

                <div class="row similar-games justify-content-md-center">
                    <div class="col-md-8 offset-md-2 pull-md-2">
                        <h2>Similar Games</h2>
                        <div class="row">
                            @foreach($similar_games ?? [] as $similar_game)
                                <div class="col-6 col-md-2 mb-4 game-content">
                                    <div class="content">
                                        <a href="{{ $similar_game->route }}">
                                            <div class="content-overlay"></div>
                                            <img class="content-image" src="{{ $similar_game->logo ? $similar_game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $similar_game->logo_alt_text }}">
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
                            <h2 class="section-title">{{ @$game->faq_heading }}</h2>
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
