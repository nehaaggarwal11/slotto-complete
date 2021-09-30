@if(!empty($casinos))
    <div class="d-none d-lg-block d-xl-block">
        <div class="row justify-content-md-center">
            @include('partials.casino-card', compact('casinos'))
        </div>
    </div>
@endif
