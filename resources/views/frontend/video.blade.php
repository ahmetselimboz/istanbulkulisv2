@extends('layout-frontend')

@section('meta')
    <title>{{ $video->title }}</title>
    <meta name="description" content="{{ str_limit(html_entity_decode($video->detail), $limit='145', $end='') }}">
    <meta name="keywords" content="@if($video->keywords) @foreach(explode(',', $video->keywords) as $key){{ $key }},@endforeach @endif">

    <link rel="canonical" href="{{ route('frontend.video', ['id' => $video->id, 'slug' => $video->slug ]) }}" />

    <meta property="og:sitename"           content="{{ $general->site_title }}" />
    <meta property="og:url"                content="{{ route('frontend.video', ['id' => $video->id, 'slug' => $video->slug ]) }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $video->title }}" />
    <meta property="og:description"        content="{{ str_limit(html_entity_decode($video->detail), $limit='145', $end='') }}" />
    <meta property="og:image"              content="{{ route('frontend.index') }}/uploads/{{ $video->image }}" />

    <meta name="twitter:url" content="{{ route('frontend.video', ['id' => $video->id, 'slug' => $video->slug ]) }}" />
    <meta name="twitter:domain" content="{{ $general->site_url }}" />
    <meta name="twitter:site" content="{{ $general->site_title }}" />
    <meta name="twitter:title" content="{{ $video->title }}" />
    <meta name="twitter:description" content="{{ str_limit(html_entity_decode($video->detail), $limit='145', $end='') }}" />
    <meta name="twitter:image:src" content="{{ route('frontend.index') }}/uploads/{{ $video->image }}" />
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>Video Galeri</h3>
            <ul class="tm-breadcrum">
                <li>{{ $video->title }}</li>
            </ul>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                    <div class="content">
                        <div class="post-widget light-shadow white-bg">

                            <article class="post">
                                @if($id14['publish']==0)
                                        {!! $id14['code'] !!}
                                @endif
                                <div class="">
                                    {!! $video->embed !!}
                                </div>
                                @if($id15['publish']==0)
                                    {!! $id15['code'] !!}
                                @endif

                                <!-- post detail -->
                                <div class="post-info p-30">
                                    <h3>{{ $video->title }}</h3>

                                    <!-- Post meta -->
                                    <div class="post_meta_holder">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- post meta -->
                                                <ul class="post-meta">
                                                    <li><i class="fa fa-clock-o"></i>{{ date("d-m-Y", strtotime($video->created_at)) }} / {{ $video->category->name }}</li>
                                                </ul>
                                                <!-- post meta -->
                                            </div>
                                            <div class="col-md-6">
                                                <style>
                                                    .post-meta li i {
                                                        font-size: 17px;
                                                    }
                                                </style>
                                                <ul class="post-meta" style="float: right;display: block;">
                                                    <li>
                                                        <a href="https://twitter.com/home?status={{ route('frontend.video', ['id' => $video->id, 'slug' => $video->slug ]) }}" class="ts-twitter">
                                                            <i class="fa fa-twitter fa-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('frontend.video', ['id' => $video->id, 'slug' => $video->slug ]) }}" class="ts-facebook">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text={!! $video->title !!} - {{ route('frontend.video', ["id" => $video->id, "slug" => $video->slug]) }}" class="ts-linkedin">
                                                            <i class="fa fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-desc">
                                        <p>{!! $video->detail !!}</p>
                                    </div>
                                    @if($id16['publish']==0)
                                        {!! $id16['code'] !!}
                                    @endif

                                    <div class="row mb-20">
                                        @if($video->keywords)
                                            <div class="col-md-6">
                                                <div class="blog-tags font-roboto">
                                                    <ul>
                                                        @foreach(explode(',', $video->keywords) as $key) <li><a href="#">{{ $key }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
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

