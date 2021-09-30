<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @yield('meta_tags')

    <!-- Favicons -->
    <link href="{{asset('asset/frontend/img/logo/favicon.png')}}" rel="icon">
    <link href="{{asset('asset/frontend/img/logo/favicon.png')}}"
        rel="apple-touch-icon">

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
    {{--<link href="{{ asset('asset/frontend/css/nice-select.css') }}"
    rel="stylesheet">--}}
    <link href="{{asset('asset/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/frontend/css/owl.carousel.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('asset/frontend/css/main-style.css') }}"
        rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('asset/frontend/css/cookiealert.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('asset/frontend/css/custom.css') }}">
    <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>



</head>

<body>

    <header id="header">
        <a href="{{ route('frontend.home') }}" class="logo-img"><img
                src="{{asset('asset/frontend/img/logo/logo2.png')}}"
                class="mx-auto d-block landing-logo-img"
                alt="logo of slottomat.com with a red background, stars and 3 lucky 7"></a>
        <div class="header-content">
            <nav class="main-nav d-none d-lg-block">
                <ul class="single-menu-left left-menu">
                    {{-- <li><a href="{{ route('frontend.casino-bonus') }}"><img
                        src="{{asset('asset/frontend/img/menu/gift.svg')}}"
                        width="15" alt="gavepakke">Casino Bonus</a></li> --}}

                    <li><a href="{{ route('frontend.all-games') }}"><img
                                src="{{asset('asset/frontend/img/menu/game.svg')}}"
                                alt="game" width="15">Games</a></li>
                    <li><a href="{{ route('frontend.all-news') }}"><img
                                src="{{asset('asset/frontend/img/menu/news.svg')}}"
                                width="15" alt="news">News</a></li>
                </ul>
            </nav>

            <nav class="main-nav d-none d-lg-block">
                <ul class="single-menu-right right-menu">
                    {{-- <li><a href="{{ route('frontend.new-casinos') }}"><img
                        src="{{asset('asset/frontend/img/menu/new-tag.svg')}}"
                        alt="new" width="15">New Casino</a></li> --}}



                    <li><a href="{{ route('frontend.page.general-information') }}"><img
                        src="{{asset('asset/frontend/img/menu/information.svg')}}"
                        alt="new" width="15">General
                            Information</a></li>
                    <li><a href="{{ route('frontend.faq') }}"><img
                        src="{{asset('asset/frontend/img/menu/faq.svg')}}"
                        alt="new" width="15">FAQ</a></li>

                </ul>
            </nav>
        </div>
        <nav class="mobile-nav d-lg-none">
            <ul class="single-menu-right right-menu">
                <li><a href="{{ route('frontend.casino-bonus') }}"><img
                            src="{{asset('asset/frontend/img/menu/gift.svg')}}"
                            width="15" alt="gift">Casino Bonus</a></li>
                <li><a href="{{ route('frontend.all-games') }}"><img
                            src="{{asset('asset/frontend/img/menu/game.svg')}}"
                            width="15" alt="game">Games</a></li>
                <li><a href="{{ route('frontend.new-casinos') }}"><img
                            src="{{asset('asset/frontend/img/menu/new-tag.svg')}}"
                            width="15" alt="new">New Casino</a></li>
                <li><a href="{{ route('frontend.all-news') }}"><img
                            src="{{asset('asset/frontend/img/menu/news.svg')}}"
                            alt="news" width="15">News</a></li>

                <li class="drop-down"><a href="javascript:void(0);">More</a>
                    <ul>
                        <li><a
                                href="{{ route('frontend.page.general-information') }}">General
                                Information</a></li>
                        <li><a href="{{ route('frontend.faq') }}">FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- .main-nav -->
    </header>