
@foreach($games as $game)
<div class="col-6 col-md-3 game-content mb-4">
    <div class="content">
        <a href="{{ $game->route }}">
            <div class="content-overlay"></div>
            @if($game)
            <img class="content-image"
                src="{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}" alt="{{ $game->logo_alt_text }}">
            @endif
            <div class="content-details fadeIn-top">
                <h5>Game demo</h5>
                <p>Read Review</p> 
            </div>
        </a>
    </div>
</div>
@endforeach