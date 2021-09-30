@extends('layouts.frontend')
@section('title','{{$page_content->title}}')
@section('meta_tags')
    <title>{{ $page_content->seo_title }}</title>
    <meta content="{{ $page_content->seo_keyword }}" name="keywords">
    <meta content="{{ $page_content->seo_description }}" name="description">
@section('schemaMarkup')
    <script type="application/ld+json">
    [
        {
            "@context": "https://schema.org",
            "@type": "ItemList",
            "name": "{{$page_content->title}}",
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
        }
    ]
    </script>
@endsection
@endsection
@section('content')
@php
    $menu = json_decode(@\App\Menu::find(1)->data);
@endphp
@section('styles')
<style>
    img{
      color: rgba(0,0,0,0);
    }
    .header-banner-in {
        background: url(/asset/frontend/img/india-page/backimg.webp) no-repeat;
        background-size: cover;
        background-position: center;
        box-shadow: inset 0px 0px 152px 53px #000;
    }
    #banner-in h1{
      text-transform: uppercase;
      text-shadow: 5px 4px 10px #160b3c;
    }
    .button-in {
        top: -61px;
        left: 10px;
    }
    .button-in a {
        background: url(/asset/frontend/img/india-page/btn-img-in.webp) no-repeat;
        background-size: contain;
        padding: 37px;
        background-position: center;
        font-size: 20px;
        font-weight: 900;
        text-transform: uppercase;
        color: #dfdfdf;
        text-shadow: -2px 2px 4px #710cb98a, 1px 1px 10px #2742e0,0px 0px 1px #ffffff80;
    }
    .key-feature-in{
      margin-top: 100px
    }
    .key-feature-in li {
        padding: 8px 21px;
        background: linear-gradient(90deg,rgba(0,24,126,0.85),rgba(79,99,187,0.85));;
        margin: 15px 0;
        font-weight: 800;
        text-shadow: -2px 2px 4px #710cb98a, 1px 1px 10px #2742e0,0px 0px 1px #ffffff80;
        font-size: 28px;
        color: #dfdfdf;
        border-radius: 10px;
        line-height: 37px;
        width: calc(100% - 30px);
    }
    .key-feature-in li::after{
        content: "";
        background: url(/asset/frontend/img/india-page/casino-chip.webp) no-repeat;
        width: 95px;
        height: 97px;
        position: absolute;
        background-size: cover;
        background-position: center;
        margin-top: -45px;
        right: 0px;
    }
    .key-feature-in li:nth-child(odd)::after{
        filter: hue-rotate(180deg)
    }

    #game-categories-in .nav li{
        cursor: pointer;
        position: relative;
        padding:0;
    }
    #game-categories-in .tab-section-in .nav li{
        padding:0 30px;
    }
    .tab-section-in .nav li h3{
        padding: 18px 0 0 0;
    }
    .tab-section-in .nav li:first-child:before{
        border-right: none;
    }
    .tab-section-in .nav li::before{
        content: "";
        border-right: 1px solid #fff;
        position: absolute;
        max-height: 100px;
        height: 100%;
        top:0;
        left: 0;
    }
    .tab-section-in .nav .nav-item.active::after {
        content: "";
        border: 10px solid #da1f15;
        position: absolute;
        transform: rotate(45deg);
        z-index: -1;
        margin-top: 7px;
    }
    .tab-section-in .active .nav-link {
        color: #da1f15;
    }
    .tab-section-in li{
      transition: 0.5s ease;
    }
    .tab-section-in li:hover img, .tab-section-in li:hover h3{
        color: #979797;
        transition: 0.5s ease-out;
        filter: grayscale(100%);
    }
    .tab-section-in .nav-link {
        font-size: 20px;
        font-weight: 900;
        font-family: Montserrat,sans-serif;
    }
    .sub-tab-section-in {
        background: #da1f15;
        display: flex;
        padding: 10px;
        border-radius: 50px;
        width: 100%;
    }
     .nav-link {
        color: #fff;
        font-weight: 700;
    }

    .all-games-in img{
        border-radius:15px
    }
    .sub-tab-section-in span{
      transition: 0.5s ease;
    }
    .sub-tab-section-in .active span, .sub-tab-section-in li:hover span{
        color: #0b004b;
        font-weight: 700;
        text-decoration: underline;
    }
    #slot-type-in{
        padding: 10px 0 50px 0;
        background: #76a1ec;
    }
    p{
        color: #fff;
    }
    .slotUl{
        padding: 0;
        margin: 0 auto;
        width: 90%;
        display: inline-block;
    }
    .slotLi {
	    width: 20%;
	    text-align: center;
	    transition: 0.5s ease;
	    margin: 0 -2px;
	    padding: 3px;
	    display: inline-block;
	   }
      .slotLi a {
      color: #fff;
      display: inline-block;
      padding: 10px 20px;
      background-color: #0b004b;
      width: 100%;
      font-size: 15px
    }
    .slotUl li.slotLi:nth-child(2n) a {
      background-color: #1977cc;
    }
    .slotUl li.slotLi:nth-child(3n) a {
      background-color: #00417d;
    }
    .slotUl li.slotLi a:hover {
      background-color: #da1f15;
    }
    .bg-img-ani img {
        position: absolute;
        opacity: 0.6;
        animation: aniIn infinite;
    }

    .bg-img-ani img:nth-child(1) {
        top: 28%;
        width: 77px;
        animation-duration: 6s;
        left: 9%;
    }
    .bg-img-ani img:nth-child(2) {
        right: 2%;
        top: 50%;
        animation-duration: 3s;
    }
    .bg-img-ani img:nth-child(3) {
        top: 50%;
        left: 50%;
        width: 92px;
        opacity: 0.3;
        animation-duration: 4.4s;
    }
    .bg-img-ani img:nth-child(4) {
        top: 86%;
        width: 56px;
        left: 65%;
        transform: rotate(-86deg);
        animation-duration: 4s;
    }
    .bg-img-ani img:nth-child(5) {
        right: 2%;
        width: 87px;
        top: 15%;
        animation-duration: 5s;
    }
    .bg-img-ani img:nth-child(6) {
        top: 83%;
        width: 100px;
        left: 3%;
        animation-duration: 3.5s;
    }
    @keyframes aniIn{
        from { transform: translateY(0) }
        50% {transform: translateY(14px) }
        to {transform: translateY(0px) }
    }

    @media only screen and (max-width: 1198px){
            #game-categories-in .tab-section-in .nav li {
              padding: 0 23px;
            }
        .tab-section-in .nav-link{
          font-size: 18px;
        }
         .key-feature-in li::after{
           margin-left: 15px;
        }
        .key-feature-in li{
            font-size: 22px;
        }

        .bg-img-ani img:nth-child(1) {
            width: 67px;
        }
        .bg-img-ani img:nth-child(3) {
            width: 82px;
        }
        .bg-img-ani img:nth-child(4) {
            top: 72%;
            width: 50px;
            left: 55%;
        }
        .bg-img-ani img:nth-child(5) {
            width: 80px;
        }
        .bg-img-ani img:nth-child(6) {
            top: 62%;
            width: 85px;
        }
        .slotLi{
          width: 25%;
        }
    }
    @media only screen and (max-width: 998px){
      #game-categories-in  .container{
          max-width: 845px;
        }
        #overSection{
            overflow-x: scroll;
            overflow-y: hidden;
        }
        .overSection{
            width:1000px;
            position: relative;
            margin: 0 10px;
          }

        .key-feature-in li {
            font-size: 15px;
            line-height: 32px;
          }
          .key-feature-in li::after {
            margin-left: -16px;
            margin-top: -40px;
            width: 85px;
            height: 86px;
          }
          .button-in{
            top: -47px;
          }
          .button-in a{
            font-size: 15px;
          }
          .bg-img-ani img:nth-child(1){
              top: 11%;
              width: 45px;
              left: 5%;
          }
          .bg-img-ani img:nth-child(2){
              top: 39%;
              width: 130px;
              opacity: 0.2;
          }
          .bg-img-ani img:nth-child(3) {
              top: 32%;
              width: 70px;
              opacity: 0.7;
              left: 43%;
            }
          .bg-img-ani img:nth-child(4){
              top: 54%;
          }
          .slotLi {
              width: 33%;
            }
          .bg-img-ani img:nth-child(6) {
            top: 54%;
            width: 85px;
          }
    }
    @media only screen and (max-width: 764px){
      #game-categories-in .col-6{
        max-width: 33%;
      }
      .key-feature-in{
          padding: 0 0 0 5%;
          margin-top: 0;
      }
      .key-feature-in li {
          font-size: 24px;
          width: 96%;
      }
       .key-feature-in li::after {
            margin-left: 26px;
            width: 84px;
            height: 84px;
            margin-top: -39px;
        }

        .bg-img-ani img:nth-child(1) {
            width: 87px;
        }
        .bg-img-ani img:nth-child(2){
            top: 94%;
            opacity: 0.4;
        }
        .bg-img-ani img:nth-child(4) {
            top: 100%;
            width: 119px;
            left: 4%;
          }
          .slotLi {
            width: 50%;
          }
  }
    @media only screen and (max-width: 460px){
      .key-feature-in li {
        font-size: 16px;
        width: 96%;
      }
      .bg-img-ani img:nth-child(4) {
        top: 68%;
        width: 106px;
        left: 67%;
      }
      .bg-img-ani img:nth-child(2) {
        top: 86%;
        opacity: 1;
        width: 68px;
        left: 2%;
      }
      .bg-img-ani img:nth-child(3) {
        top: 42%;
        width: 70px;
        opacity: 0.2;
        left: 79%;
      }
      .button-in {
        top: -40px;
      }
      .button-in a {
      font-size: 14px;
      padding: 18px;
    }
    .slotLi {
      width: 100%;
    }
    }
    @media not all and (min-resolution:.001dpcm){
      .header-banner-in{
        background:url(/asset/frontend/img/india-page/backimg.jpg) no-repeat;
      }
      .key-feature-in li::after{
        background: url(/asset/frontend/img/india-page/casino-chip.png) no-repeat;
      }
      .button-in a {
          background: url(/asset/frontend/img/india-page/btn-img-in.png) no-repeat;
        }
    }
