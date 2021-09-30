@extends('layouts.frontend')

@section('title','FAQ Page')
@section('meta_tags')
    <title>{{ @$data->seo_title }}</title>
    <meta content="{{ @$data->seo_keyword }}" name="keywords">
    <meta content="{{ @$data->seo_description }}" name="description">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                @foreach($faq_questions as $faqs)
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
@section('content')
    <section id="faq-section" class="sectionMTMB">
        <div class="container">
          <h1>{{$data->heading}}</h1>
          <div class="col-md-12 text-center">
              <div class="top-widget space50 softwaresearch">
                  <form method="post">
                      <div class="search-bar">
                          <input type="text" placeholder="Search..." id="search">
                          <div class="search"></div>
                      </div>
                  </form>
              </div>
          </div>
          <div id="faq_list">
                @php
                  $faq_head = "";
                @endphp
              @include('partials.faq',compact('faq_head','faq_questions'))
          </div>
        </div>
          <div id="faq_ajax"></div>
        <h2 class="popular-casino-card-heading mt-5">{{ @$data->popular_casinos_heading }}</h2>
        @if(!empty($casinos))
          @include('partials.staytune', compact('casinos'))
        @endif
    </section>
@endsection
@section('scripts')

<script>
    $("#search").on('keyup',function(){
        var value = $(this).val();
        $.ajax({
            type : 'POST',
            url : "{{ route('frontend.faq')}}",
            data:{
              "_token": "{{ csrf_token() }}",
                search: value
            },
            success:function(data){
              //console.log(data);
                $('#faq_list').hide();
                $('#faq_ajax').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                 console.log("AJAX error: " + textStatus + ' : ' + errorThrown)
            }
        })
    });
 </script>

@endsection
