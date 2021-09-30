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
                {
                    "@type": "Question",
                    "name": "{{ $faqs->question }}",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "{{ $faqs->answer }}"
                    }
                },
                @endforeach
            ]
        }
    </script>
@endsection
@section('content')
    <section id="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-md-11 faq_content">
                    <h1>{{ $data->heading }}</h1>
                    <div class="faq-accordion">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            @foreach($faq_questions as $faqs)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab"
                                        id="heading{{ $faqs->id }}">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse"
                                                data-parent="#accordion"
                                                href="#collapse{{ $faqs->id }}"
                                                aria-expanded="false"
                                                aria-controls="collapse{{ $faqs->id }}">{{ $faqs->question }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{ $faqs->id }}"
                                        class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="heading{{ $faqs->id }}">
                                        <div class="panel-body">
                                            <p>{{ $faqs->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row popular_casino_row">
                <div class="col-md-12 mb-4">
                    <h2 class="popular-casino-card-heading">{{ @$data->popular_casinos_heading }}</h2>
                </div>
            </div>
            <div class="d-none d-lg-block d-xl-block">
                <div class="row justify-content-md-center">
                @if(!empty($casinos))  
                    @include('partials.casino-card', compact('casinos'))
                @endif    
                </div>
            </div>    
            <div class="d-block d-lg-none d-xl-none">
                <div class="row">  
                @if(!empty($casinos)) 
                    @include('partials.casino-table-mobile', compact('casinos'))
                @endif    
                </div>
            </div>
        </div>
    </section>
@endsection
