@extends('layouts.frontend')

@section('title','About Page')
@section('meta_tags')
    <title>{{ $about->seo_title }}</title>
    <meta content="{{ $about->seo_keyword }}" name="keywords">
    <meta content="{{ $about->seo_description }}" name="description">
    <script type="application/ld+json">
    {
        "@context": "http://schema.org/",
        "@type": "Organization",
        "name": "{{ $about->heading }}",
        "description": "Slottomat.com is run by a group of avid gamblers online who want to make the gaming experience for Norwegians as good as possible. We have chosen a pirate theme on the site because that is exactly what we are the conquerors of online casino bonuses! a sticky bonus? Basically, this is a bonus where you never get paid bonus money and have to replay them all the time. Or that new reservations are constantly emerging about withdrawing free spins winnings. When we choose a casino for our site, we know that you will have a good experience. We test every casino we recommend on the website ourselves, and also give you lots of info about the game selection. Did you know that a new online casino is popping up every single week? In fact, there are thousands to choose from nowadays if you google online casino.- But which ones are good? If you are new to this world, it is certainly not easy to know which offers you should consider. Therefore, it is wise to spend some time on our website to understand how online casinos work."
    }
    </script>
@endsection
@section('content')
    <style> ul {
            color: white;
        }

        #about-section-page p {
            font-weight: normal;
        }</style>
    <section id="about-section-page" class="sectionMTMB">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $about->heading }}</h1>
                    {!! $about->about_description !!}
                </div>
            </div>
        </div>
    </section>
@endsection
