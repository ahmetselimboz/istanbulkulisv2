@extends('layout-frontend')

@section('meta')
    <title>Foto Galeriler</title>
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>Foto Galeriler</h3>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-sm-8">
                    <div class="content products-page">
                        <div class="row">
                            @foreach($photogalleries as $photogallery)
                                <div class="col-md-4 col-sm-6 col-xs-4">
                                    <a href="{{ route('frontend.photogallery', ['id' => $photogallery->id, 'slug' => $photogallery->slug, ]) }}">
                                        <div class="product-holder">
                                            <div class="product-thumb">
                                                <img src="uploads/{{ $photogallery->image }}" alt="{{ $photogallery->title }}">
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




                <!-- Sidebar -->
            @include('frontend.sidebar')
            <!-- Sidebar -->

            </div>
        </div>
        <!-- Content -->
    </div>
@endsection

@section('js')
@endsection

