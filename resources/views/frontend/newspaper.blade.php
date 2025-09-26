@extends('layout-frontend')

@section('meta')
    <title>{{ $title }}</title>
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>{{ $title }}</h3>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="content">
                        <div class="post-widget light-shadow white-bg">
                            <article class="post">
                                <div class="post-info p-30">
                                    <div class="post-desc">
                                        <img src="{{ $image }}" alt="{{ $title }}" width="100%">
                                    </div>
                                </div>
                            </article>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'aksam', ]) }}" class="ts-blue-bg">Akşam Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'turkgun', ]) }}" class="ts-blue-bg">Türkgün Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'milli-gazete', ]) }}" class="ts-blue-bg">Milli Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'sozcu', ]) }}" class="ts-blue-bg">Sözcü Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'dirilis-postasi', ]) }}" class="ts-blue-bg">Dirilis Postası Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'turkiye-gazetesi', ]) }}" class="ts-blue-bg">Türkiye Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'birgun', ]) }}" class="ts-blue-bg">Birgün Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'cumhuriyet', ]) }}" class="ts-blue-bg">Cumhuriyet Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'milat', ]) }}" class="ts-blue-bg">Milat Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'karar', ]) }}" class="ts-blue-bg">Karar Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'aydinlik-gazetesi', ]) }}" class="ts-blue-bg">Aydınlık Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'yenibirlik', ]) }}" class="ts-blue-bg">Yeni Birlik Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'evrensel', ]) }}" class="ts-blue-bg">Evrensel Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'yeni-soz-gazetesi', ]) }}" class="ts-blue-bg">Yeni Söz Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'yeni-asya', ]) }}" class="ts-blue-bg">Yeni Asya Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'korkusuz', ]) }}" class="ts-blue-bg">Korkusuz Gazetesi</a></li>
                            <li class="list-group-item pull-left"><a href="{{ route('frontend.newspaper', ['slug' => 'yeni-safak', ]) }}" class="ts-blue-bg">Yeni Şafak Gazetesi</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
