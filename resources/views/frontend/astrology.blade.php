
@extends('layout-frontend')

@section('meta')
    <title>Günlük {{ @$astroname }} Burç Yorumu</title>
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>{{ @$astroname }}</h3>
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
                                    <div class="post-desc">
                                        @if(empty($astro))
                                            Yorum henüz görüntülenemedi
                                        @else
                                            <p>{{ $astro }}</p>
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

