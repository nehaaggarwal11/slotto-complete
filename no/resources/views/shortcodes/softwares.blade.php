<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "Softwares",
        "itemListElement":[
            @foreach($softwares as $software)
                @if($loop->last) 
                {
                    "@type":"ListItem",
                    "position":{{ $software->id }},
                    "url":"{{ $software->route }}",
                    "name": "{{ $software->name }}"
                }
                @else
                {
                    "@type":"ListItem",
                    "position":{{ $software->id }},
                    "url":"{{ $software->route }}",
                    "name": "{{ $software->name }}"
                },
                @endif
            @endforeach
        ]
    }
</script>    
@if(!empty($softwares))
    <div class="row software-row justify-content-center" id="software_list">
        @foreach($softwares as $software)
            <div class="col-6 col-md-2 mb-4" data-id="{{ $software->id }}">
                <div class="content" style="background-color:{{ $software->bg_color}}">
                    <a href="{{ $software->route }}">
                        @if($software)
                            <img
                                class="content-image"
                                src="{{ $software->logo->getUrl('thumb') }}"
                                alt="{{ $software->logo_alt_text }}">
                        @endif
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif
