@foreach($games ?? [] as $game)
    <div class="col-6 col-md-2 mb-4">
        <div class="content">
            <a href="{{ $game->route }}">
                <div class="content-overlay"></div>
                @if($game)
                    <img
                        class="content-image"
                        src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}"
                        alt="{{ $game->logo_alt_text }}">
                @endif
                <div class="content-details fadeIn-top">
                    <h5>Play {{ $game->name }} demo</h5>
                </div>
            </a>
        </div>
    </div>
@endforeach
