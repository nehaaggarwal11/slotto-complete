
@foreach($softwares as $software)
<div class="col-6 col-md-3 mb-4">
    <div class="content" style="background-color:{{ $software->bg_color}}">
        <a href="{{ $software->route }}">
            @if($software)
            <img class="content-image"
                src="{{ $software->logo->getUrl('thumb') }}" alt="">
            @endif
        </a>
    </div>
</div>
@endforeach