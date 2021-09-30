@extends('layouts.frontend')

@section('title','News Page')
@section('meta_tags')
    <title>{{ $data_news->seo_title }}</title>
    <meta content="{{ $data_news->seo_keyword }}" name="keywords">
    <meta content="{{ $data_news->seo_description }}" name="description">
    <script type="application/ld+json">
    [
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "headline": "Slottomat News Article",
            "mainEntity": [
                @foreach($news  ?? [] as $all_news)
                    @if($loop->last)
                    {
                        "url": "{{ $all_news->route }}",
                        "name": "{{ $all_news->name }}"
                    }
                    @else
                    {
                        "url": "{{ $all_news->route }}",
                        "name": "{{ $all_news->name }}"
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
    <section id="news-section">
        <div id="newHeader" class="newHeader">
            <div class="game-banner-content">
               <h1>{{ $data_news->heading }}</h1><br>
               <div class="cBreadcrumb">
                    <span><a href="/">Home</a></span>
                    <span>News</span>
               </div>
            </div>
        </div>
      <div class="sectionMTMB">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-justify">
                    <div class="news-detail">
                        {!! $data_news->news_text_less !!}
                        <div id="news-more-section" style="display: none">
                            {!! $data_news->news_text_more !!}
                        </div>
                        <a class="rmore" id="news-read-more" href="javascript:void(0);">Read More</a>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <h3>See your latest casino tips below</h3>
			              <div class="softwaresearch text-center">
                        <div class="search-bar">
                          <input type="text" placeholder="Search..." id="search">
                          <div class="search"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="news-allscreen-view">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="row" id="news-ajax"></div>
                        <div class="row justify-content-center" id="news-list">
                            @foreach($news as $news)
                                <div class="col-md-4 mb-4">
                                    <div class="single-blog blog-2 mt-30">
                                        <div class="blog-image">
                                            <a href="{{ $news->route }}"><img src="{{ @$news->logo_img->url }}" alt="{{ $news->logo_img_alt_text }}"></a>
                                        </div>
                                        <div class="blog-content">
                                            <h5 class="news-blog-title"><a href="{{ $news->route }}">{{ $news->name }}</a></h5>
                                            <p class="news-short-description">{{ Str::limit($news->small_description, 80) }}</p>
                                            <a class="btn read-blog-btn mx-auto d-block splbtns purple" href="{{ $news->route }}" data-text="Read News">Read News</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row popular_casino_row">
                <div class="col-md-12 mb-4 mt-5">
                    <h2 class="popular-casino-card-heading">{{ @$data_news->popular_casinos_heading }}</h2>
                </div>
            </div>
                @include('partials.staytune', compact('casinos'))

          
        </div>
      </div>
    </section>

@endsection

@section('scripts')

<script>
    $("#search").on('keyup',function(){
        var value = $(this).val();
        $.ajax({
            type : 'post',
            url : "{{ route('frontend.all-news')}}",
            data:{
              "_token":"{{ csrf_token() }}",
                search: value
            },
            success:function(data){
                $('#news-list').hide();
                $('#news-ajax').html(data);
                $('#news-two-list').hide();
                $('#news-two-ajax').html(data);
            },

            error: function(jqXHR, textStatus, errorThrown) {
                 console.log("AJAX error: " + textStatus + ' : ' + errorThrown)
            }
        })
    });

 </script>

@endsection
