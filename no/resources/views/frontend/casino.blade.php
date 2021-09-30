@extends('layouts.frontend')

@section('title','Review Page')
@section('meta_tags')
    <title>{{ $casino->seo_title }}</title>
    <meta content="{{ $casino->seo_keyword }}" name="keywords">
    <meta content="{{ $casino->seo_description }}" name="description">
    <script type="application/ld+json">
    [
        {
            "@context": "https://schema.org/",
            "@type": ["ArchiveComponent"],
            "image": "{{ @$casino->logo_image->url }}",
            "name": "{{ $casino->name }}",
            "url": "{{ $casino->route }}"
        },

        {
            "@context":"https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                @foreach($faq_questions ?? [] as $faqs)
                    @if($loop->last)
                        {
                            "@type": "Question",
                            "name": "{{ $faqs->question }}",
                            "acceptedAnswer": {
                                "@type": "Answer",
                                "text": "{{ $faqs->question }}"
                            }
                        }
                    @else
                        {
                            "@type": "Question",
                            "name": "{{ $faqs->question }}",
                            "acceptedAnswer": {
                                "@type": "Answer",
                                "text": "{{ $faqs->answer }}"
                            }
                        },
                    @endif
                @endforeach

            ]
        }
    ]
    </script>
@endsection
@section('content')
    <section id="review-section" class="sectionMTMB">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 mb-30 ">
                    <div class="top-banner" style="background-color: {{ @$casino->bg_image_color }};">
                        <div class="casino-content p-4 pl-5">
                            <h1 class="text-md-left">{{ $casino->name }}</h1>
                            <div class="casino-rating">
                                <div class="casino-star-rating">
                                    @if($casino->rating)
                                        <p>
                                            @for($i = 0; $i < $casino->rating; $i++)
                                                <span class="fa fa-star text-orange"></span>
                                            @endfor
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="casino-bonus">
                                <i class="fa fa-2x fa-gift" aria-hidden="true"></i>
                                <span class="bonus-amount">{{ $casino->banner_info }}</span>

                            </div>
                            <div class="review-casino-btn">
                                <button class="btn btn-primary play-btn d-block casino-modal-link" data-img="{{@$casino->featured_image->url}}" data-name="{{$casino->name}}" data-toggle="modal" data-target="#casinoSingleModal">Play Now</button>
                            </div>
                        </div>
                        <div class="casino-logo position-absolute">
                        <img src="{{ @$casino->featured_image->url }}" alt="{{ @$casino->featured_image_alt_text }}">
                        </div>
                    </div>

                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-overview"><i class="fa fa-eye" aria-hidden="true"></i> Overview</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-details"><i class="fa fa-bars" aria-hidden="true"></i> Details</a>
                    </div>

                    <div class="tab-content" id="nav-tab-review-content">
                        <div class="tab-pane fade show active casinoSinlgeBg" id="nav-overview" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="casino-review-tab">
                                <h2 class="heading"> Casino Review</h2>
                                {!! $casino->overview !!}
                            </div>
                        </div>

                        <div class="tab-pane fade show casinoSinlgeBg" id="nav-details" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="detail-review-tab casino-review-tab">
                                <h2 class="heading"> Details</h2>
                                {!! $casino->detail !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(!empty($casino->popular_casino_heading))
            <div class="row popular_casino_row">
                <div class="col-md-12">
                    <h2 class="popular-casino-card-heading">{{ @$casino->popular_casino_heading }}</h2>
                </div>
            </div>
            @endif
              @if(!empty($popular_casino))
              @php
                $casinos = $popular_casino;
              @endphp
                  @include('partials.staytune', compact('casinos'))
              @endif
          @if(!empty($games))
            @if(sizeof($games)>0)
            <div class="row mt-30">
                <div class="col-md-12 mx-auto">
                    <h2 class="popular-casino-card-heading">{{ @$casino->games_heading }}</h2>
                    <div class="row justify-content-center">
                        @foreach($games ?? [] as $game)
                        <div class="col-6 col-md-2 mb-4 game-content">
                            <div class="content">
                                <a href="{{ $game->route }}">
                                    <div class="content-overlay"></div>
                                    <img class="content-image"
                                        src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{$game->logo_alt_text}}">
                                    <div class="content-details fadeIn-top">
                                    <span class="gameh5Span">Play {{ $game->name }} demo</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
          @endif

            @php
              $faq_head = $casino->faq_heading;
            @endphp

            @include('partials.faq',compact('faq_head','faq_questions'))
        </div>
    </section>

<script>
  $(document).ready(function(){
    var jImgCasinoUrl = "{{ @$casino->featured_image->getUrl('thumb') }}",
     jImgCasinoAlt = "{{ $casino->featured_image_alt_text }}",
     jCasinoName = "{{ $casino->name }}",
     jCasinoLink = "{{$casino->link}}";
    singlePop(jImgCasinoUrl,jImgCasinoAlt,jCasinoName,jCasinoLink);
  });
</script>
@endsection