</style>
@endsection
<div class="bg-img-ani">
    <img alt="coin-1 online slot india" src="{{asset('/asset/frontend/img/india-page/c-n-c/coin-1.png')}}">
    <img alt="coin-2 online slot india" src="{{asset('/asset/frontend/img/india-page/c-n-c/coin-2.png')}}">
    <img alt="coin-3 online slot india" src="{{asset('/asset/frontend/img/india-page/c-n-c/coin-3.png')}}">
    <img alt="chip-1 online slot india" src="{{asset('/asset/frontend/img/india-page/c-n-c/chip-1.png')}}">
    <img alt="chip-2 online slot india" src="{{asset('/asset/frontend/img/india-page/c-n-c/chip-2.png')}}">
    <img alt="chip-3 online slot india" src="{{asset('/asset/frontend/img/india-page/c-n-c/chip-3.png')}}">
</div>
<div id="india-page-body">
  @php($bg_image = \App\StaticPage::getMediaField('india', 'bg_image'))
    @php($main_image = \App\StaticPage::getMediaField('india', 'main_image'))
    <section id="banner-in" class="header-banner-in pt-4 pb-4" style="background:url('{{ $bg_image->url }}') no-repeat; background-size: cover; background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="banner-img-in">
                        <img class="img-fluid" alt="play 350 online slot Games image" width="540" height="557" src="{{$main_image->url}}">
                    </div>
                    <div class="button-in position-relative">
                        <a href="{{$page_content->btn_link}}" data-title="Play Free Slots">Play Free Slots</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="key-feature-in pt-1">
                        <span class="mb-4">
                          <h1 class="d-none">Best Online Casino<br /> in India</h1>
                          <img class="img-fluid" width="639" height="173" alt="Best Online Casino in India" src="{{asset('/asset/frontend/img/india-page/top-heading.webp')}}">
                        </span>
                        @if(!empty($page_content->main_headings))
                           @foreach ($page_content->main_headings as $key=>$item)
                               @if(!empty($item))
                               <li>{{$item}}</li>
                               @endif
                           @endforeach
                       @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="game-categories-in" class="pt-4 pb-5">
        <div class="container">
            <div id="overSection">
                <div class="row overSection">
                    <div class="tab-section-in mx-auto mt-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item text-center active" data-id="all-games"  data-sub='[{"id":-2,"name":"New Games","status":"active"},{"id":1,"name":"Popular Games"},{"id":7,"name":"Top Rated Games"}]'>
                                <img class="img-fluid" width="120" height="85" src="{{asset('/asset/frontend/img/india-page/icon1.png')}}">
                                <h3 class="nav-link">Hot Games</h3>
                            </li>
                            <li class="nav-item text-center" data-id="slots"  data-sub='[{"id":4,"name":"Jackpot","status":"active"},{"id":6,"name":"Fruit Slots"}]'>
                                <img class="img-fluid" width="120" height="85" src="{{asset('/asset/frontend/img/india-page/icon2.png')}}">
                                <h3 class="nav-link" >Slots & jackpots</h3>
                            </li>
                            <li class="nav-item text-center" data-id="volatilitet_game" data-sub='[{"id":1,"name":"Low","status":"active"},{"id":2,"name":"Medium"},{"id":3,"name":"High"}]'>
                                <img class="img-fluid" width="120" height="85" src="{{asset('/asset/frontend/img/india-page/icon3.png')}}">
                                <h3 class="nav-link">Game Volatility</h3>
                            </li>
                            <li class="nav-item text-center" data-id="game_category" data-sub='{{ $game_cate }}'>
                                <img class="img-fluid" width="120" height="85" src="{{asset('/asset/frontend/img/india-page/icon4.png')}}">
                                <h3 class="nav-link" >Game Categories</h3>
                            </li>
                            <li class="nav-item text-center" data-id="provider" data-sub='{{ $software }}'>
                                <img class="img-fluid" width="120" height="85" src="{{asset('/asset/frontend/img/india-page/icon5.png')}}">
                                <h3 class="nav-link" >Game Provider</h3>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row overSection">
                    <div class="sub-tab-section-in mx-auto mt-3 justify-content-center">
                        <ul class="nav nav-pills justify-content-center">
                            @if(empty($provider))
                                <li class="nav-item text-center sub active"  id="-2" data-id="5">
                                    <span class="nav-link">New Games</span>
                                </li>
                                <li class="nav-item text-center sub" id="1" data-id="1" >
                                    <span class="nav-link">Popular Games</span>
                                </li>
                                <li class="nav-item text-center sub" id="7" data-id="7" >
                                    <span class="nav-link">Top Rated Games</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div id="all-game-in">
              <div class="row mt-5 justify-content-center">
                @foreach($games as $game)
                <div class="col-6 col-md-2 mb-4">
                    <div class="content">
                        <a href="{{ $game->route }}">
                            @if($game)
                                <img class="content-image img-fluid"
                                    src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}"
                                    alt="{{ $game->logo_alt_text }}"
                                    width="160" height="160"
                                    loading="lazy"
                                    >
                            @endif
                            <div class="content-details fadeIn-top">
                            <span class="gameh5Span">Play {{ $game->name }} demo</span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
          </div>
          <div id="ajax-all-game-in" class="row mt-5 justify-content-center" style="display:none"></div>
        </div>
    </section>
    <section id="slot-type-in" class="pt-4">
        <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                    <h2 style="color:#0b004b">Slots Types</h2>
                    <ul class="slotUl">
                        @foreach ($menu as $item)
                            @if($item->text == "Slots Types")
                                @foreach ($item->children as $child)
                                       <li class="slotLi"><a href="{{$child->href}}">{{$child->text}}</a></li>
                                @endforeach
                            @endif
                        @endforeach
                    </ul>
               </div>
            </div>
        </div>
    </section>
    <section id="fruit-slot-in" class="pt-4 pb-5">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                 <h2 class="text-center">{{$page_content->text_area_head}}</h2>
                 {!! $page_content->text_area !!}
            </div>
        </div>
    </section>
