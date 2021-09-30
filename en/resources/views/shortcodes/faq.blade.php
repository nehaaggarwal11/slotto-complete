@if(!empty($faq_questions))
    <section class="faq-sec section-padding" id="team">
        <div class="container">
            @if($heading)
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="section-title-item">
                            <h2 class="section-title">{{ $heading }}</h2>
                        </div>
                    </div>
                </div><!-- row end -->
            @endif
            <div class="row mt-30">
                @if($description)
                    <div class="col-lg-12 col-md-12 wow fadeInUp"
                         data-wow-duration="1.5s"
                         style="visibility: visible; animation-duration: 1.5s; animation-name: fadeInUp;">
                        <div class="faq-detail">
                            {!! $description !!}
                        </div> <!-- Col End -->
                    </div> <!-- Row End -->
                @endif
                <div class="col-md-12">
                    <div class="faq-accordion">
                        <div class="panel-group" id="accordion" role="tablist"
                             aria-multiselectable="true">
                            @foreach($faq_questions as $faq)
                                <div class="panel panel-default" data-id="{{ $faq->id }}">
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
                </div><br>
                <a class="btn btn-primary mx-auto d-block faq-more-btn"
                   href="{{ route('frontend.faq') }}">More FAQ</a>

            </div>
        </div>
    </section> <!-- Faq section end -->
@endif
