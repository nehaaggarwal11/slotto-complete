
@if(!empty($games))
  @foreach($games ?? [] as $game)
    <div class="content gamesb">
        <a href="{{ $game->route }}">
            <div class="content-overlay"></div>
            @if($game)
                <img
                    class="content-image"
                    src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}"
                    alt="{{ $game->logo_alt_text }}">
            @endif
            <div class="content-details fadeIn-top">

              <span class="gameh5Span">Play {{ $game->name }} demo</span>
            </div>
        </a>
    </div>
  @endforeach
@endif
