@extends('layouts.frontend')

@section('title','Sitemap')
@section('meta_tags')
    <title>{{ @$sitemap->seo_title }}</title>
    <meta content="{{ @$sitemap->seo_keyword }}" name="keywords">
    <meta content="{{ @$sitemap->seo_description }}" name="description">

@endsection
@section('content')

<section id="site-map-section" class="sectionMTMB">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="section-title-item">
                    <h1 class="section-title">{{ $sitemap->heading }}</h1>
                </div>
            </div>
        </div>
        <div class="row mt-4 justify-content-between">
          <div class="col-12">

			<div id="sitmdiv1">
              <h4 class="sphead text-left active"><a href="javascript:void(0)" >Pages</a> <i class="fas fa-minus"></i></h4>
              <ul class="sitmul" style="display: inline-block">
              	<li><a href="{{ route('frontend.best-casinos-in-india') }}" target="_blank">Online Casinos in India</a></li>
              	<li><a href="{{ route('frontend.page.about-us') }}" target="_blank">About Us</a></li>
              	@foreach($layout_pages as $page)
                  <li><a href="{{ $page->route }}" target="_blank">{{ $page->title }}</a></li>
                  @endforeach
              	<li><a href="{{ route('frontend.faq')}}" target="_blank">FAQ</a></li>
              	<li><a href="{{ route('frontend.page.responsible-gaming')}}" target="_blank">Responsible Gaming</a></li>
              	<li><a href="{{ route('frontend.page.privacy-policy')}}" target="_blank">Privacy Policy</a></li>
              	<li><a href="{{ route('frontend.page.terms')}}" target="_blank">Terms & Condition</a></li>
              	<li><a href="{{ route('frontend.page.cookies')}}" target="_blank">Cookies</a></li>
              </ul>
			</div>
			<div id="sitmdiv2">
                <h4 class="sphead text-left"><a href="{{route('frontend.software')}}" target="_blank">Softwares</a> <i class="fas fa-plus"></i></h4>
                <ul class="sitmul">
                @foreach($softwares as $software)
                    <li><a href="{{ $software->route }}" target="_blank">{{ $software->title }}</a></li>
                @endforeach
                </ul>
			</div>
			<div id="sitmdiv3">
                <h4 class="sphead text-left"><a href="{{route('frontend.casino-bonus')}}" target="_blank">Free Spins </a> <i class="fas fa-plus"></i></h4>
                <ul class="sitmul">
                @foreach($casinos as $casino)
                    <li><a href="{{ $casino->route }}" target="_blank">{{ $casino->name }}</a></li>
                @endforeach
                </ul>
			</div>
			<div id="sitmdiv4">
                <h4 class="sphead text-left"><a href="{{route('frontend.all-news')}}" target="_blank">News</a> <i class="fas fa-plus"></i></h4>
                <ul class="sitmul">
                @foreach($news as $new)
                    <li><a href="{{ $new->route }}" target="_blank">{{ $new->name }}</a></li>
                @endforeach
                </ul>
			</div>
			<div id="sitmdiv5">
                <h4 class="sphead text-left"><a href="{{route('frontend.all-games')}}" target="_blank">Free Slots</a> <i class="fas fa-plus"></i></h4>
                <ul class="sitmul">
                @foreach($games as $game)
                    <li><a href="{{ $game->route }}" target="_blank">{{ $game->name }}</a></li>
                @endforeach
                </ul>
			</div>

            </div>


        </div>
    </div>
</section>

<script>
  $(document).ready(function(){
        $('.sphead').click(function(){
          if($(this).hasClass('active')){}
          else{
              $('.sphead').removeClass('active');
              $('.sitmul').slideUp();
              $('.sphead i').removeClass('fa-minus').addClass('fa-plus');
              $(this).addClass('active');
              $(this).children('i').removeClass('fa-plus').addClass('fa-minus');
              $(this).siblings('.sitmul').slideDown();
          }
      });
  });
</script>
@endsection
