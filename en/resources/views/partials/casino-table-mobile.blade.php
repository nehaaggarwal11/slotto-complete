@foreach($casinos as $cas => $casino)
    <div class="col-md-6 mb-4">
        <div class="casino-card" style="background-color:{{ $casino->bg_color}}">
            <div class="casino-card-content">
            @if($casino->featured_image)
            <a href="{{ $casino->link }}" target="_blank">
                <img src="{{ $casino->featured_image->getUrl('thumb') }}" alt="{{ $casino->featured_image_alt_text }}">
            </a>
            @endif
            <a href="{{ $casino->link }}" target="_blank">
                <div class="casino-card-detail">
                    <span>Welcome Bonus</span>
                    {{ $casino->bonus_text }}
                </div>
            </a>
            </div>
            <div class="casino-play-content">
                <a href="{{ $casino->link }}" target="_blank" class="play-now-btn">Play Now</a>
            </div>
            <div class="casino-card-footer-mobile">
                <div class="age">18+</div>
                <div class="condition-mobile tooltip">T&C's

                    <div class="tooltiptext">
                    <h5>T&C's Apply</h5>
                    <p>{{ $casino->info }}</p>
                    </div>
                </div>
                
            </div>
            <div>
                <a href="{{ $casino->route }}" class="read-review-btn-mobile">Read Review</a>
            </div>
        </div>
    </div>
@endforeach
