@extends('layout-frontend')

@section('meta')
    <title>{{ $author->name }}</title>
    <meta name="description" content="{{ str_limit(strip_tags($author->about), $limit='145', $end='') }}">

    <meta property="og:sitename"           content="{{ $general->site_title }}" />
    <meta property="og:url"                content="{{ route('frontend.author', ['id' => $author->id ]) }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $author->name }}" />
    <meta property="og:description"        content="{{ str_limit(strip_tags($author->about), $limit='145', $end='') }}" />
    <meta property="og:image"              content="{{ route('frontend.index') }}/uploads/{{ $author->avatar }}" />

    <meta name="twitter:url" content="{{ route('frontend.author', ['id' => $author->id]) }}" />
    <meta name="twitter:domain" content="{{ $general->site_url }}" />
    <meta name="twitter:site" content="{{ $general->site_title }}" />
    <meta name="twitter:title" content="{{ $author->name }}" />
    <meta name="twitter:description" content="{{ str_limit(strip_tags($author->about), $limit='145', $end='') }}" />
    <meta name="twitter:image:src" content="{{ route('frontend.index') }}/uploads/{{ $author->avatar }}" />
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>Köşe Yazarı</h3>
            <ul class="tm-breadcrum">
                <li>{{ $author->name }}</li>
            </ul>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="post-widget m-0">
                        <div class="p-30 light-shadow white-bg">
                            <ul class="list-posts haspad" id="catPage_listing">
                                @if($articles->count())
                                    @foreach($articles as $article)
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="post-content">
                                                        <h4><a href="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug, ]) }}">{{ $article->title }}</a></h4>
                                                        <ul class="post-meta">
                                                            <li><i class="fa fa-clock-o"></i>{{ date('d-m-Y', strtotime($article->created_at)) }}</li>
                                                            <li><i class="fa fa-eye"></i>{{ $article->getViews() }}</li>
                                                        </ul>
                                                        <p> {!! str_limit(strip_tags($article->detail), $limit='250', $end='....')  !!}
                                                            <br>
                                                            <a href="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug, ]) }}" class="read-more"></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    İçerik Bulunamadı
                                @endif
                            </ul>
                        </div>
                        {{ $articles->links() }}
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
