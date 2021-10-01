@extends('layouts.frontend')

@section('meta_tags')

    <title>{{ @$data->seo_title }}</title>
    <meta content="{{ @$data->seo_keyword }}" name="keywords">
    <meta content="{{ @$data->seo_description }}" name="description">
    <script type="application/ld+json">
    [
        {
            "@context": "https://schema.org",
            "@type": "ItemList",
            "name": "Softwares",
            "itemListElement":[
                @foreach($softwares as $key=>$software)
                    @if($loop->last)
                    {
                        "@type":"ListItem",
                        "position":"{{ ++$key }}",
                        "url":"{{ $software->route }}",
                        "name": "{{ $software->title }}"
                    }
                    @else
                    {
                        "@type":"ListItem",
                        "position":"{{ ++$key }}",
                        "url":"{{ $software->route }}",
                        "name": "{{ $software->title }}"
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
    ]
    </script>
@endsection
@section('content')
@php
  $faq_head = @$data->faq_heading;
@endphp
    <section id="games-new-section">
        @php($bg_image = \App\StaticPage::getMediaField('software', 'bg_image'))
        <div id="newHeader" class="newHeader" style="background: url('{{ @$bg_image->url }}') no-repeat center center / cover;" aria-label="{{ @$data->bg_image_alt_text }}">
            <div class="game-banner-content">
                <h1>{{ @$data->bg_image_heading }}</h1><br>
                <div class="cBreadcrumb">
                     <span><a href="/">Home</a></span>
                     <span>Softwares</span>
                </div>
            </div>
        </div>

        <div class="games-section-content sectionPTPB">
            <div class="container">
            <p>{{ @$data->bg_image_text }} </p>
                <div class="row mt-30 mb-60">
                    <div class="col-md-12 text-center">
                        <div class="top-widget space50 softwaresearch">
                            <form>
                                <div class="search-bar">
                                    <input type="text" placeholder="Search..." id="search">
                                    <div class="search"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-30 software-row">
                    <div class="col-md-12 text-center">
                        <div class="row softwareCard" id="software_ajax"></div>
                        <div class="row softwareCard" id="software_list">
                         @foreach($softwares as $software)
                            <div class="col-6 col-md-3 mb-4" data-id="{{ $software->id }}">
                                <div class="content">
                                    <a href="{{ @$software->route }}">
                                        @if(@$software->logo)
                                        <img class="content-image obFit"
                                            src="{{ @$software->logo->getUrl('thumb') }}" alt="{{ @$software->logo_alt_text }}">
                                        @endif
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="col-md-3 game-popular-casino">
                        @include('partials.popular-casino-widget')
                    </div> --}}
                </div>
            </div>
            <div class="container">
                <div class="row popular_casino_row software">
                    <div class="col-md-12 mb-4">
                        <h2 class="popular-casino-card-heading">{{ @$data->popular_casinos_heading }}</h2>
                    </div>
                </div>
                  @include('partials.staytune', compact('casinos'))
            </div>

            <div class="container-fluid">
                <div class="row software-content">
                    <div class="col-md-10 offset-md-1 mt-4">
                    @if(!empty(@$data->software_heading))
                      <h2>{{ @$data->software_heading }}</h2>
                    @endif
                      <p class="software-description">{!! @$data->software_description !!}</p>
                    </div>
                </div>

                <div class="col-md-10 offset-md-1">
                  {{-- @include('partials.faq',compact('faq_head','faq_questions')); --}}
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')

<script>
    $("#search").on('keyup',function(){
        var value = $(this).val();
        $.ajax({
            type : 'POST',
            url : "{{ route('frontend.software') }}",
            data:{
                "_token": "{{csrf_token()}}",
                search: value,
            },
            success:function(data){
                $('#software_list').hide();
                $('#software_ajax').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                 console.log("AJAX error: " + textStatus + ' : ' + errorThrown)
            }
        })
    });
 </script>

@endsection
