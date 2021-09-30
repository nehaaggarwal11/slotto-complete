  @if(!empty($faq_head))
    <div class="row mt-4">
        <div class="col-lg-8 mx-auto">
            <div class="section-title-item">
            <span class="section-title faqh2title" >{{ $faq_head }}</span>
            </div>
        </div>
    </div><!-- row end -->
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="faq-accordion">
                <div class="panel-group" id="accordion" role="tablist"
                    aria-multiselectable="true">
                    @foreach($faq_questions ?? [] as $faq)
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab"
                            id="heading{{ $faq->id }}">
                            <span class="panel-title">
                                <a class="collapsed"
                                data-toggle="collapse"
                                data-parent="#accordion"
                                href="#collapse{{ $faq->id }}"
                                aria-expanded="false"
                                aria-controls="collapse{{ $faq->id }}">{{ $faq->question }}
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                            </span>
                        </div>
                        <div id="collapse{{ $faq->id }}"
                            class="panel-collapse collapse"
                            role="tabpanel"
                            aria-labelledby="heading{{ $faq->id }}">
                            <div class="panel-body">
                                <p>{!! $faq->answer !!}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
