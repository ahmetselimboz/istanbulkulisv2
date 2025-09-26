@extends('layout-frontend')

@section('meta')
    <title>{{ $photogallery->title }}</title>
    <meta name="description" content="{{ str_limit(strip_tags($photogallery->detail), $limit='145', $end='') }}">
    <meta name="keywords" content="@if($photogallery->keywords) @foreach(explode(',', $photogallery->keywords) as $key){{ $key }},@endforeach @endif">

    <link rel="canonical" href="{{ route('frontend.photogallery', ['id' => $photogallery->id, 'slug' => $photogallery->slug ]) }}" />

    <meta property="og:sitename"           content="{{ $general->site_title }}" />
    <meta property="og:url"                content="{{ route('frontend.photogallery', ['id' => $photogallery->id, 'slug' => $photogallery->slug ]) }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $photogallery->title }}" />
    <meta property="og:description"        content="{{ str_limit(strip_tags($photogallery->detail), $limit='145', $end='') }}" />
    <meta property="og:image"              content="{{ route('frontend.index') }}/uploads/{{ $photogallery->image }}" />

    <meta name="twitter:url" content="{{ route('frontend.photogallery', ['id' => $photogallery->id, 'slug' => $photogallery->slug ]) }}" />
    <meta name="twitter:domain" content="{{ $general->site_url }}" />
    <meta name="twitter:site" content="{{ $general->site_title }}" />
    <meta name="twitter:title" content="{{ $photogallery->title }}" />
    <meta name="twitter:description" content="{{ str_limit(strip_tags($photogallery->detail), $limit='145', $end='') }}" />
    <meta name="twitter:image:src" content="{{ route('frontend.index') }}/uploads/{{ $photogallery->image }}" />
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>Foto Galeri</h3>
            <ul class="tm-breadcrum">
                <li>{{ $photogallery->title }}</li>
            </ul>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                    <div class="content">

                        <!-- blog detail -->
                        <div class="post-widget light-shadow white-bg">

                            <!-- blog artical -->
                            <article class="post">

                                <!-- blog pot thumb -->
                                <div class="post-thumb">
                                    <img src="images/blog-detail/banner.jpg" alt="">
                                    <span class="post-badge">{{ $photogallery->category->name }}</span>
                                </div>
                                <!-- blog pot thumb -->

                                <!-- post detail -->
                                <div class="post-info p-30">
                                    <h3>{{ $photogallery->title }}</h3>
                                @if($id18['publish']==0)
                                    {!! $id18['code'] !!}
                                @endif
                                <!-- Post meta -->
                                    <div class="post_meta_holder">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- post meta -->
                                                <ul class="post-meta">
                                                    <li><i class="fa fa-clock-o"></i>{{ date("d-m-Y", strtotime($photogallery->created_at)) }}</li>
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
                                                        <a href="https://twitter.com/home?status={{ route('frontend.photogallery', ['id' => $photogallery->id, 'slug' => $photogallery->slug ]) }}" class="ts-twitter">
                                                            <i class="fa fa-twitter fa-2x"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('frontend.photogallery', ['id' => $photogallery->id, 'slug' => $photogallery->slug ]) }}" class="ts-facebook">
                                                            <i class="fa fa-facebook"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text={!! $photogallery->title !!} - {{ route('frontend.photogallery', ["id" => $photogallery->id, "slug" => $photogallery->slug]) }}" class="ts-linkedin">
                                                            <i class="fa fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="post-desc">
                                        <p>{!! $photogallery->detail !!}</p>
                                    </div>

                                    <div class="row mb-20">
                                        @if($photogallery->keywords)
                                            <div class="col-md-6">
                                                <div class="blog-tags font-roboto">
                                                    <ul>
                                                        @foreach(explode(',', $photogallery->keywords) as $key) <li><a href="#">{{ $key }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            </article>
                        </div>




                        <div class="post-widget gallery-image">
                            <div class="primary-heading">
                                <h2>Galeri Resimleri</h2>
                            </div>
                        </div>
                        @foreach($images as $image)
                            <div class="post-widget gallery-image">
                                <div class="light-shadow gray-bg p-30">
                                    <img src="/uploads/{{ $image->image }}" class="img-fluid" alt="">
                                    <p> {!! $image->description !!} </p>
                                </div>
                            </div>
                            @if($id19['publish']==0)
                                <div class="banner-img text-center mb-30">
                                    {!! $id19['code'] !!}
                                </div>
                            @endif
                        @endforeach

                        {{ $images->links() }}

                    </div>
                </div>

                @include('frontend.sidebar')

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection

