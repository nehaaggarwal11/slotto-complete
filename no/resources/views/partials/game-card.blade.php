@foreach($games ?? [] as $game)
    <div class="col-6 col-md-2 mb-4 game-content">
        <div class="content">
            <a href="{{ $game->route }}">
                <div class="content-overlay"></div>
                @if($game)
                    <img
                        class="content-image img-fluid"
                        src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}"
                        alt="{{ $game->logo_alt_text }}"
                        width="160" height="160"
                        loading="lazy"
                        >
                @endif
                <div class="content-details fadeIn-top">

                  <span class="gameh5Span">Play {{ $game->name }} demo</span>
                </div>
            </a>
        </div>
    </div>
@endforeach
