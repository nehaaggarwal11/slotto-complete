@extends('layouts.frontend')

@section('title','Sample Page')
@section('content')

<section class="static-page">
    <div class="background-wrap">
        <div class="x1">
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
                <h1>{{ $dynamic_page->bg_heading }}</h1>
                <p>{{ $dynamic_page->bg_text }}</p>
            </div>
        </div>
    </div>
    
</section>

<div class="boat-animation">
    <img src="{{ asset('asset/frontend/img/static/boat.png')}}" alt="boat">
</div>
<div class="sud" style="background:#42bdf4;">
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
            style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
            viewBox="0 0 17707.28 1306.81"
    >

    <style type="text/css">
        .fil0 {fill: #2aa5d2}
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
<section id="casino-bonus-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-left">{{ $dynamic_page->heading }}</h2>
                <p>{!! $dynamic_page->description !!}</p>
            </div>
        </div>

        @if($dynamic_page->content && is_object($content = json_decode($dynamic_page->content)))
            <?php $count = 0; ?>
            @foreach($content as $ckey => $row)
            @if($count % 2 == 0)

        <div class="row static-reverse-section">
            <div class="col-md-6">
                <img src="{{ asset('asset/frontend/img/gif/submarine.gif')}}" class="diving" alt="a big pink moving jellyfish">
            </div>
            <div class="col-md-6">
                <h2>The Truth Behind No Deposit Bonuses</h2>
                <p>Many casinos offer free bonuses with no wagering requirements at all. But as a rule, they have to put some limit on how much you are allowed to withdraw before you deposit money at the casino.
                    Let's take an example where you get 10 free spins just by signing up. Then there is usually a limit on winnings of 150€ and up to 200€, perhaps in some cases lower limits as well. But this 
                    restriction applies only if you have never made a deposit to this casino before. The minimum deposit at the casino today is around 10€, so wouldn't it be worth making a small deposit in case
                    you land big winnings on the reels? In some cases, you may also have a cap on how much you can be allowed to withdraw on free spins, even if you make a deposit. So it is wise to look at such 
                    terms before you start, but still, you should rather see this as an opportunity to get away with some winnings with no obligation to continue to make a deposit, rather than hunt for the big 
                    jackpots with free bonuses. Wagering requirements On a no deposit bonus with wagering requirements, conditions can be different. There does not necessarily have to be any profit restriction 
                    if you meet all the wagering requirements. How the wagering requirements are calculated depends on whether you have received free money or free spins. Cash Bonuses: Here the wagering requirement 
                    is set based on the amount you have received. For example, if you receive 10€ in bonus without deposit, and have to turn over the amount 30 times, then you must play for 300€ before bonus money 
                    and any winnings can be paid out. The advantage of bonus money is that you can use them on virtually every game in the casino, and have the opportunity to vary the game. This gives you the opportunity 
                    to test out the game selection as well as find the perfect games for you. Free Spins: Unlike bonus money, you get free spins awarded on one particular slot machine, NOT at the roulette table as many beginners think. 
                    The spins are usually at the most popular slot machines at the casino, and are based on what they think you will enjoy playing. The Free Spins wagering requirement is calculated based on how much you win on your free spins. 
                    For example, if you win 50€ and the wagering requirement is 10 times the winnings, you have to bet 500€ to cash out. In such cases, you should initially be happy that there is a maximum limit on winnings instead. Imagine hitting 
                    a multi-million jackpot and having to play 5 times more than the winnings? Then you probably need to get rid of both work and family life for a few months...</p>
            </div>
        </div>
        @else

        <div class="row">            
            <div class="col-md-6">
                <h2>The Truth Behind No Deposit Bonuses</h2>
                <p>Many casinos offer free bonuses with no wagering requirements at all. But as a rule, they have to put some limit on how much you are allowed to withdraw before you deposit money at the casino.
                    Let's take an example where you get 10 free spins just by signing up. Then there is usually a limit on winnings of 150€ and up to 200€, perhaps in some cases lower limits as well. But this 
                    restriction applies only if you have never made a deposit to this casino before. The minimum deposit at the casino today is around 10€, so wouldn't it be worth making a small deposit in case
                    you land big winnings on the reels? In some cases, you may also have a cap on how much you can be allowed to withdraw on free spins, even if you make a deposit. So it is wise to look at such 
                    terms before you start, but still, you should rather see this as an opportunity to get away with some winnings with no obligation to continue to make a deposit, rather than hunt for the big 
                    jackpots with free bonuses. Wagering requirements On a no deposit bonus with wagering requirements, conditions can be different. There does not necessarily have to be any profit restriction 
                    if you meet all the wagering requirements. How the wagering requirements are calculated depends on whether you have received free money or free spins. Cash Bonuses: Here the wagering requirement 
                    is set based on the amount you have received. For example, if you receive 10€ in bonus without deposit, and have to turn over the amount 30 times, then you must play for 300€ before bonus money 
                    and any winnings can be paid out. The advantage of bonus money is that you can use them on virtually every game in the casino, and have the opportunity to vary the game. This gives you the opportunity 
                    to test out the game selection as well as find the perfect games for you. Free Spins: Unlike bonus money, you get free spins awarded on one particular slot machine, NOT at the roulette table as many beginners think. 
                    The spins are usually at the most popular slot machines at the casino, and are based on what they think you will enjoy playing. The Free Spins wagering requirement is calculated based on how much you win on your free spins. 
                    For example, if you win 50€ and the wagering requirement is 10 times the winnings, you have to bet 500€ to cash out. In such cases, you should initially be happy that there is a maximum limit on winnings instead. Imagine hitting 
                    a multi-million jackpot and having to play 5 times more than the winnings? Then you probably need to get rid of both work and family life for a few months...</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('asset/frontend/img/gif/submarine.gif')}}" class="diving" alt="a big pink moving jellyfish">
            </div>
        </div>
        @endif  
                <?php $count++; ?>          
            @endforeach
        @endif
    </div>

    <div class="container">
        <div class="row mt-4">
                <div class="col-md-12 mb-4">
                    <h2 class="popular-casino-card-heading">{{ @$dynamic_page->popular_casino_heading }}</h2>
                </div>
                @include('partials.casino-card', compact('casinos'))
        </div>  
    </div>
</section>
@endsection    
