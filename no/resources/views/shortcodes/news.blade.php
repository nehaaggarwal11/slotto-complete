<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "headline": "Slottomat News Article",
        "mainEntity": [
            @foreach($news  ?? [] as $all_news)
                @if($loop->last)
                {
                    "url": "{{ $all_news->route }}",
                    "name": "{{ $all_news->name }}"
                }
                @else
                {
                    "url": "{{ $all_news->route }}",
                    "name": "{{ $all_news->name }}"
                },
            @endif
            @endforeach
        ]        
    }
</script>    
@if(!empty($news))
    <div class="row justify-content-center">
        @foreach($news ?? [] as $news_post)
            <div class="col-md-4">
                <div class="single-blog blog-2 mt-30">
                    <div class="blog-image">
                        <a href="{{ $news_post->route }}"><img
                                src="{{ @$news_post->logo_img->url }}"
                                alt="{{ $news_post->logo_img_alt_text }}"></a>
                    </div>
                    <div class="blog-content">
                        <h4 class="news-blog-title"><a href="{{ $news_post->route }}">{{ $news_post->name }}</a></h4>
                        <p>{{ Str::limit($news_post->small_description, 80) }}</p>
                        <a class="btn read-blog-btn mx-auto d-block"
                           href="{{ $news_post->route }}">Read News</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
