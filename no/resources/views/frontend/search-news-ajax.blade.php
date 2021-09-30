@foreach($news as $news)
    <div class="col-md-4 mb-4">
        <div class="single-blog blog-2 mt-30">
            <div class="blog-image">
                <a href="{{ $news->route }}"><img
                        src="{{ @$news->logo_img->url }}"
                        alt="{{ $news->logo_img_alt_text }}"></a>
            </div>
            <div class="blog-content">
                <h5 class="news-blog-title"><a href="{{ $news->route }}">{{ $news->name }}</a></h5>
                <p class="news-short-description">{{ Str::limit($news->small_description, 80) }}</p>
                <a class="btn read-blog-btn mx-auto d-block splbtns purple"
                href="{{ $news->route }}" data-text="Read Blog">Read Blog</a>
            </div>
        </div>
    </div>
@endforeach
