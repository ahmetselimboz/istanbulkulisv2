@extends('layout-frontend')


@section('meta')
    <title>Arama Sonuçları</title>
@endsection

@section('content')


    <main>
        <section class="section headlines">
            <div class="container">
                <h2 class="ts-title float-left">
                    Aranan Kelime : <b> {{ $searchtext }}</b>
                </h2>
            </div>
        </section>


        <section class="section single-box">
            <div class="container">
                <div class="content">
                    <div class="row">
                        @if($searchresult->count())
                            @foreach($searchresult as $post)
                                <div class="col-md-4">
                                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" class="item mb-4 shadow-sm">
                                        <div class="image">
                                            <img src="{{$post->image}}" alt="{{$post->image}}" class="w-100">
                                        </div>
                                        <div class="title">
                                            <span>{{$post->title}}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="col-lg-6 col-md-8">
                                Aradığınız Kelime Bulunamadı
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </section>

    </main>




@endsection
