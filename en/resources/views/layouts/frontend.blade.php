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
    @yield('styles')

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
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.software') }}">Softwares</a>
                        </li> --}}
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
<!-- <header id="header">
    <a href="{{ route('frontend.index') }}" class="logo-img"><img src="{{asset('asset/frontend/img/logo/logo2.png')}}"
                                          class="mx-auto d-block landing-logo-img" alt="logo of slottomat.com with a red background, stars and 3 lucky 7"></a>
    <div class="header-content">
        <nav class="main-nav d-none d-lg-block">
            <ul class="single-menu-left left-menu">
                <li><a href="{{ route('frontend.casino-bonus') }}"><img
                            src="{{asset('asset/frontend/img/menu/gift.svg')}}"
                            width="15" alt="gavepakke">Free Spins</a></li>
                <li><a href="{{ route('frontend.all-games') }}"><img src="{{asset('asset/frontend/img/menu/game.svg')}}" alt="game"  width="15">Free Slots</a></li>
                <li class="drop-down"><a href="javascript:void(0)">Menu</a>
                    <ul class="dropdown-categories">
                        <li><a href="">Test 1</a></li>
                        <li><a href="">Test 2</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <nav class="main-nav d-none d-lg-block">
            <ul class="single-menu-right right-menu">
                <li><a href="{{ route('frontend.new-casinos') }}"><img
                            src="{{asset('asset/frontend/img/menu/new-tag.svg')}}" alt="new"
                            width="15">New Slots Sites</a></li>
                <li>
                    <a href="{{ route('frontend.software') }}">
                    <img
                            src="{{asset('asset/frontend/img/menu/news.svg')}}"
                            width="15" alt="news">Software
                    </a>
                </li>

                <li class="drop-down"><a href="">More</a>
                    <ul>
                        <li><a href="{{ route('frontend.all-news') }}">News</a></li>
                        <li><a href="{{ route('frontend.faq') }}">FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
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
            

            <li class="drop-down"><a href="javascript:void(0);">More</a>
                <ul>
                    <li><a href="{{ route('frontend.all-news') }}">News</a></li>
                    <li><a href="{{ route('frontend.faq') }}">FAQ</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header> -->
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
<footer id="footer">
    <div class="footer-top" aria-label="skattekiste under vann">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Pages</h4>
                    <ul>
                        <li><i class="ion-ios-arrow-right"></i> <a
                                href="{{ route('frontend.page.privacy-policy') }}">Privacy Policy</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="{{ route('frontend.page.responsible-gaming') }}">Responsible Gaming</a>
                        </li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="{{ route('frontend.page.terms') }}">Terms & Conditions</a>
                        </li>
                        {{-- <li><i class="ion-ios-arrow-right"></i> <a href="{{ route('frontend.sitemap-page') }}">Sitemap</a></li> --}}
                        <li><i class="ion-ios-arrow-right"></i> <a
                                href="{{ route('frontend.page.about-us') }}">About Us</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Pages</h4>
                    <ul>
                        <li><i class="ion-ios-arrow-right"></i> <a href="{{ route('frontend.casino-bonus') }}">Free Spins</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="{{ route('frontend.new-casinos') }}">New Slots Sites</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="{{ route('frontend.all-games') }}">Free Slots</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a href="{{ route('frontend.software') }}">Software</a></li>
                        
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Pages</h4>
                    <ul>
                    <li><i class="ion-ios-arrow-right"></i> <a
                                href="{{ route('frontend.faq') }}">FAQ</a></li>
                        <li><i class="ion-ios-arrow-right"></i> <a
                                href="{{ route('frontend.all-news') }}">News</a></li>                    
                        <li><i class="ion-ios-arrow-right"></i> <a
                                href="{{ route('frontend.page.cookies') }}">Cookies</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <p>
                        <strong>Email:</strong> <a href="mailto:someone@example.com?Subject=Hello%20again"
                                                   class="email-link">info@slottomat.com</a><br>
                    </p>
                    <div class="subscription-form">
                        <h6>Subscribe To Our Newsletter</h6>
                        <form class="subscribeForm" action="{{ route('frontend.subscribers.subscribe') }}" method="post">
                            @csrf
                            <div class="subscribe-footer-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="email" placeholder="E-mail" required>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="form-group mt-3">
                                    <input type="checkbox" id="agree_newsletter_footer" name="agree" value="yes">
                                    <label for="agree_newsletter_footer">
                                        I accept
                                        <a href="{{ route('frontend.page.terms') }}">terms & Condition </a> and
                                        <a href="{{ route('frontend.page.privacy-policy') }}">Privacy Policy</a>
                                    </label>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @include('partials.country-selector')
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="https://www.begambleaware.org/" target="_blank">
                        <div class="age">
                            <img src="{{ asset('asset/frontend/img/logo/18logo.png') }}" alt="a warning sign with 18+ for gambling online">
                            Play Responsible
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="https://www.begambleaware.org/" target="_blank">
                        <div class="help">
                            <img src="{{ asset('asset/frontend/img/logo/gamble.png') }}" alt="help logo">
                            Be Gamble Aware
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
<!---newsletter popup--->
<!---cookies--->
<div class="alert text-center cookiealert" role="alert">
    <b>We use cookies?</b> &#x1F36A; to make sure you get the best experience on our website. <a
        href="{{ route('frontend.page.cookies') }}" target="_blank">Read More</a>

    <button type="button" class="btn btn-primary btn-sm acceptcookies" aria-label="Close">
        I accept
    </button>
