<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="google-site-verification" content="JJ46-tAVgZacw8_iRInMYZM-udNMn8k3j76HAr7LweE" />
    @yield('meta_tags')
    @yield('schemaMarkup')
    <!-- Favicons -->
    <link href="{{asset('asset/frontend/img/logo/favicon.png')}}" rel="icon">
    <link href="{{asset('asset/frontend/img/logo/favicon.png')}}" rel="apple-touch-icon">
    <!-- Bootstrap CSS File -->
    @if(url()->current() == url('/'))
      <link rel="stylesheet" href="{{ asset('asset/frontend/css/cdn.css') }}" >
      <link rel="stylesheet" href="{{ asset('asset/frontend/css/index.css') }}" >
    @elseif(url()->current()==url('/india-demo'))
      <link rel="stylesheet" href="{{ asset('asset/frontend/css/cdn2.css') }}" >
    @else
      <link rel="stylesheet" href="{{ asset('asset/frontend/css/cdn.css') }}" >
      <link rel="stylesheet" href="{{ asset('asset/frontend/css/subPage.css') }}" >
    @endif

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="{{asset('asset/frontend/js/jquery.js')}}"></script>
    <script>
        $(document).ready(function(){
            if(window.innerWidth > 768){
              $('.oc-header .menu__link').hover(function(){
                 $(this).children('a').css('color','#fff').find('i').css('color','#fff');
                },function(){
                   $(this).children('a').css('color','#4f5964').find('i').css('color','#da1f15');
              });
              $('#myVideo-desktop').attr('autoplay','');
              $('#myVideo-desktop').removeAttr('preload');

            }
            else{
              $('#myVideo-mobile').attr("poster","/asset/frontend/img/mobile-banner.webp").attr('autoplay',true);
              $('#myVideo-mobile').removeAttr('preload');
            }
        });
    </script>
    @yield('styles')
</head>
<body>
@php
    $menu = json_decode(@\App\Menu::find(1)->data);
    $menu_id = 0;
    //print_r(url());
@endphp

<header id="header-desk">
    <div class="container">
        <div class="row">
            <div class="menu-Icon d-lg-none">
                    <i class="fa fa-bars menuToggle" aria-hidden="true"></i>
                </div>
                <div id="menuOverlay" class="menuToggle"></div>
            <nav class="navbar navbar-expand-lg w-100">
                <div class="oc-header oc-header--desktop">
                    <div class="navbar-collapse" id="navbarNavDropdown">
                        <a class="nav-link" href="{{ route('frontend.all-games') }}">Gratis Spilleautomater</a>
                        <a class="nav-link" href="{{ route('frontend.new-casinos') }}">Nye Casino</a>
                    </div>
                        <div class="dropdown dropdown--open-on-hover dropdown--cats">
                            <a class="dropdown-toggler menu_arrow menuColla" role="button" href="javascript:void(0)">
                            Meny
                        <i class="fa fa-angle-up ml-4 lgNoDis pl-4" aria-hidden="true"></i>
                        </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="h-100">
                                    <ul class="dropdown-menu__list dropdown-menu__list--level-1">
                                     @foreach($menu as $data)
                                        <li id="menu-item-1686" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-has-children menu__link menu-item-1686">
                                            <a href="{{ $data->href ? url($data->href) : 'javascript:void(0)' }}"><i class="{{ $data->icon }}"></i>
                                                @php 
                                                    $id =  @$data->menu_id;
                                                    $table =  @$data->menu_type;
                                                    sdh_dynamic_menu($id,$table,$data->text);
                                               @endphp
                                                @if(isset($data->children))
                                                <span class="menu__arrow menuColla">
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                    <i class="fa fa-angle-up ml-4 lgNoDis" aria-hidden="true"></i>
                                                </span>
                                                @endif
                                            </a>
                                            @if(isset($data->children))
                                            <div class="dropdown-menu dropdown-menu--sub dropdown-menu--level-2">
                                                <div class="fxdc h100p">
                                                    <ul class="dropdown-menu__list dropdown-menu__list--level-2">
                                                        @foreach($data->children as $item)
                                                        <li id="menu-item-311" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu__link menu-item-311">
                                                            <a href="{{ $item->href ? $item->href : 'javascript:void(0)' }}">
                                                                    <i class="{{ $item->icon }}"></i>
                                                                     @php 
                                                                        $id =  @$item->menu_id;
                                                                        $table =  @$item->menu_type;
                                                                        sdh_dynamic_menu($id,$table,$item->text);
                                                                    @endphp
                                                                @if(isset($item->children))
                                                                    <span class="menu__arrow menuColla">
                                                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                                        <i class="fa fa-angle-up ml-4 lgNoDis" aria-hidden="true"></i>
                                                                    </span>
                                                                @endif
                                                            </a>
                                                            @if(isset($item->children))
                                                            <div class="dropdown-menu dropdown-menu--sub dropdown-menu--level-2">
                                                                <div class="fxdc h100p">
                                                                    <ul class="dropdown-menu__list dropdown-menu__list--level-2">
                                                                        @foreach($item->children as $item)
                                                                        <li id="menu-item-311" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu__link menu-item-311">
                                                                            <a href="{{ $item->href ? $item->href : 'javascript:void(0)' }}">

                                                                                    <i class="{{ $item->icon }}"></i>
                                                                               @php 
                                                                                $id =  @$item->menu_id;
                                                                                $table =  @$item->menu_type;
                                                                                sdh_dynamic_menu($id,$table,$item->text);
                                                                                @endphp
                                                                            </a>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                        </li>
                                    @endforeach 
                                    </ul>
                                </li>
                            </ul>

                        </div>

                </div>
                <a class="navbar-brand" href="{{ route('frontend.index') }}"><img src="/asset/frontend/img/logo/logo2.png" class="img-fluid" alt="Slottomat Logo"></a>

            </nav>
        </div>
    </div>
