

@extends('layouts.frontend')
@section('title','Software Games')
@section('meta_tags')
    <title>{{ $software->seo_title }}</title>
    <meta content="{{ $software->seo_keyword }}" name="keywords">
    <meta content="{{ $software->seo_description }}" name="description">
    <meta property="og:site_name" content="Slottomat" />
    <meta property="og:url" content="{{$software->route}}" />
    <meta property="og:title" content="{{ $software->seo_title }}" />
    <meta property="og:description" content="{{$software->seo_description}}" />
    <meta property="og:image" content="{{ asset($software->bg_image_logo->url??"")  }}" />
    <meta property="bt:type" content="GameReview" />
    <meta name="date" content="{{$software->created_at}}" />
    <meta property="og:article:modified_time" content="{{$software->updated_at}}" />
    @section('schemaMarkup')
    <script type="application/ld+json">
    {
    	    "@context":"https://schema.org",
    	    "@type": "ItemList",
    	    "name":"Games",
    	    "description":"We’re here to show you how to play free slots, how to get the most out of them, and how to do it safely. Play free demo slots online!",
    	    "url":"https://www.slottomat.com/free-slots",
              	"itemListElement": [
                    @foreach($all_slots ?? [] as $key=>$all_slot)
                    @if($loop->last)
                    {
                      "type": "ListItem",
                      "position":"{{ ++$key }}",
                      "name": "{{$all_slot->name}}",
                        @if(!empty($all_slot->logo->url))
                          "url": "{{asset('/slot/'.$all_slot->slug) }}",
                          "image": "{{asset($all_slot->logo->url)}}"
                        @else
                          "url": "{{asset('/slot/'.$all_slot->slug) }}"
                        @endif
                      }
                    @else
                    {
                      "type": "ListItem",
                      "position":"{{ ++$key }}",
                      "name": "{{$all_slot->name}}",
                        @if(!empty($all_slot->logo->url))
                          "url": "{{asset('/slot/'.$all_slot->slug) }}",
                          "image": "{{asset($all_slot->logo->url)}}"
                        @else
                          "url": "{{asset('/slot/'.$all_slot->slug) }}"
                        @endif
                      },
                    @endif

                    @endforeach
        			]
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

    </script>
    @endsection
@endsection
@section('content')
<section id="single-game-section">
      <div id="newHeader"  class="newHeader">
         <img loading="lazy" class="software-bg-logo" style="background-color: {{ @$software->bg_image_color}}" src="{{ @$software->bg_image_logo->url }}" alt="{{ @$software->bg_image_logo_alt_text }}">
         <h1>{{ @$software->bg_image_text }}</h1><br>
         <div class="cBreadcrumb">
              <span><a href="/">Home</a></span>
              <span><a href="/software">Software</a></span>
              <span>{{ $software->bg_image_text }}</span>
         </div>
      </div>

    <div class="software-content sectionPTPB">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="sectionhead">{{ $software->heading }}</h2>
                    <p class="software-description">{!! $software->description !!}</p>
                </div>
            </div>


            <div class="row popular_casino_row">
                <div class="col-md-12 mb-4">
                    <h2 class="sectionhead">{{ $software->popular_casino_heading }}</h2>
                </div>
            </div>
            @include('partials.staytune', compact('casinos'))
          @if(!empty($software->new_slots_heading))
            <div class="row mt-30">
                <div class="col-md-12">
                    <h2 class="sectionhead">{{ $software->new_slots_heading }}</h2>
                    <div class="row justify-content-center">
                        @foreach($new_slots ?? [] as $new_slot)
                        <div class="col-6 col-md-2 mb-4 game-content">
                            <div class="content">
                                <a href="{{ $new_slot->route }}">
                                    <img loading="lazy" class="content-image"
                                        src="{{ $new_slot->logo ? $new_slot->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{$new_slot->logo_alt_text}}">
                                    <div class="content-details fadeIn-top">
                                        <span class="gameh5Span">Play {{ $new_slot->name }} demo</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
          @endif
          @if(!empty($software->popular_slots_heading))
            <div class="row mt-30">
                <div class="col-md-12">
                    <h2 class="sectionhead">{{ $software->popular_slots_heading }}</h2>
                    <div class="row justify-content-center">
                        @foreach($popular_slots ?? [] as $popular_slot)
                        <div class="col-6 col-md-2 mb-4 game-content">
                            <div class="content">
                                <a href="{{ $popular_slot->route }}">
                                    <img loading="lazy" class="content-image"
                                        src="{{ @$popular_slot->logo ? @$popular_slot->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{@$popular_slot->logo_alt_text}}">
                                    <div class="content-details fadeIn-top">
                                          <span class="gameh5Span">Play {{ $popular_slot->name }} demo</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
            <div id="gameNewContainer" class="container px-0 text-center">
            @endif
            @if(!empty($software->all_slots_heading))
            @if(!empty($all_slots))
            <div class="row mt-30">
                <div class="col-md-12 text-center">
                    <h2 class="sectionhead">{{ $software->all_slots_heading }}</h2>
                      <div id="gameNewSection" class="row justify-content-center">
                         <div class="col-md-12 gameHeader">
                             <ul class="text-center mb-0">
                                 <li class="invisible">Game Image</li>
                                 <li>RTP <span>(Return To Player)</span></li>
                                 <li>Layout</li>
                                 <li>Paylines</li>
                                 <li>Max win</li>
                                 <li>Volatility</li>
                                 <li>Min Stake</li>
                                 <li>Max Bet</li>
                                 <li>Actions</li>
                             </ul>
                         </div>
                         <div class="scrlable">

                         @foreach($all_slots ?? [] as $all_slot)
                         <div class="gameContent">
                             <ul>
                             <span>
                                 <li class="imgLi"><img width="96" height="96" loading="lazy" src="{{  $all_slot->logo ? $all_slot->logo->url : asset('asset/frontend/img/logo/game.png') }}" width="100%" alt="{{ $all_slot->logo_alt_text}}">
                                    <div>
                                      {{$all_slot->name}}
                                    </div>
                                 </li>
                              </span>
                              <span id="subgameContent">
                                 <li class="gm_rtp" data-type="RTP: "><span>{{$all_slot->rtp_game}}</span></li>
                                 <li class="gm_layout " data-type="LAYOUT: "><span>{{$all_slot->layout}}</span></li>
                                 <li class="gm_pay" data-type="PAYLINES: "><span>{{$all_slot->gevinstlinjer}}</span></li>
                                 <li class="gm_win" data-type="MAX WIN: "><span>{{$all_slot->maks_mynt_gevinst}}</span></li>
                                 <li class="gm_volatile" data-type="MIN STAKE: "><span>{{$all_slot->volatilitet_game}}</span></li>
                                 <li class="gm_stake" data-type="VOLATILITY: "><span>{{$all_slot->min_innsats}}</span></li>
                                 <li class="gm_bet" data-type="MAX BET: "><span>{{$all_slot->maks_innsats}}</span></li>
                                 <li><a class="splbtns" href="{{'/slot/'.$all_slot->slug}}" data-text="demo play"></a></li>
                              </span>
                             </ul>
                         </div>
                         @endforeach
                         </div>
                     </div>

                </div>
            </div>
            @endif
            @endif
            </div>
            <div class="container">
            <div class="row">
                <div class="col-md-12 mt-4 html-content">
                    {!! $software->content !!}
                </div>
            </div>
            @php
              $faq_head = $software->faq_heading;
            @endphp
            @include('partials.faq',compact('faq_head','faq_questions'))



            {{--@if($software->content && is_object($content = json_decode($software->content)))
            @foreach($content as $ckey => $row)
            <div class="row">
                <div class="col-md-12 mt-4">
                    <h2 class="mb-3">{{ @$row->heading}}</h2>
                    <p class="software-description">{!! @$row->description !!}</p>
                </div>
            </div>
            @endforeach
            @endif--}}
        </div>
    </div>
</section>
@endsection
