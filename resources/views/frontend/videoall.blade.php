@extends('layout-frontend')

@section('meta')
    <title>Video Galeriler</title>
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>Video Galeriler</h3>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                    <div class="content products-page">
                        <div class="row">
                            @foreach($videos as $video)
                                <div class="col-md-4 col-sm-6 col-xs-4">
                                    <a href="{{ route('frontend.video', ['id' => $video->id, 'slug' => $video->slug, ]) }}">
                                        <div class="product-holder">
                                            <div class="product-thumb">
                                                <img src="uploads/{{ $video->image }}" alt="{{ $video->title }}">
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

