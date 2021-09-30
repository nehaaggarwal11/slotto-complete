<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @yield('meta_tags')

    <!-- Favicons -->
    <link href="{{asset('asset/frontend/img/logo/favicon.png')}}" rel="icon">
    <link href="{{asset('asset/frontend/img/logo/favicon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('asset/frontend/css/bootstrap.min.css') }}"
          rel="stylesheet">
    <link
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    {{--<link href="{{ asset('asset/frontend/css/nice-select.css') }}"
          rel="stylesheet">--}}
    <link href="{{asset('asset/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/frontend/css/owl.carousel.min.css') }}"
          rel="stylesheet">
    <link href="{{ asset('asset/frontend/css/msdropdown/dd.css') }}"
        rel="stylesheet">
    <link href="{{ asset('asset/frontend/css/msdropdown/flags.css') }}"
        rel="stylesheet">
    <link href="{{ asset('asset/frontend/css/main-style.css?v=1.0.0.2') }}"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/cookiealert.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/custom.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-77ZLR7M5GT"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-77ZLR7M5GT');
    </script>


</head>

<body>
@php 
    $menu = json_decode(@\App\Menu::find(1)->data);
@endphp
<header id="header-desk" class="d-none d-lg-block">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg w-100">
                <div class="oc-header oc-header--desktop">
                        <div class="dropdown dropdown--open-on-hover dropdown--cats">
                            <a class="dropdown-toggler" role="button" href="javascript:void(0)">
                            Menu </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="h-100">
                                    <ul class="dropdown-menu__list dropdown-menu__list--level-1">
                                    @foreach($menu as $data)
                                        <li id="menu-item-1686" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-has-children menu__link menu-item-1686">
                                            <a href="{{ $data->href }}">
                                                <span class="menu__icon">
                                                    <i class="{{ $data->icon }}"></i>
                                                </span>
                                                <span class="fx">{{ $data->text }}</span>
                                                @if(isset($data->children))
                                                <span class="menu__arrow">
                                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </span> 
                                                @endif
                                            </a>
                                            <button class="dropdown-toggle" aria-expanded="false">
                                                <span class="screen-reader-text">Open child menu</span>
                                            </button>
                                            @if(isset($data->children))
                                            <div class="dropdown-menu dropdown-menu--sub dropdown-menu--level-2">
                                                <div class="fxdc h100p"> 
                                                    <ul class="dropdown-menu__list dropdown-menu__list--level-2">
                                                        @foreach($data->children as $item)
                                                        <li id="menu-item-311" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu__link menu-item-311">
                                                            <a href="{{ $item->href }}">
                                                                <span class="menu__icon">
                                                                    <i class="{{ $item->icon }}"></i>
                                                                </span>
                                                                <span class="fx">{{ $item->text }}</span>
                                                                @if(isset($item->children))
                                                                    <span class="menu__arrow">
                                                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                                    </span> 
                                                                @endif
                                                            </a>
                                                            <button class="dropdown-toggle" aria-expanded="false">
                                                                <span class="screen-reader-text">Open child menu</span>
                                                            </button>
                                                            @if(isset($item->children))
                                                            <div class="dropdown-menu dropdown-menu--sub dropdown-menu--level-2">
                                                                <div class="fxdc h100p"> 
                                                                    <ul class="dropdown-menu__list dropdown-menu__list--level-2">
                                                                        @foreach($item->children as $item)
                                                                        <li id="menu-item-311" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu__link menu-item-311">
                                                                            <a href="{{ $item->href }}">
                                                                                <span class="menu__icon">
                                                                                    <i class="{{ $item->icon }}"></i>
                                                                                </span>
                                                                                <span class="fx">{{ $item->text }}</span>
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
                <a class="navbar-brand" href="{{ route('frontend.index') }}"><img src="https://www.slottomat.com/asset/frontend/img/logo/logo2.png" class="img-fluid" alt="Site Logo"></a>    
                
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.all-games') }}">Free Slots </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.new-casinos') }}">New Slots Sites</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.software') }}">Softwares</a>
                        </li>
                    </ul>
                </div>
            </nav>    
                
        </div>
    </div>
</header>

<header id="header" class="d-block d-lg-none">
    <a href="{{ route('frontend.index') }}" class="logo-img"><img src="{{asset('asset/frontend/img/logo/logo2.png')}}"
                                          class="mx-auto d-block landing-logo-img" alt="logo of slottomat.com with a red background, stars and 3 lucky 7"></a>
    
    <nav class="mobile-nav d-lg-none">
        <ul class="single-menu-right right-menu">
            <li><a href="{{ route('frontend.casino-bonus') }}"><img
                        src="{{asset('asset/frontend/img/menu/gift.svg')}}"
                        width="15" alt="gift">Free Spins</a></li>
            <li><a href="{{ route('frontend.all-games') }}"><img src="{{asset('asset/frontend/img/menu/game.svg')}}"
                                                 width="15" alt="game">Free Slots</a></li>
            <li><a href="{{ route('frontend.new-casinos') }}"><img
                        src="{{asset('asset/frontend/img/menu/new-tag.svg')}}" width="15" alt="new">New Slots Sites</a></li>
            <li><a href="{{ route('frontend.software') }}"><img
            src="{{asset('asset/frontend/img/menu/news.svg')}}" width="15" alt="new">Software</a></li>
            

            <li class="drop-down"><a href="javascript:void(0);">Menu</a>
                <ul>
                    @foreach($menu as $data)
                    <li class="mobile-mega-menu">
                        <a href="{{ $data->href }}">
                            <span class="menu__icon"><i class="{{ $data->icon }}"></i></span>
                            {{ $data->text }}
                        </a>
                        @if(isset($data->children))
                        <span class="menu_arrow mega-menu-arrow-first">
                            <i class="fa fa-chevron-up" aria-hidden="true"></i>
                        </span>
                        @endif
                        <ul class="mobile-mega-menu-child">
                        @if(isset($data->children))
                            @foreach($data->children as $item)
                                <li>
                                    <a href="{{ $item->href }}">
                                        <span class="menu__icon"><i class="{{ $item->icon }}"></i></span>
                                        {{ $item->text }}
                                    </a>
                                    @if(isset($item->children))
                                        <span class="menu_arrow mega-menu-arrow-second">
                                            <i class="fa fa-chevron-up" aria-hidden="true"></i>
                                        </span>
                                    @endif
                                    <ul class="mobile-mega-menu-sub-child">
                                    @if(isset($item->children))
                                        @foreach($item->children as $item)
                                            <li>
                                                <a href="{{ $item->href }}">
                                                    <span class="menu__icon"><i class="{{ $item->icon }}"></i></span>
                                                    {{ $item->text }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                        </ul>
                    </li>
                    @endforeach
                    <li><a href="{{ route('frontend.faq') }}">FAQ</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- .main-nav -->
</header>