<script type="application/ld+json">
    {
        "@context":"https://schema.org",
        "@type":"ItemList",
        "itemListElement":[
            @foreach($casinos as $casino_num => $casino)
                @if($loop->last)
                {
                    "@type":"ListItem",
                    "position":{{ $casino->id }},
                    "image": "{{ @$casino->transparent_logo_image->url }}",
                    "url":"{{ $casino->link }}"
                }
                @else
                {
                    "@type":"ListItem",
                    "position":{{ $casino->id }},
                    "image": "{{ @$casino->transparent_logo_image->url }}",
                    "url":"{{ $casino->link }}"
                },
                @endif
            @endforeach
        ]
    }
</script>
@if(!empty($casinos))
        <div class="row justify-content-md-center">
          @foreach($casinos as $cas => $casino)
              @if($cas<=8)
                  <div class="col-md-4 col-lg-3 mb-5 casino-cards">
                      <div class="casino-card" style="background-image: url('{{ asset($casino->bg_color)}}')">
                          <div class="casino-card-content">
                          @if($casino->featured_image)
                          <a href="#casinoModal" data-toggle="modal" data-id="{{ $casino->id }}" data-name="{{str_replace('-',' ',$casino->slug)}}" data-img="{{ $casino->featured_image->url }}" data-img-alt-text = "{{ $casino->featured_image_alt_text }}" data-link="{{ $casino->link }}" class="casino-modal-link">
                              <img src="{{ $casino->featured_image->url}}" alt="{{ $casino->featured_image_alt_text }}">
                          </a>
                          @endif
                          <a href="#casinoModal" data-toggle="modal" data-id="{{ $casino->id }}" data-name="{{str_replace('-',' ',$casino->slug)}}" data-img="{{ $casino->featured_image->url }}" data-img-alt-text = "{{ $casino->featured_image_alt_text }}" data-link="{{ $casino->link }}" class="casino-modal-link">
                              <div class="casino-card-detail">
                                  <span>Welcome Bonus</span>
                                  {{ $casino->bonus_text }}
                              </div>
                          </a>
                          </div>

                          <div class="casino-card-footer">
                              <div class="age">18+</div>
                              <div class="casino-read-review">
                                  <a href="{{ $casino->route }}" class="read-review-btn">Read Review</a>
                              </div>
                              <div class="condition tooltip">T&C's
                                  <div class="tooltiptext">
                                  <span class="Casinoh5Span">T&C's Apply</span>
                                  <p>{{ $casino->info }}</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="casino-play-content text-center">
                        <a href="#casinoModal" data-toggle="modal" data-id="{{ $casino->id }}" data-name="{{str_replace('-',' ',$casino->slug)}}" data-img="{{ $casino->featured_image->url }}" data-img-alt-text = "{{ $casino->featured_image_alt_text }}" data-link="{{ $casino->link }}" class="play-now-btn casino-modal-link">Play Now</a>
                      </div>
                  </div>
              @endif
          @endforeach
      </div>
@endif
