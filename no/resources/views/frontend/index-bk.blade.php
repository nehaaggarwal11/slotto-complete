<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $data->seo_title }}</title>
    <meta content="{{ $data->seo_keyword }}" name="keywords">
    <meta content="{{ $data->seo_description }}" name="description">

    <!-- Favicons -->
    <link href="{{asset('asset/frontend/img/logo/favicon.png')}}" rel="icon">
    <link href="{{asset('asset/frontend/img/logo/favicon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700"
        rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ ('asset/frontend/css/bootstrap.min.css') }}"
          rel="stylesheet">
    <link
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet">

    <link href="{{ ('asset/frontend/css/msdropdown/dd.css') }}" rel="stylesheet">
    <link href="{{ ('asset/frontend/css/msdropdown/flags.css') }}" rel="stylesheet">
    <link href="{{ ('asset/frontend/css/style.css') }}" rel="stylesheet">
    
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

<header id="header">
    <img src="{{('asset/frontend/img/logo/logo2.png')}}"
         class="mx-auto d-block landing-logo-img" alt="logo of slottomat.com with a red background, stars and 3 lucky 7">
    <nav class="main-nav float-right d-none d-lg-block">
        <ul>
            <li class="drop-down"><a href="">More</a>
                <ul>
                    <li><a href="{{ route('frontend.casino-bonus') }}">Casino Bonus</a></li>
                    <li><a href="{{ route('frontend.all-games') }}">Games</a></li>
                    <li><a href="{{ route('frontend.new-casinos') }}">New Casino</a></li>
                    <li><a href="{{ route('frontend.all-news') }}">News</a></li>
                    <li><a href="{{ route('frontend.page.general-information') }}">General Information</a></li>
                    <li><a href="{{ route('frontend.faq') }}">FAQ</a></li>
                </ul>
            </li>
        </ul>
    </nav><!-- .main-nav -->
    <nav class="mobile-nav d-lg-none">
        <ul>
            <li><a href="{{ route('frontend.casino-bonus') }}">Casino Bonus</a></li>
            <li><a href="{{ route('frontend.all-games') }}">Games</a></li>
            <li><a href="{{ route('frontend.new-casinos') }}">New Casino</a></li>
            <li><a href="{{ route('frontend.all-news') }}">News</a></li>
            <li><a href="{{ route('frontend.page.general-information') }}">General Information</a></li>
            <li><a href="{{ route('frontend.faq') }}">FAQ</a></li>

        </ul>
    </nav>
</header>
<div id="preloader" aria-label="happy pirate waving a flag"></div>
<div class="desktop-video-section">

    <video autoplay muted loop id="myVideoDesktop">
        <source src="{{('asset/frontend/img/banners/banner.mp4?v=1.1')}}" type="video/mp4">
    </video>

    <div class="coin-box">
        <audio id="audioBox" preload="none">
            <source src="{{('asset/frontend/sounds/box-open.mp3')}}"
                    type="audio/mpeg">
        </audio>
        <img src="{{('asset/frontend/img/box/box-blink.gif')}}"
             class="boxgif img-responsive" alt="A moving treasure chest">
    </div>

    <div class="coins">
        <img src="{{('asset/frontend/img/box/coin.png')}}"
             class="img-responsive coin-img" alt="
             A pile of gold coins">
    </div>

    <div class="casino-board">
        @php($board_image = \App\StaticPage::getMediaField('landing-page', 'board_image'))
        <a href="{{ route('frontend.home') }}"><img src="{{ @$board_image->url }}"
             class="img-responsive" alt="{{ @$data->board_image_alt_text }}"></a>

    </div>
    <div class="casino-board-link">
        <h1 style="display: none;"><a href="{{ route('frontend.home') }}">Start Your <span>Casino Adventure</span></a></h1>
        <img src="{{('asset/frontend/img/box/arrow.gif')}}"
             class="img-responsive arrow-img" alt="
             An arrow with neon lights pointing up">
    </div>
</div>

<div class="mobile-video-section">
    <video title="Pirate ships moving at sea and slot machines on land" autoplay muted loop id="myVideoMobile">
        <source src="{{('asset/frontend/img/banners/mobile-banner.mp4')}}"
                type="video/mp4">
    </video>
    <div class="casino-board-mobile">
        <a href="{{ route('frontend.home') }}"><img src="{{ @$board_image->url }}"
             class="img-responsive" alt="{{ @$data->board_image_alt_text }}"></a>
    </div>
    <div class="casino-board-link">
        <img src="{{('asset/frontend/img/box/arrow.gif')}}"
             class="img-responsive arrow-img" alt="An arrow with neon lights pointing up">
    </div>


</div>
<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container-fluid">
            <div class="d-none d-lg-block d-xl-block">
                <div class="row">

                    <div class="col-lg-6 col-md-6 footer-info">
                        <img src="{{ asset('asset/frontend/img/logo/18logo.png') }}" class="age-logo" alt="a warning sign with 18+ for gambling online">
                        <div class="copyright">
                            &copy; Copyright<strong>SLOTTOMAT.COM</strong>. All Rights Reserved
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 footer-links">
                        <ul>
                            <li><a href="{{ route('frontend.page.privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('frontend.page.responsible-gaming') }}">Responsible Gaming</a></li>
                            <li><a href="{{ route('frontend.page.terms') }}">Terms & Condition</a></li>
                            <li><a href="{{ route('frontend.sitemap-page') }}">Sitemap</a></li>
                            <li><a href="{{ route('frontend.page.about-us') }}">About Us</a></li>
                        </ul>
                        @include('partials.country-selector')
                    </div>
                </div>
            </div>

            <div class="d-block d-lg-none d-xl-none">
                <div class="row">
                    <div class="col-lg-6 col-md-6 footer-links">
                        <ul>
                            <li><a href="{{ route('frontend.page.privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('frontend.page.responsible-gaming') }}">Responsible Gaming</a></li>
                            <li><a href="{{ route('frontend.page.terms') }}">Terms & Condition</a></li>
                            <li><a href="{{ route('frontend.sitemap-page') }}">Sitemap</a></li>
                            <li><a href="{{ route('frontend.page.about-us') }}">About Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 footer-info">
                        <img src="{{ asset('asset/frontend/img/logo/18logo.png') }}" class="age-logo-mobile" alt="a warning sign with 18+ for gambling online">
                        <div class="copyright">
                            &copy; Copyright<strong>SLOTTOMAT.COM</strong>. All Rights Reserved
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </footer><!-- End Footer -->


{{-- <div id="preloader"></div> --}}

<!-- JavaScript Libraries -->
<script src="{{ ('asset/frontend/js/jquery.min.js') }}"></script>
<script src="{{ ('asset/frontend/js/jquery-migrate.min.js') }}"></script>
<script src="{{ ('asset/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ ('asset/frontend/js/mobile-nav.js') }}"></script>
<script src="{{ ('asset/frontend/js/jquery.dd.min.js') }}"></script>
<!-- Template Main Javascript File -->
<script src="{{ ('asset/frontend/js/main.js') }}"></script>

</body>

</html>
