@extends('layout-frontend')

@section('meta')
    <title>Köşe Yazarları</title>
    <meta name="description" content="Köşe Yazarları">

    <meta property="og:sitename"           content="{{ $general->site_title }}" />
    <meta property="og:url"                content="{{ route('frontend.authorall') }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="Köşe Yazarları" />
    <meta property="og:description"        content="Köşe Yazarları" />
    <meta property="og:image"              content="{{ route('frontend.index') }}/uploads/{{ $general->site_logo }}" />

    <meta name="twitter:url" content="{{ route('frontend.authorall') }}" />
    <meta name="twitter:domain" content="{{ $general->site_url }}" />
    <meta name="twitter:site" content="{{ $general->site_title }}" />
    <meta name="twitter:title" content="Köşe Yazarları" />
    <meta name="twitter:description" content="Köşe Yazarları" />
    <meta name="twitter:image:src" content="{{ route('frontend.index') }}/uploads/{{ $general->site_logo }}" />

@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>Köşe Yazarları</h3>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="content products-page">
                        <div class="row">
                            @foreach($authorall as $author)
                                <div class="col-md-4 col-sm-6 col-xs-4">
                                    <a href="{{ route('frontend.author', ['id' => $author->id, 'slug' => $author->slug, ]) }}">
                                        <div class="product-holder">
                                            <div class="product-thumb">
                                                <img src="/uploads/{{ $author->avatar }}" alt="{{ $author->name }}">
                                            </div>
                                            <div class="product-detail white-bg" style="text-align: center">
                                                <h4>{{ $author->name }}</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Content -->
    </div>
@endsection

@section('js')
@endsection






