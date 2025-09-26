@extends('layout-frontend')


@section('meta')
    <title>Aradığınız şeyi bulamadık</title>
@endsection


@section('css')
@endsection

@section('content')
    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>404</h3>

        </div>
    </section>

    <div class="theme-padding">
        <!-- error 404 -->
        <div class="error-holder">
            <div class="error-detail">
                <h2 class="font-roboto">4<img src="{{asset('frontend/theme_hilal/images/404/error-1.png')}}" alt="">4</h2>
                <h3>Aradığın sayfa hala yapım aşamasında  </h3>
                <p>Lütfen daha sonra tekrar dene</p>

                <!-- search bar -->
                @if($modules[4]['publish']==0)
                    <div class="newsletter-form">
                        <form method="post" action="{{ route('newsletter.save') }}">
                            @csrf
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                <input type="email" name="email" class="form-control" placeholder="Email adresiniz buraya yazınız" autocomplete="off">
                                <span class="input-group-btn">
                                  <button type="submit" class="btn red">Abone ol</button>
                                </span>
                            </div>
                        </form>
                    </div>
            @endif
            <!-- search bar -->
                <a href="{{ route('frontend.index') }}" class="btn red">Anasayfaya dön</a>
            </div>
        </div>
        <!-- error 404 -->
    </div>



@endsection

@section('js')
@endsection

