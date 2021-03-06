@extends('layouts.frontend')

@section('title','Casino Bonus')
@section('content')
    <section id="new-casino">
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
                    <h2 class="new-casino-mainheading">Nye casino for Norge</h2>
                    <p class="new-casino-subheading">de beste og mest palitlige
                        casinoene 2020</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="casino-rating-headings">
                        <h1 class="new-top-casino-heading"><img
                                src="{{asset('asset/frontend/img/rating/star.png')}}"
                                alt=""><span>Top 3 Casinos</span><img
                                src="{{asset('asset/frontend/img/rating/star2.png')}}"
                                alt=""></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 mb-2">
                    <div class="game_table wow fadeInUp" data-wow-duration="1s"
                         data-wow-delay="0s"
                         style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
                        <div class="pricing_head text-white bg_light_blue">
                            <img src="{{ asset('asset/frontend/img/table/playojo.jpg')}}"
                                 alt="" class="play-img">
                        </div>
                        <ul class="game_features">
                            <li>Overall 50 spins without wagering</li>
                            <li>Get 50+30 bonus spins from Kicker section
                            </li>
                            <li>No wagering requirements ever!</li>
                        </ul>

                        <a class="game_btn btn_lightblue" href="#">Visit
                            Casino</a>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 mb-2">
                    <div class="game_table wow fadeInUp" data-wow-duration="1s"
                         data-wow-delay="0s"
                         style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
                        <div class="pricing_head text-white bg_light_blue">
                            <img src="{{ asset('asset/frontend/img/table/dunder.jpg')}}"
                                 alt="" class="play-img">
                        </div>
                        <ul class="game_features">
                            <li>20 no deposit spins on Book of Dead</li>
                            <li>Up to ??100 bonus + 100 spins on first
                                deposit
                            </li>
                        </ul>

                        <a class="game_btn btn_lightblue" href="#">Visit
                            Casino</a>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 mb-2">
                    <div class="game_table wow fadeInUp" data-wow-duration="1s"
                         data-wow-delay="0s"
                         style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: fadeInUp;">
                        <div class="pricing_head text-white bg_light_blue">
                            <img src="{{ asset('asset/frontend/img/table/playkasino.jpg')}}"
                                 alt="" class="play-img">
                        </div>
                        <ul class="game_features">
                            <li>Easy navigation</li>
                            <li>Over 1000 games</li>
                            <li>Generous welcome package</li>
                        </ul>

                        <a class="game_btn btn_lightblue" href="#">Visit
                            Casino</a>
                    </div>
                </div>
            </div>

            <div class="row mt-30">
                <div class="col-md-12">
                    <div class="new-casino-detail">
                        <p>Hei! Hyggelig at du stikker innom v??re nyeste tilskudd av
                            nettcasino klar for erobring p?? nett. Her vil du
                            bestandig
                            v??re oppdatert p?? v??re nyeste og spennende casino som
                            dukker
                            opp. De er testet og verifisert av oss, og skal v??re
                            trygge
                            ?? bruke for alle og enhver.

                            For det er absolutt ikke slik at alle nettcasino der ute
                            passer godt for norske spillere med tanke p??
                            kundeservice,
                            valuta for spill, og ikke minst om de har gode vilk??r
                            sider
                            p?? norsk.

                            Men selv om de ikke har alt dette p?? plass, betyr ikke
                            at vi
                            avfeier de helt om spillutvalg og vilk??r er gode. Derfor
                            velger vi b??de casino med norske sider, og i tillegg
                            casino
                            som ikke er like godt tilrettelagt, men likevel byr p??
                            masse
                            moro og underholdning for penga!
                        </p>
                        <div id="new-casino-more-section">
                            <p>V??r ranking lise er basert p?? mange faktorer som vi
                                unders??ker grundig hos alle akt??rer:
                            </p>
                            <ul>
                                <li>Hvor godt er det tilrettelagt for nordmenn
                                    (betaling, oversatte nettsider etc)?
                                </li>
                                <li> Hvem eier kasinoet, og har de et godt rykte?
                                </li>
                                <li> Hva er kriterier for velkomstbonuser, og er de
                                    konkurransedyktige?
                                </li>
                                <li> Hvilke spillprodusenter tilbyr de, og er de
                                    trygge?
                                </li>
                                <li> Hvor har de lisens, og er den i god stand?
                                </li>
                            </ul>
                            <p>Dette og mange flere punkter er viktige for ?? velge
                                ut nettcasino. Men for ?? spare deg tid, har vi gjort
                                hele jobben for deg, slik at det eneste du trenger ??
                                gj??re er ?? velge casinoet og velkomsttilbud som
                                passer best for deg!</p>


                        </div>
                        <a id="new-casino-read-more" href="javascript:void(0);">Les
                            Mer</a>
                    </div>
                </div>
            </div>

            <div class="row mt-30 d-none d-lg-block">
                <div class="col-md-12">
                    <div class="table-body">
                        <table class="table table-responsive" id="mytable">
                            <thead>
                            <tr>
                                <th></th>
                                <th colspan="3">Casino
                                    <i class="fa fa-sort"
                                       aria-hidden="true"></i></th>
                                <th width="20%" onclick="sort_rating();">
                                    Rating
                                    <i class="fa fa-sort"
                                       aria-hidden="true"></i></th>
                                <th colspan="1">Free Spins <i class="fa fa-sort"
                                                              aria-hidden="true"></i></th>
                                <th colspan="">Bonus <i class="fa fa-sort"
                                                        aria-hidden="true"></i></th>
                                <th colspan="2">Info</th>
                            </tr>
                            </thead>
                            <tbody id="table1">
                            <tr>
                                <td><span class="serial_no">01</span>
                                </td>
                                <td colspan="3" class="note">
                                    <img src="{{ asset('asset/frontend/img/rating/playojo-list.png')}}"
                                         alt="">
                                </td>
                                <td align="center" width="20%">
                                    <h6>Go To Casino</h6>
                                    <p>50 Extra Spins</p>
                                    <span class="bonus-span">
                                        <i class="fa fa-eur currecy-column"
                                           aria-hidden="true"></i>0
                                        Bonus</span>
                                    <p><span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </p>
                                    <a href="{{url('review')}}">
                                        <p class="add-review-btn">Add Review
                                        </p>
                                    </a>
                                </td>
                                <td colspan="2" width="40%">
                                    <p>Overall 50 spins without wagering Get
                                        50+30
                                        bonus spins from Kicker section No
                                        wagering
                                        requirements ever !
                                    </p>
                                </td>
                                <td></td>
                                <td>
                                    <a href="" class="btn blue">
                                        Play Here</a><br><br>
                                    <p><a href="">18+ |
                                            T&C's Apply | Be Gamble
                                            Aware</a></p>
                                </td>
                            </tr>

                            <tr>
                                <td><span class="serial_no">02</span>
                                </td>
                                <td colspan="3" class="note">
                                    <img src="{{ asset('asset/frontend/img/rating/playojo-list.png')}}"
                                         alt="">
                                </td>
                                <td align="center" width="20%">
                                    <h6>Go To Casino</h6>
                                    <p>40 Extra Spins</p>
                                    <span class="bonus-span">
                                        <i class="fa fa-eur currecy-column"
                                           aria-hidden="true"></i>0
                                        Bonus</span>
                                    <p><span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </p>
                                    <a href="{{url('review')}}">
                                        <p class="add-review-btn">Add Review
                                        </p>
                                    </a>
                                </td>
                                <td colspan="2" width="40%">
                                    <p>Overall 50 spins without wagering Get
                                        50+30
                                        bonus spins from Kicker section No
                                        wagering
                                        requirements ever !
                                    </p>
                                </td>
                                <td></td>
                                <td>
                                    <a href="" class="btn blue">
                                        Play Here</a><br><br>
                                    <p><a href="">18+ |
                                            T&C's Apply | Be Gamble
                                            Aware</a></p>
                                </td>
                            </tr>

                            <tr>
                                <td><span class="serial_no">03</span>
                                </td>
                                <td colspan="3" class="note">
                                    <img src="{{ asset('asset/frontend/img/rating/playojo-list.png')}}"
                                         alt="">
                                </td>
                                <td align="center" width="20%">
                                    <h6>Go To Casino</h6>
                                    <p>50 Extra Spins</p>
                                    <span class="bonus-span">
                                        <i class="fa fa-eur currecy-column"
                                           aria-hidden="true"></i>0
                                        Bonus</span>
                                    <p><span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </p>
                                    <a href="{{url('review')}}">
                                        <p class="add-review-btn">Add Review
                                        </p>
                                    </a>
                                </td>
                                <td colspan="2" width="40%">
                                    <p>Overall 50 spins without wagering Get
                                        50+30
                                        bonus spins from Kicker section No
                                        wagering
                                        requirements ever !
                                    </p>
                                </td>
                                <td></td>
                                <td>
                                    <a href="" class="btn blue">
                                        Play Here</a><br><br>
                                    <p><a href="">18+ |
                                            T&C's Apply | Be Gamble
                                            Aware</a></p>
                                </td>
                            </tr>

                            <tr>
                                <td><span class="serial_no">04</span>
                                </td>
                                <td colspan="3" class="note">
                                    <img src="{{ asset('asset/frontend/img/rating/playojo-list.png')}}"
                                         alt="">
                                </td>
                                <td align="center" width="20%">
                                    <h6>Go To Casino</h6>
                                    <p>50 Extra Spins</p>
                                    <span class="bonus-span">
                                        <i class="fa fa-eur currecy-column"
                                           aria-hidden="true"></i>0
                                        Bonus</span>
                                    <p><span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </p>
                                    <a href="{{url('review')}}">
                                        <p class="add-review-btn">Add Review
                                        </p>
                                    </a>
                                </td>
                                <td colspan="2" width="40%">
                                    <p>Overall 50 spins without wagering Get
                                        50+30
                                        bonus spins from Kicker section No
                                        wagering
                                        requirements ever !
                                    </p>
                                </td>
                                <td></td>
                                <td>
                                    <a href="" class="btn blue">
                                        Play Here</a><br><br>
                                    <p><a href="">18+ |
                                            T&C's Apply | Be Gamble
                                            Aware</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="serial_no">05</span>
                                </td>
                                <td colspan="3" class="note">
                                    <img src="{{ asset('asset/frontend/img/rating/playojo-list.png')}}"
                                         alt="">
                                </td>
                                <td align="center" width="20%">
                                    <h6>Go To Casino</h6>
                                    <p>50 Extra Spins</p>
                                    <span class="bonus-span">
                                        <i class="fa fa-eur currecy-column"
                                           aria-hidden="true"></i>0
                                        Bonus</span>
                                    <p><span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </p>
                                    <a href="{{url('review')}}">
                                        <p class="add-review-btn">Add Review
                                        </p>
                                    </a>
                                </td>
                                <td colspan="2" width="40%">
                                    <p>Overall 50 spins without wagering Get
                                        50+30
                                        bonus spins from Kicker section No
                                        wagering
                                        requirements ever !
                                    </p>
                                </td>
                                <td></td>
                                <td>
                                    <a href="" class="btn blue">
                                        Play Here</a><br><br>
                                    <p><a href="">18+ |
                                            T&C's Apply | Be Gamble
                                            Aware</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="serial_no">06</span>
                                </td>
                                <td colspan="3" class="note">
                                    <img src="{{ asset('asset/frontend/img/rating/playojo-list.png')}}"
                                         alt="">
                                </td>
                                <td align="center" width="20%">
                                    <h6>Go To Casino</h6>
                                    <p>50 Extra Spins</p>
                                    <span class="bonus-span">
                                        <i class="fa fa-eur currecy-column"
                                           aria-hidden="true"></i>0
                                        Bonus</span>
                                    <p><span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </p>
                                    <a href="{{url('review')}}">
                                        <p class="add-review-btn">Add Review
                                        </p>
                                    </a>
                                </td>
                                <td colspan="2" width="40%">
                                    <p>Overall 50 spins without wagering Get
                                        50+30
                                        bonus spins from Kicker section No
                                        wagering
                                        requirements ever !
                                    </p>
                                </td>
                                <td></td>
                                <td>
                                    <a href="" class="btn blue">
                                        Play Here</a><br><br>
                                    <p><a href="">18+ |
                                            T&C's Apply | Be Gamble
                                            Aware</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="serial_no">07</span>
                                </td>
                                <td colspan="3" class="note">
                                    <img src="{{ asset('asset/frontend/img/rating/playojo-list.png')}}"
                                         alt="">
                                </td>
                                <td align="center" width="20%">
                                    <h6>Go To Casino</h6>
                                    <p>50 Extra Spins</p>
                                    <span class="bonus-span">
                                        <i class="fa fa-eur currecy-column"
                                           aria-hidden="true"></i>0
                                        Bonus</span>
                                    <p><span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </p>
                                    <a href="{{url('review')}}">
                                        <p class="add-review-btn">Add Review
                                        </p>
                                    </a>
                                </td>
                                <td colspan="2" width="40%">
                                    <p>Overall 50 spins without wagering Get
                                        50+30
                                        bonus spins from Kicker section No
                                        wagering
                                        requirements ever !
                                    </p>
                                </td>
                                <td></td>
                                <td>
                                    <a href="" class="btn blue">
                                        Play Here</a><br><br>
                                    <p><a href="">18+ |
                                            T&C's Apply | Be Gamble
                                            Aware</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="serial_no">08</span>
                                </td>
                                <td colspan="3" class="note">
                                    <img src="{{ asset('asset/frontend/img/rating/playojo-list.png')}}"
                                         alt="">
                                </td>
                                <td align="center" width="20%">
                                    <h6>Go To Casino</h6>
                                    <p>50 Extra Spins</p>
                                    <span class="bonus-span">
                                        <i class="fa fa-eur currecy-column"
                                           aria-hidden="true"></i>0
                                        Bonus</span>
                                    <p><span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </p>
                                    <a href="{{url('review')}}">
                                        <p class="add-review-btn">Add Review
                                        </p>
                                    </a>
                                </td>
                                <td colspan="2" width="40%">
                                    <p>Overall 50 spins without wagering Get
                                        50+30
                                        bonus spins from Kicker section No
                                        wagering
                                        requirements ever !
                                    </p>
                                </td>
                                <td></td>
                                <td>
                                    <a href="" class="btn blue">
                                        Play Here</a><br><br>
                                    <p><a href="">18+ |
                                            T&C's Apply | Be Gamble
                                            Aware</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="serial_no">09</span>
                                </td>
                                <td colspan="3" class="note">
                                    <img src="{{ asset('asset/frontend/img/rating/playojo-list.png')}}"
                                         alt="">
                                </td>
                                <td align="center" width="20%">
                                    <h6>Go To Casino</h6>
                                    <p>50 Extra Spins</p>
                                    <span class="bonus-span">
                                        <i class="fa fa-eur currecy-column"
                                           aria-hidden="true"></i>0
                                        Bonus</span>
                                    <p><span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </p>
                                    <a href="{{url('review')}}">
                                        <p class="add-review-btn">Add Review
                                        </p>
                                    </a>
                                </td>
                                <td colspan="2" width="40%">
                                    <p>Overall 50 spins without wagering Get
                                        50+30
                                        bonus spins from Kicker section No
                                        wagering
                                        requirements ever !
                                    </p>
                                </td>
                                <td></td>
                                <td>
                                    <a href="" class="btn blue">
                                        Play Here</a><br><br>
                                    <p><a href="">18+ |
                                            T&C's Apply | Be Gamble
                                            Aware</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="serial_no">10</span>
                                </td>
                                <td colspan="3" class="note">
                                    <img src="{{ asset('asset/frontend/img/rating/playojo-list.png')}}"
                                         alt="">
                                </td>
                                <td align="center" width="20%">
                                    <h6>Go To Casino</h6>
                                    <p>50 Extra Spins</p>
                                    <span class="bonus-span">
                                        <i class="fa fa-eur currecy-column"
                                           aria-hidden="true"></i>0
                                        Bonus</span>
                                    <p><span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                    </p>
                                    <a href="{{url('review')}}">
                                        <p class="add-review-btn">Add Review
                                        </p>
                                    </a>
                                </td>
                                <td colspan="2" width="40%">
                                    <p>Overall 50 spins without wagering Get
                                        50+30
                                        bonus spins from Kicker section No
                                        wagering
                                        requirements ever !
                                    </p>
                                </td>
                                <td></td>
                                <td>
                                    <a href="" class="btn blue">
                                        Play Here</a><br><br>
                                    <p><a href="">18+ |
                                            T&C's Apply | Be Gamble
                                            Aware</a></p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <input type="hidden" id="rating_order" value="asc">
                    </div>
                </div>
            </div>
            <div class="row rating-mobile d-block d-lg-none d-xl-none">
                <div class="col-md-12">
                    <div class="rating-headings">
                        <h1 class="top-casino-heading"><img
                                src="{{asset('asset/frontend/img/rating/star.png')}}"
                                alt=""><span>Top 10 Casinos</span><img
                                src="{{asset('asset/frontend/img/rating/star2.png')}}"
                                alt=""></h1>
                    </div>
                    <div class="rating-mobile-collapsed">
                        <div class="rating-mobile-area collapsed" data-toggle="collapse" href="#otherDescription">
                            <div class="rating-img">
                                <span>1</span>
                                <img src="{{ asset('asset/frontend/img/rating/play.jpg')}}" align="center">
                            </div>
                            <div class="rating-mobile-content">
                                <h6>Go To Casino</h6>
                                <p>Extra Spins</p>
                                <span class="bonus-span">
                            100% Bonus</span>
                                <p>* 35</p>
                                <p><span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </p>
                                <a class="add-review-btn" href="http://projects.njgraphica.com/slottomat/review">
                                    Add Review
                                </a>
                            </div>
                            <div class="rating-mobile-btn">
                                <a href="" class="btn-play">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    <p>Play Here</p>
                                </a>
                            </div>
                        </div>
                        <div id="otherDescription" class="card-body collapse other-description"
                             data-parent="#accordion">
                            <p>Overall 50 spins without wagering Get
                                50+30
                                bonus spins from Kicker section No
                                wagering
                                requirements ever !
                            </p>
                            <hr>
                            <p><a href="">18+ |
                                    T&amp;C's Apply | Be Gamble
                                    Aware</a></p>
                        </div>
                    </div>
                    <div class="rating-mobile-collapsed">
                        <div class="rating-mobile-area collapsed" data-toggle="collapse" href="#otherDescription2">
                            <div class="rating-img">
                                <span>2</span>
                                <img src="{{ asset('asset/frontend/img/rating/play.jpg')}}" align="center">
                            </div>
                            <div class="rating-mobile-content">
                                <h6>Go To Casino</h6>
                                <p>Extra Spins</p>
                                <span class="bonus-span">
                            100% Bonus</span>
                                <p>* 35</p>
                                <p><span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </p>
                                <a class="add-review-btn" href="http://projects.njgraphica.com/slottomat/review">
                                    Add Review
                                </a>
                            </div>
                            <div class="rating-mobile-btn">
                                <a href="" class="btn-play">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    <p>Play Here</p>
                                </a>
                            </div>
                        </div>
                        <div id="otherDescription2" class="card-body collapse other-description"
                             data-parent="#accordion">
                            <p>Overall 50 spins without wagering Get
                                50+30
                                bonus spins from Kicker section No
                                wagering
                                requirements ever !
                            </p>
                            <hr>
                            <p><a href="">18+ |
                                    T&amp;C's Apply | Be Gamble
                                    Aware</a></p>
                        </div>
                    </div>
                    <div class="rating-mobile-collapsed">
                        <div class="rating-mobile-area collapsed" data-toggle="collapse" href="#otherDescription3">
                            <div class="rating-img">
                                <span>3</span>
                                <img src="{{ asset('asset/frontend/img/rating/play.jpg')}}" align="center">
                            </div>
                            <div class="rating-mobile-content">
                                <h6>Go To Casino</h6>
                                <p>Extra Spins</p>
                                <span class="bonus-span">
                            100% Bonus</span>
                                <p>* 35</p>
                                <p><span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </p>
                                <a class="add-review-btn" href="http://projects.njgraphica.com/slottomat/review">
                                    Add Review
                                </a>
                            </div>
                            <div class="rating-mobile-btn">
                                <a href="" class="btn-play">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    <p>Play Here</p>
                                </a>
                            </div>
                        </div>
                        <div id="otherDescription3" class="card-body collapse other-description"
                             data-parent="#accordion">
                            <p>Overall 50 spins without wagering Get
                                50+30
                                bonus spins from Kicker section No
                                wagering
                                requirements ever !
                            </p>
                            <hr>
                            <p><a href="">18+ |
                                    T&amp;C's Apply | Be Gamble
                                    Aware</a></p>
                        </div>
                    </div>
                    <div class="rating-mobile-collapsed">
                        <div class="rating-mobile-area collapsed" data-toggle="collapse" href="#otherDescription4">
                            <div class="rating-img">
                                <span>4</span>
                                <img src="{{ asset('asset/frontend/img/rating/play.jpg')}}" align="center">
                            </div>
                            <div class="rating-mobile-content">
                                <h6>Go To Casino</h6>
                                <p>Extra Spins</p>
                                <span class="bonus-span">
                            100% Bonus</span>
                                <p>* 35</p>
                                <p><span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </p>
                                <a class="add-review-btn" href="http://projects.njgraphica.com/slottomat/review">
                                    Add Review
                                </a>
                            </div>
                            <div class="rating-mobile-btn">
                                <a href="" class="btn-play">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    <p>Play Here</p>
                                </a>
                            </div>
                        </div>
                        <div id="otherDescription4" class="card-body collapse other-description"
                             data-parent="#accordion">
                            <p>Overall 50 spins without wagering Get
                                50+30
                                bonus spins from Kicker section No
                                wagering
                                requirements ever !
                            </p>
                            <hr>
                            <p><a href="">18+ |
                                    T&amp;C's Apply | Be Gamble
                                    Aware</a></p>
                        </div>
                    </div>
                    <div class="rating-mobile-collapsed">
                        <div class="rating-mobile-area collapsed" data-toggle="collapse" href="#otherDescription5">
                            <div class="rating-img">
                                <span>5</span>
                                <img src="{{ asset('asset/frontend/img/rating/play.jpg')}}" align="center">
                            </div>
                            <div class="rating-mobile-content">
                                <h6>Go To Casino</h6>
                                <p>Extra Spins</p>
                                <span class="bonus-span">
                            100% Bonus</span>
                                <p>* 35</p>
                                <p><span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </p>
                                <a class="add-review-btn" href="http://projects.njgraphica.com/slottomat/review">
                                    Add Review
                                </a>
                            </div>
                            <div class="rating-mobile-btn">
                                <a href="" class="btn-play">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    <p>Play Here</p>
                                </a>
                            </div>
                        </div>
                        <div id="otherDescription5" class="card-body collapse other-description"
                             data-parent="#accordion">
                            <p>Overall 50 spins without wagering Get
                                50+30
                                bonus spins from Kicker section No
                                wagering
                                requirements ever !
                            </p>
                            <hr>
                            <p><a href="">18+ |
                                    T&amp;C's Apply | Be Gamble
                                    Aware</a></p>
                        </div>
                    </div>
                    <div class="rating-mobile-collapsed">
                        <div class="rating-mobile-area collapsed" data-toggle="collapse" href="#otherDescription7">
                            <div class="rating-img">
                                <span>6</span>
                                <img src="{{ asset('asset/frontend/img/rating/play.jpg')}}" align="center">
                            </div>
                            <div class="rating-mobile-content">
                                <h6>Go To Casino</h6>
                                <p>Extra Spins</p>
                                <span class="bonus-span">
                            100% Bonus</span>
                                <p>* 35</p>
                                <p><span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </p>
                                <a class="add-review-btn" href="http://projects.njgraphica.com/slottomat/review">
                                    Add Review
                                </a>
                            </div>
                            <div class="rating-mobile-btn">
                                <a href="" class="btn-play">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    <p>Play Here</p>
                                </a>
                            </div>
                        </div>
                        <div id="otherDescription7" class="card-body collapse other-description"
                             data-parent="#accordion">
                            <p>Overall 50 spins without wagering Get
                                50+30
                                bonus spins from Kicker section No
                                wagering
                                requirements ever !
                            </p>
                            <hr>
                            <p><a href="">18+ |
                                    T&amp;C's Apply | Be Gamble
                                    Aware</a></p>
                        </div>
                    </div>
                    <div class="rating-mobile-collapsed">
                        <div class="rating-mobile-area collapsed" data-toggle="collapse" href="#otherDescription8">
                            <div class="rating-img">
                                <span>7</span>
                                <img src="{{ asset('asset/frontend/img/rating/play.jpg')}}" align="center">
                            </div>
                            <div class="rating-mobile-content">
                                <h6>Go To Casino</h6>
                                <p>Extra Spins</p>
                                <span class="bonus-span">
                            100% Bonus</span>
                                <p>* 35</p>
                                <p><span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </p>
                                <a class="add-review-btn" href="http://projects.njgraphica.com/slottomat/review">
                                    Add Review
                                </a>
                            </div>
                            <div class="rating-mobile-btn">
                                <a href="" class="btn-play">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    <p>Play Here</p>
                                </a>
                            </div>
                        </div>
                        <div id="otherDescription8" class="card-body collapse other-description"
                             data-parent="#accordion">
                            <p>Overall 50 spins without wagering Get
                                50+30
                                bonus spins from Kicker section No
                                wagering
                                requirements ever !
                            </p>
                            <hr>
                            <p><a href="">18+ |
                                    T&amp;C's Apply | Be Gamble
                                    Aware</a></p>
                        </div>
                    </div>
                    <div class="rating-mobile-collapsed">
                        <div class="rating-mobile-area collapsed" data-toggle="collapse" href="#otherDescription9">
                            <div class="rating-img">
                                <span>8</span>
                                <img src="{{ asset('asset/frontend/img/rating/play.jpg')}}" align="center">
                            </div>
                            <div class="rating-mobile-content">
                                <h6>Go To Casino</h6>
                                <p>Extra Spins</p>
                                <span class="bonus-span">
                            100% Bonus</span>
                                <p>* 35</p>
                                <p><span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </p>
                                <a class="add-review-btn" href="http://projects.njgraphica.com/slottomat/review">
                                    Add Review
                                </a>
                            </div>
                            <div class="rating-mobile-btn">
                                <a href="" class="btn-play">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    <p>Play Here</p>
                                </a>
                            </div>
                        </div>
                        <div id="otherDescription9" class="card-body collapse other-description"
                             data-parent="#accordion">
                            <p>Overall 50 spins without wagering Get
                                50+30
                                bonus spins from Kicker section No
                                wagering
                                requirements ever !
                            </p>
                            <hr>
                            <p><a href="">18+ |
                                    T&amp;C's Apply | Be Gamble
                                    Aware</a></p>
                        </div>
                    </div>
                    <div class="rating-mobile-collapsed">
                        <div class="rating-mobile-area collapsed" data-toggle="collapse" href="#otherDescription10">
                            <div class="rating-img">
                                <span>9</span>
                                <img src="{{ asset('asset/frontend/img/rating/play.jpg')}}" align="center">
                            </div>
                            <div class="rating-mobile-content">
                                <h6>Go To Casino</h6>
                                <p>Extra Spins</p>
                                <span class="bonus-span">
                            100% Bonus</span>
                                <p>* 35</p>
                                <p><span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </p>
                                <a class="add-review-btn" href="http://projects.njgraphica.com/slottomat/review">
                                    Add Review
                                </a>
                            </div>
                            <div class="rating-mobile-btn">
                                <a href="" class="btn-play">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    <p>Play Here</p>
                                </a>
                            </div>
                        </div>
                        <div id="otherDescription10" class="card-body collapse other-description"
                             data-parent="#accordion">
                            <p>Overall 50 spins without wagering Get
                                50+30
                                bonus spins from Kicker section No
                                wagering
                                requirements ever !
                            </p>
                            <hr>
                            <p><a href="">18+ |
                                    T&amp;C's Apply | Be Gamble
                                    Aware</a></p>
                        </div>
                    </div>
                    <div class="rating-mobile-collapsed">
                        <div class="rating-mobile-area collapsed" data-toggle="collapse" href="#otherDescription11">
                            <div class="rating-img">
                                <span>10</span>
                                <img src="{{ asset('asset/frontend/img/rating/play.jpg')}}" align="center">
                            </div>
                            <div class="rating-mobile-content">
                                <h6>Go To Casino</h6>
                                <p>Extra Spins</p>
                                <span class="bonus-span">
                            100% Bonus</span>
                                <p>* 35</p>
                                <p><span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                </p>
                                <a class="add-review-btn" href="http://projects.njgraphica.com/slottomat/review">
                                    Add Review
                                </a>
                            </div>
                            <div class="rating-mobile-btn">
                                <a href="" class="btn-play">
                                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                                    <p>Play Here</p>
                                </a>
                            </div>
                        </div>
                        <div id="otherDescription11" class="card-body collapse other-description"
                             data-parent="#accordion">
                            <p>Overall 50 spins without wagering Get
                                50+30
                                bonus spins from Kicker section No
                                wagering
                                requirements ever !
                            </p>
                            <hr>
                            <p><a href="">18+ |
                                    T&amp;C's Apply | Be Gamble
                                    Aware</a></p>
                        </div>
                    </div>
                    <button class="btn btn-primary view-btn mx-auto d-block">View
                        All
                    </button>
                </div>
            </div>
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
    <section id="new-casino-content">
        <div class="container-fluid">
            <div class="row mt-30">
                <div class="col-md-2">
                    <div class="documentaion-shap-img">
                        <img class="d-shap-img-1 casino-jelly-img wow fadeInLeft animated"
                             data-wow-duration="1.5s" id="leftglobe"
                             src="{{ asset('asset/frontend/img/fishes/jelly-octopus.gif')}}" alt=""
                             style="visibility: visible; animation-duration: 1.5s; animation-name: bounce;width:150px;">
                    </div>
                </div>
                <div class="col-md-8">
                    <h4>Fordeler med nye nettcasino
                    </h4>
                    <p>Det kan v??re mange som er skeptiske til ?? benytte seg
                        av nyoppstartede casino, mest p?? grunn av at det
                        ikke fins mange omtaler, og det f??les litt utrygt.
                        Stort sett ??nsker vi ?? satse trygt, og g??r gjerne
                        til store akt??rer som har eksistert lenge. Men er
                        det bestandig slik at de st??rste og mest kjente
                        casinoene er de beste? Sannheten er at nye casino
                        kan gi deg mange fordeler, og i enkelte tilfeller,
                        en bedre opplevelse ogs??.
                    </p>

                    <ul>
                        <li><span>Mer kundevennlig:</span> Et nytt casino
                            har ikke s?? mye
                            trafikk enda, og yter mer for ?? beholde deg som
                            kunde enn hva stor akt??r ville gjort. Dette kan
                            gjelde bonuser p?? dine innskudd, eller gratis
                            spinn p?? spilleautomater du kunne tenkt deg ??
                            pr??ve. Er du en som spiller ofte, f??r du som
                            regel hakket bedre behandling hos nye akt??rer.

                        </li>
                        <li><span>Raskere hjelp:
                        </span>
                            Du kommer som regel raskere frem til
                            kundeservice om det skulle oppst?? problemer, da
                            det er mindre k?? p?? linjene hos nye casino.

                            I tillegg har de som regel oversatt nettsidene
                            godt til de landene de ??nsker kunder fra. Norge
                            er vel et av de landene som bestandig har godt
                            oversatte nettsider med mye god informasjon
                            rundt bonuser og vilk??r. Om ikke, skal vi
                            ihvertfall s??rge for at du f??r med deg alle
                            viktige detaljer i v??re anmeldelser av nye
                            casino som dukker opp.

                        </li>
                        <li><span>St??rre bonuser
                        </span>
                            Velkomsttilbudene er som regel veldig store hos
                            nye casino, ettersom de ??nsker ?? konkurrere med
                            de store gutta. Skal du f?? inn nok kunder til
                            casinoet, m?? du ha nok agn for at kunder vil
                            registrere seg.

                            Med den enorme konkurransen der ute, er det ikke
                            uvanlig ?? se b??de gratis bonuser, free spins, og
                            innskuddsbonuser opptil 200% p?? ditt f??rste
                            innskudd. For de som spiller ofte, er det viktig
                            ?? f?? med seg alle fordeler man kan f??r for ??
                            holde ut lengst mulig i spillet.

                        </li>
                        <li><span>Bedre mobil casino</span>
                            De nyeste plattformer for nettcasino er kostbare
                            ?? sette opp, men fordelen er at de passer
                            utmerket til alle enheter du ??nsker ?? spille p??.
                            For casino som er 10- 15 ??r gamle, blir det en
                            veldig dyr prosess ?? legge om, og tilbyr kanskje
                            halvferdige apper som ikke st??tter alle spill de
                            har i katalogen.

                            N??r over 60% av spillere p?? nett bruker f??rst og
                            fremst mobiltelefonen p?? casinospill, er det
                            egentlig litt rart at store akt??rer ikke tar p??
                            seg den kostnaden ?? legge om.

                            Men hos nye casino er det bestandig enkelt ??
                            benytte seg av spill og nettsider p??
                            mobiltelefon, da alt er tilrettelagt med en gang
                            du logger deg inn med enheten du ??nsker ?? bruke.

                        </li>
                        <li><span>Spennende fordelsprogrammer
                        </span>
                            Liker du ?? bli satt litt pris p?? som en lojal
                            kunde? Da er det ingen som gj??r det bedre enn
                            nye casino! Her kommer det veldig mange
                            innovative l??sninger p?? fordelsprogram.

                            Dette kan v??re at du opptjener gratisspinn n??r
                            du spiller, blir med i trekninger av bonuser
                            eller fine gevinster, samt cashback bonuser hvor
                            du f??r igjen noe av det tapte. I all hovedsak er
                            nye casino veldig opptatt av ?? beholde deg som
                            kunde, og ikke blir bare en i mengden.

                        </li>
                    </ul>

                    <h4>Ulemper med nye nettcasino</h4>
                    <p>Det er ikke bare fordeler med nye casino heller. Du
                        m?? v??re litt p??passelig hvilke casino du velger da
                        det kan fort v??re litt ugunstige vilk??r hos enkelte
                        akt??rer. S?? hold deg gjerne oppdatert p?? nettcasino
                        vi anbefaler her, s?? unng??r du:
                    </p>
                    <ul>
                        <li><span>Ugunstige omsetningskrav:</span>
                            Med store bonuser, kan det ogs?? f??lge med store
                            og uoppn??elige omsetningskrav ogs??. Noen av de
                            verste tilfellene er 200% bonus som skal
                            omsettes 45 ganger i l??pet av 7 dager!

                            Slike krav skj??nner de fleste ikke g??r med
                            enkelt barneskole matematikk. Men dessverre er
                            det spillere som ikke sjekker slike forhold fra
                            starten, og ender opp med tap av gevinster da
                            tidsfristen er alt for kort.
                        </li>
                        <li><span>Lavere uttaksgrenser:
                        </span>
                            Mange nye casino starter opp med mindre
                            budsjetter, og greier ikke ?? utbetale store
                            summer med en gang. Du f??r selvf??lgelig
                            gevinstene over tid, men vinner du store summer,
                            kan man fort bli ut??lmodig av slike vilk??r.

                            Med en uttaksgrense p?? 40 000 kroner i m??neden
                            og vinner 10 millioner, er det litt kjedelig ??
                            vente i over ti ??r for ?? cashe ut. N?? er det jo
                            f?? selvf??lgelig som opererer med s?? lave
                            grenser, men det er likevel viktig ?? sjekke ut
                            slike punkter ogs?? om man er heldig i spill.

                        </li>
                        <li><span>Tynnere spillutvalg
                        </span>
                            For de som er interessert i spilleautomater, er
                            det lett ?? finne nye casino ?? boltre seg p??. Men
                            er du for eksempel mer interessert i live casino
                            eller bordspill p?? videoautomater, kan det v??re
                            utfordrende ?? finne casino som har et godt
                            tilbud.

                            Dette er ofte p?? grunn av at spillerlisenser
                            koster en god del, og da satser de derfor litt
                            safe p?? f?? spill som mange liker, istedenfor
                            bredde. Et typisk eksempel er at det bugner av
                            spill p?? roulette og blackjack, mens poker og
                            andre spill er nesten helt borte fra spill
                            sortimentet.

                        </li>
                    </ul>

                    <h4>Pr??v nye casino gratis f??rst
                    </h4>
                    <p>Istedenfor ?? bruke en masse tid p?? ?? registrere deg
                        hos casino du aldri kommer til ?? bruke, er det
                        heller bedre ?? teste de ut litt p?? forh??nd. De
                        fleste casino vi har p?? listen gir deg muligheten
                        til ?? pr??ve b??de videoautomater og spilleautomater
                        gratis i demo versjon. I tillegg kan du ogs?? lese
                        anmeldelser vi skriver for ?? bli bedre kjent med
                        vilk??r, spillutvalg og ikke minst kundeservice.

                        Grunnen til at vi har flere casino ?? velge mellom,
                        er at vi vet at spilleres kriterier er forskjellige.
                        enten du er glad i spilleautomater, bingo eller
                        skrapelodd, spiller det ingen rolle. Vi har noe for
                        enhver smak!
                    </p>
                </div>
                <div class="col-md-2">
                    <div class="documentaion-shap-img">
                        <img class="casino-tortoise-img wow fadeInLeft animated"
                             data-wow-duration="1.5s"
                             src="{{ asset('asset/frontend/img/fishes/tortoise.gif')}}" alt=""
                             style="visibility: visible; animation-duration: 1.5s; animation-name: bounce;">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
