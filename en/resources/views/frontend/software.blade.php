@extends('layouts.frontend')

@section('meta_tags')
    <title>{{ @$data->seo_title }}</title>
    <meta content="{{ @$data->seo_keyword }}" name="keywords">
    <meta content="{{ @$data->seo_description }}" name="description">
@endsection
@section('content')
    <section id="games-new-section">
        @php($bg_image = \App\StaticPage::getMediaField('software', 'bg_image'))
        <div class="game-top-banner" style="background: url('{{ @$bg_image->url }}') no-repeat center center / cover;" aria-label="{{ @$data->bg_image_alt_text }}">
            <div class="game-banner-content position-absolute">
                <h1>{{ @$data->bg_image_heading }}</h1>
                <p>{{ @$data->bg_image_text }} </p>
            </div>
        </div>

        <div class="games-section-content">
            <div class="container-fluid">
                <div class="row mt-30 mb-60">
                    <div class="offset-md-3 col-md-3">
                        <div class="top-widget space50">
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
                    <div class="col-md-8 offset-md-2">
                        <div class="row" id="software_ajax"></div>
                        <div class="row" id="software_list">
                         @foreach($softwares as $software)
                            <div class="col-6 col-md-3 mb-4" data-id="{{ $software->id }}">
                                <div class="content" style="background-color:{{ $software->bg_color}}">
                                    <a href="{{ $software->route }}">
                                        @if($software->logo)
                                        <img class="content-image"
                                            src="{{ $software->logo->getUrl('thumb') }}" alt="{{ $software->logo_alt_text }}">
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
                <!-- <div class="row software-content">
                    <div class="col-md-12 mt-4">
                        <p class="software-description">{!! @$data->content !!}</p>
                    </div>
                </div> -->
            </div>
            <div class="container">
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

            <div class="container-fluid">
                <div class="row software-content">
                    <div class="col-md-10 offset-md-1 mt-4">
                        <h2>{{ @$data->software_heading }}</h2>
                        <p class="software-description">{!! @$data->software_description !!}</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-8 mx-auto">
                        <div class="section-title-item">
                            <h2 class="section-title">{{ @$data->faq_heading }}</h2>
                        </div>
                    </div>
                </div><!-- row end -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="faq-accordion">
                            <div class="panel-group" id="accordion" role="tablist"
                                aria-multiselectable="true">
                                @foreach($faq_questions ?? [] as $faq)
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab"
                                        id="heading{{ $faq->id }}">
                                        <h4 class="panel-title">
                                            <a class="collapsed"
                                            data-toggle="collapse"
                                            data-parent="#accordion"
                                            href="#collapse{{ $faq->id }}"
                                            aria-expanded="false"
                                            aria-controls="collapse{{ $faq->id }}">{{ $faq->question }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse{{ $faq->id }}"
                                        class="panel-collapse collapse"
                                        role="tabpanel"
                                        aria-labelledby="heading{{ $faq->id }}">
                                        <div class="panel-body">
                                            <p>{{ $faq->answer }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
            type : 'get',
            url : "{{ route('frontend.software.search') }}",
            data:{
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
