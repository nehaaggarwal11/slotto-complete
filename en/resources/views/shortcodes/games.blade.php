@if(!empty($games))
    <div class="d-none d-lg-block d-xl-block">
        <div class="row justify-content-md-center">
            @include('partials.game-card', compact('games'))
        </div>
    </div>
@endif
