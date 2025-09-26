@extends('layout-amp-frontend')

@section('meta')
    <title>@if(isset($category->name)) {{ $category->name }} @endif</title>
@endsection

@section('css')
@endsection

@section('content')
    <main>
        <section class="section main-slider">
            <div class="content">
                <amp-inline-gallery layout="container">
                    <amp-base-carousel class="gallery" layout="responsive" width="3.6" height="2" loop="true" visible-count="1">
                        @foreach($slides as $key => $slide)
                        <a href="">
                            <amp-img
                                    src="{{ $slide->image }}"
                                    layout="responsive"
                                    width="400"
                                    height="235"
                            ></amp-img>
                        </a>
                        @endforeach
                    </amp-base-carousel>
                    <amp-inline-gallery-pagination class="pagination" layout="nodisplay" inset></amp-inline-gallery-pagination>
                </amp-inline-gallery>
            </div>
        </section>

        <section class="section single-box">
            <div class="container">
                <div class="content">
                    <div class="row">
                        @foreach ($posts as $post)
                        <div class="col-md-4">
                            <a href="" class="item mb-4 shadow-sm">
                                <div class="image">
                                    <amp-img alt="{{ $post->title }}" src="{{$post->image}}" width="100" height="59" layout="responsive"></amp-img>
                                </div>
                                <div class="title">
                                    <span>{{ $post->title }}</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="section pagination">
            <ul>
                <li>{{ $posts->links() }}</li>
            </ul>
        </section>
    </main>
@endsection

@section('js')
@endsection

