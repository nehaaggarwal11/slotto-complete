@if(!empty($casinos))
@if(sizeof($casinos) > 0)
    @include('partials.casino-card', compact('casinos'))
@else
    <div id="noCasino" class="text-center position-relative">
        <img class="mt-n5" width="343" src="{{ asset('asset/frontend/img/staytuned.png')}}" loading="lazy"  alt="stay tune">
        <span class="mb-4 p-3 mt-2">There are no casino offers available for you right now, keep tuned and enjoy all our free slots in the meantime </span>
        <a href="/free-slots" class="splbtns" data-text="Free Slots">Free Slot</a>
    </div>
@endif
@endif
