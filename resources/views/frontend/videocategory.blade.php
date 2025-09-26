@extends('layout-frontend')

@section('meta')
    <title>{{ $videocategory->title }}</title>
    <meta name="description" content="{{ str_limit(html_entity_decode($videocategory->description), $limit='145', $end='') }}">
    <meta name="keywords" content="@if($videocategory->keywords) @foreach(explode(',', $videocategory->keywords) as $key){{ $key }},@endforeach @endif">

    <link rel="canonical" href="{{ route('frontend.videocategory', ['id' => $videocategory->id, 'slug' => $videocategory->slug ]) }}" />

    <meta property="og:sitename"           content="{{ $general->site_title }}" />
    <meta property="og:url"                content="{{ route('frontend.videocategory', ['id' => $videocategory->id, 'slug' => $videocategory->slug ]) }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $videocategory->title }}" />
    <meta property="og:description"        content="{{ str_limit(html_entity_decode($videocategory->detail), $limit='145', $end='') }}" />
    <meta property="og:image"              content="{{ route('frontend.index') }}/uploads/{{ $videocategory->image }}" />

    <meta name="twitter:url" content="{{ route('frontend.videocategory', ['id' => $videocategory->id, 'slug' => $videocategory->slug ]) }}" />
    <meta name="twitter:domain" content="{{ $general->site_url }}" />
    <meta name="twitter:site" content="{{ $general->site_title }}" />
    <meta name="twitter:title" content="{{ $videocategory->title }}" />
    <meta name="twitter:description" content="{{ str_limit(html_entity_decode($videocategory->detail), $limit='145', $end='') }}" />
    <meta name="twitter:image:src" content="{{ route('frontend.index') }}/uploads/{{ $videocategory->image }}" />
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>Video Galeriler</h3>
            <ul class="tm-breadcrum">
                <li>{{ $videocategory->name }}</li>
            </ul>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                    @if($id12['publish']==0)
                        <div style="margin: 10px 0px;">
                            {!! $id12['code'] !!}
                        </div>
                    @endif
                    <div class="content products-page">
                        <div class="row">
                            @foreach($videos as $video)
                                <div class="col-md-4 col-sm-6 col-xs-4">
                                    <a href="{{ route('frontend.video', ['id' => $video->id, 'slug' => $video->slug, ]) }}">
                                        <div class="product-holder">
                                            <div class="product-thumb">
                                                <img src="/uploads/{{ $video->image }}" alt="{{ $video->title }}">
                                                @if(isset($video->category->name))
                                                    <div class="product-hover">
                                                        <ul>
                                                            {{ $video->category->name }}
                                                        </ul>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product-detail white-bg">
                                                <h4>{{ str_limit(html_entity_decode($video->title), $limit='22', $end='...') }}</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            {{ $videos->links() }}
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

