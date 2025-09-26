@extends('layout-frontend')

@section('meta')
    <title>{{ $article->title }}</title>
    <meta name="description" content="{{ str_limit(strip_tags($article->detail), $limit='145', $end='') }}">

    <meta property="og:sitename"           content="{{ $general->site_title }}" />
    <meta property="og:url"                content="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug ]) }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $article->title }}" />
    <meta property="og:description"        content="{{ str_limit(strip_tags($article->detail), $limit='145', $end='') }}" />
    <meta property="og:image"              content="{{ route('frontend.index') }}/uploads/{{ $article->author->avatar }}" />

    <meta name="twitter:url" content="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug ]) }}" />
    <meta name="twitter:domain" content="{{ $general->site_url }}" />
    <meta name="twitter:site" content="{{ $general->site_title }}" />
    <meta name="twitter:title" content="{{ $article->title }}" />
    <meta name="twitter:description" content="{{ str_limit(strip_tags($article->detail), $limit='145', $end='') }}" />
    <meta name="twitter:image:src" content="{{ route('frontend.index') }}/uploads/{{ $article->author->avatar }}" />
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>{{ $article->title }}</h3>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="content">
                        <div class="post-widget light-shadow white-bg">
                            <article class="post">
                                <div class="post-info p-30">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="post-meta">
                                                <li><i class="fa fa-clock-o"></i>{{ date("d-m-Y", strtotime($article->created_at))}}</li>
                                                <li><i class="fa fa-eye"></i>{{ views($article)->count() }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <style>
                                                .post-meta li i {
                                                    font-size: 17px;
                                                }
                                            </style>
                                            <ul class="post-meta" style="float: right;display: block;">
                                                <li>
                                                    <a href="https://twitter.com/home?status={{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug ]) }}" class="ts-twitter">
                                                        <i class="fa fa-twitter fa-2x"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug ]) }}" class="ts-facebook">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://api.whatsapp.com/send?text={!! $article->title !!} - {{ route('frontend.article', ["id" => $article->id, "slug" => $article->slug]) }}" class="ts-linkedin">
                                                        <i class="fa fa-whatsapp"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if($id21['publish']==0)
                                        {!! $id21['code'] !!}
                                    @endif
                                    <div class="post-desc">
                                        <p>{!! $article->detail !!}</p>
                                    </div>
                                    @if($id22['publish']==0)
                                        {!! $id22['code'] !!}
                                    @endif
                                </div>
                                <a href="{{ route('frontend.author', ['id' => $article->author->id]) }}" class="btn btn-success btn-block">Diğer Yazıları İçin Tıklayınız.</a>
                            </article>

                        </div>
                    </div>
                </div>

                @include('frontend.sidebar')

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