</header>
@yield('content')
<!--Footer-->
<div class="sud" style="background:#0b004b;">
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1"
         style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
         viewBox="0 0 17707.28 1306.81"
    >

    <style type="text/css">
        .fil2 {fill: #08022a}
    </style>
        <g id="Layer_x0020_1" class="DarkWaves">
            <metadata id="CorelCorpID_0Corel-Layer"/>
            <path class="fil2"
                  d="M-0 1306.81l0 -173.57c1233.44,-172.03 1430.2,-1385.58 2778.37,-642.92 1250.96,689.11 1935.19,-429.67 3799.13,195.75 829.44,278.31 1417.97,-1059.44 2750.55,-314.21 1767.11,988.23 2075.82,-1133.74 3279.04,-59.49 624.04,557.16 1053.24,504.54 1741.86,17.8 374.17,-264.48 894.65,-178.97 1302.59,21.6 714.26,351.18 930.6,-659.4 2028.15,249.9 6.49,5.37 15.91,12.18 27.59,20.06l0 685.09 -17707.28 0z"/>
        </g>
  </svg>
</div>
@php
    $footer_menu_widget1 = json_decode(@\App\Menu::find(2)->data);
    $footer_menu_widget2 = json_decode(@\App\Menu::find(3)->data);
    $footer_menu_widget3 = json_decode(@\App\Menu::find(4)->data);
@endphp
<footer id="footer">
    <div class="footer-top" aria-label="skattekiste under vann">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-links">
                      <p class="h4Title">Sider</p>
                    <ul>
                       @foreach($footer_menu_widget1 ?? [] as $data)
                        <li> <a href="{{ url($data->href) }}">{{ $data->text }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                      <p class="h4Title">Sider</p>
                    <ul>
                      @foreach($footer_menu_widget2 ?? [] as $data)
                        <li> <a  href="{{ url($data->href) }}">{{ $data->text }}</a></li>
                        @endforeach 

                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                      <p class="h4Title">Sider</p>
                    <ul>
                         @foreach($footer_menu_widget3 ?? [] as $data)
                        <li> <a href="{{ url($data->href) }}">{{ $data->text }}</a></li>
                        @endforeach 
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <p class="h4Title">Kontakt oss</p>
                    <p>
                        <strong>Email:</strong> <a class="email-link" href="mailto:info@slottomat.com">info@slottomat.com</a><br>
                    </p>
                    <div class="subscription-form">
                        <span>Abonner på vårt nyhetsbrev</span>
                        <form class="subscribeForm" action="{{ route('frontend.subscribers.subscribe') }}" method="post">
                            @csrf
                            <div class="subscribe-footer-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> Abonnere </button>
                                    </div>
                                    <div class="form-group mt-3">
                                    <input type="checkbox" id="agree_newsletter_footer" name="agree" value="yes">
                                    <label for="agree_newsletter_footer">
                                       Jeg aksepterer
                                        <a href="{{ route('frontend.page.terms') }}">vilkår og betingelser </a> og
                                        <a href="{{ route('frontend.page.privacy-policy') }}">Personvern</a>
                                    </label>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="siteSelection">
                        @include('partials.country-selector')
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="https://hjelpelinjen.no/" target="_blank">
                        <div class="age">
                            <img  src="{{ asset('asset/frontend/img/logo/18logo.png') }}" alt="a warning sign with 18+ for gambling online">
                            Spill Ansvarlig
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="https://hjelpelinjen.no/" target="_blank">
                        <div class="help">
                            <img style="width:40px" src="{{ asset('asset/frontend/img/logo/help-logo.png') }}" alt="slottomat help">
                            Hjelpelinjen
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        &copy; Copyright <strong>SLOTTOMAT.COM</strong>. All Rights Reserved
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container"></div> --}}
</footer><!-- #footer -->
<!--newsletter popup-->

<!--popup-->
<div class="modal gamepop fade" id="gameModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body ">
                <div class="star-bg"></div>
                <div class="wf-wrap">
                    <div class="wf"></div>
                </div>
                <div class="land-wrap">
                    <img class="img-fluid" src="{{asset('asset/frontend/img/popup/land.png')}}" alt="slot land base" />
                </div>
                <div class="cloud-wrap">
                    <img  src="{{asset('asset/frontend/img/popup/clouds.png')}}" class="img-fluid w-100" alt="moving clouds slottomat" />
                </div>
                <div class="moon-wrap casino-moon-wrap">
                    <div class="moon"></div>
                </div>
                <div class="tresure-wrap">
                    <div class="treasure-box">
                        <img src="{{asset('asset/frontend/img/popup/o-box.gif')}}" class="img-fluid t-box" alt="treasure chest with golden coins of slottomat"/>
                        <img  src="{{asset('asset/frontend/img/popup/coin.png')}}" class="img-fluid cin" alt="slottomat golden coins"/>
                    </div>
                </div>
                <div class="caracter-wrap">
                    <img  src="{{asset('asset/frontend/img/popup/pirate-scope.gif')}}" alt="pirate scope of slottomat" class="img-fluid" />
                </div>
                <div class="pop-box">
                    <div class="provider-logo text-center pt-5 pb-3">
                    </div>
                    <div class="provider-name text-center">
                    </div>
                    <div class="game-decs text-center">
                        <p>Are You 18+ ?</p>
                    </div>
                </div>
                <div class="action d-flex flex-wrap justify-content-center align-items-center">
                    <div id="popAgree" class="cta">
                        <a href="javascript:void(0);" class="agree" target="" data-dismiss="">
                            Agree
                        </a>
                    </div>
                    <div id="popDisagree" class="cta">
                        <a href="{{ route('frontend.index') }}" class="decline">
                            Decline
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--popup-->

<!--cookies-->
<div class="alert text-center cookiealert" role="alert">
    <b>Vi bruker informasjonskapsler? </b> &#x1F36A;  for å sikre at du får den beste opplevelsen på vår hjemmeside. <a
        href="{{ route('frontend.page.cookies') }}" target="_blank"> Ler mere</a>

    <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
         jeg aksepterer
    </button>
</div>
{{-- <div id="preloader"></div> --}}
@if(url()->current()==url('/india-demo'))
  <script src="{{ asset('asset/frontend/js/main.js?v=1.0.0.1')}}"></script>
@else
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <script src="{{ asset('asset/frontend/js/main.js?v=1.0.0.1')}}"></script>
@endif
@yield('scripts')
</body>

</html>
