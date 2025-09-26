@extends('layout-frontend')

@section('meta')
    <title>{{ $photogallerycategory->name }}</title>
    <meta name="description" content="{{ str_limit(html_entity_decode($photogallerycategory->detail), $limit='145', $end='') }}">
    <meta name="keywords" content="@if($photogallerycategory->keywords) @foreach(explode(',', $photogallerycategory->keywords) as $key){{ $key }},@endforeach @endif">

    <link rel="canonical" href="{{ route('frontend.photogallerycategory', ['id' => $photogallerycategory->id, 'slug' => $photogallerycategory->slug ]) }}" />

    <meta property="og:sitename"           content="{{ $general->site_title }}" />
    <meta property="og:url"                content="{{ route('frontend.photogallerycategory', ['id' => $photogallerycategory->id, 'slug' => $photogallerycategory->slug ]) }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $photogallerycategory->name }}" />
    <meta property="og:description"        content="{{ str_limit(html_entity_decode($photogallerycategory->detail), $limit='145', $end='') }}" />
    <meta property="og:image"              content="{{ route('frontend.index') }}/uploads/{{ $photogallerycategory->image }}" />

    <meta name="twitter:url" content="{{ route('frontend.photogallerycategory', ['id' => $photogallerycategory->id, 'slug' => $photogallerycategory->slug ]) }}" />
    <meta name="twitter:domain" content="{{ $general->site_url }}" />
    <meta name="twitter:site" content="{{ $general->site_title }}" />
    <meta name="twitter:title" content="{{ $photogallerycategory->name }}" />
    <meta name="twitter:description" content="{{ str_limit(html_entity_decode($photogallerycategory->detail), $limit='145', $end='') }}" />
    <meta name="twitter:image:src" content="{{ route('frontend.index') }}/uploads/{{ $photogallerycategory->image }}" />
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>Foto Galeriler</h3>
            <ul class="tm-breadcrum">
                <li>{{ $photogallerycategory->name }}</li>
            </ul>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                    @if($id13['publish']==0)
                        <div style="margin: 10px 0px;">
                            {!! $id13['code'] !!}
                        </div>
                    @endif
                    <div class="content products-page">
                        <div class="row">
                            @foreach($photogalleries as $photogallery)
                                <div class="col-md-4 col-sm-6 col-xs-4">
                                    <a href="{{ route('frontend.photogallery', ['id' => $photogallery->id, 'slug' => $photogallery->slug, ]) }}">
                                        <div class="product-holder">
                                            <div class="product-thumb">
                                                <img src="/uploads/{{ $photogallery->image }}" alt="{{ $photogallery->title }}">
                                                @if(isset($photogallery->category->name))
                                                    <div class="product-hover">
                                                        <ul>
                                                            {{ $photogallery->category->name }}
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product-detail white-bg">
                                                <h4>{{ str_limit(html_entity_decode($photogallery->title), $limit='22', $end='...') }}</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            {{ $photogalleries->links() }}
                        </div>
                    </div>
                </div>

            @include('frontend.sidebar')

            </div>
        </div>
        <!-- Content -->
    </div>
@endsection

@section('js')
@endsection