</div>
{{-- <div id="preloader"></div> --}}
<script src="{{ asset('asset/frontend/js/jquery.min.js') }}"></script>
<!-- Include cookiealert script -->
<script src="{{ asset('asset/frontend/js/cookiealert.js') }}"></script>
<script src="{{ asset('asset/frontend/js/bootstrap.bundle.min.js') }}"></script>
<!-- JavaScript Libraries -->
<script src="{{ asset('asset/frontend/js/popper.min.js')}}"></script>
<script src="{{ asset('asset/frontend/js/particles.min.js') }}"></script>
<script src="{{ asset('asset/frontend/js/mobile-nav.js') }}"></script>
<script src="{{ asset('asset/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('asset/frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('asset/frontend/js/jquery.dd.min.js') }}"></script>
{{--<script src="{{ asset('asset/frontend/js/jquery.nice-select.js') }}"></script>--}}
<!-- Template Main Javascript File -->

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('asset/frontend/js/main.js?v=1.0.0.1') }}"></script>
<script src="{{ asset('asset/frontend/js/sort.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function () {
        // $('#newsletterModal').modal('show');
        $('form.subscribeForm').each(function () {
            $(this).validate({
                submitHandler: function (_form) {
                    console.log('_form', _form);
                    const form = $(_form);
                    const subBtn = form.find('button[type=submit]');
                    subBtn.loadingButton('loading');
                    if(!form.find('input[name="agree"]').is(':checked')){
                        Swal.fire('Please agree terms and conditions', 'The given data was invalid.', 'error');
                        subBtn.loadingButton('reset');
                        return false;
                    }
                    $.ajax({
                        url: form.attr('action'),
                        type: "post",
                        data: form.serialize(),
                        dataType: "json",
                        complete: function (xhr,status) {
                            subBtn.loadingButton('reset');
                            const data = xhr.responseJSON;
                            if(status === 'error'){
                                Swal.fire(data.errors.email[0], data.message, 'error');
                            }else{
                                Swal.fire('Good job!', 'A confirmation email was sent, please verify', 'success')
                                .then(function () {
                                    $('#newsletterModal').modal('hide');
                                });
                                form.find('input[name="email"]').val('');
                            }
                            return false;
                        }
                    })
                    return false;
                }
            });
        });
    });
</script>
@yield('scripts')
</body>

</html>