</div>

<script>

     $(document).ready(function(){
          var brow = navigator.userAgent;
          if(brow.includes('Safari') == true){
            $.each($('img'),function(){
               if($(this).attr('src').includes('webp')){
                 var src = $(this).attr('src').replace('webp','png');
                 $(this).attr('src',src);
               }
            })
          }
          $.ajaxGame = function(){
            $('#game-categories-in li').click(function(){
                var g = $(this);
                var subarr = [];
                var did = g.attr('data-id');
                var id = g.attr('id');
                var title = $('.tab-section-in .active').attr('data-id');
                if(g.hasClass('sub')){
                        var sid = id;
                        var type = "sub";
                    }
                    else{
                        var type= "main";
                    }
                if(!g.hasClass('active')){
                    g.siblings().removeClass('active');
                    g.addClass('active');
                    if(g.attr('data-sub') != undefined)
                    {
                            var submenu = g.attr('data-sub');
                            var sObj =   JSON.parse((submenu).replaceAll('title','name'));
                            $.each(sObj,function(key,value){
                                //console.log(value);
                                subarr.push("<li class='nav-item text-center sub' id='"+value.id+"' data-id='"+(value.name).replaceAll("'","&apos;")+"' ><span class='nav-link'>"+value.name+"</span></li>");
                            });
                            $('.sub-tab-section-in ul').html(subarr);
                            $('.sub:first').addClass('active');
                    }
                     $.ajax({
                            url:"{{ route('frontend.india.ajax') }}",
                            type:"post",
                            data:{
                                "_token": "{{ csrf_token() }}",
                                data:did,
                                id:sid,
                                type:type,
                                actChild:$('.sub:first').attr('id'),
                                actChildData:$('.sub:first').attr('data-id'),
                                title:title
                            },
                            success:function(data){
                            // console.log(data);
                                $('#all-game-in').hide();
                                $('#ajax-all-game-in').show().html(data);
                                $('#'+sid).addClass('active');
                                    $.ajaxGame();
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown)
                            }
                    });
                }
            });
        }
        $.ajaxGame();
     });
</script>
@endsection
