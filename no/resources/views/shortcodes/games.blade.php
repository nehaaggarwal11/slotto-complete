<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "Free Slots",
        "itemListElement":[
            @foreach($games ?? [] as $game) 
                @if($loop->last) 
                {
                    "@type":"ListItem",
                    "position":{{ $game->id }},
                    "image": "{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}",
                    "url":"{{ $game->route }}",
                    "name": "{{ $game->name }}"
                }
                @else
                {
                    "@type":"ListItem",
                    "position":{{ $game->id }},
                    "image": "{{ $game->logo ? $game->logo->getUrl('thumb') : asset('asset/frontend/img/logo/game.png') }}",
                    "url":"{{ $game->route }}",
                    "name": "{{ $game->name }}"
                },
                @endif
            @endforeach
        ]
    }
</script>
@if(!empty($games))
    <div class="row justify-content-md-center">
        @include('partials.game-card', compact('games'))
    </div>
@endif
