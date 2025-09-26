@extends('layout-frontend')

@section('meta')
    <title>{{ $post->title }}</title>
    <meta name="description" content="{{ str_limit(html_entity_decode($post->short_detail), $limit='145', $end='') }}">
    <meta name="keywords" content="@if($post->keywords) @foreach(explode(',', $post->keywords) as $key){{ $key }},@endforeach @endif">




    @if($route=="frontend.post")
        <link rel="canonical" href="{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" />
        
    @endif


    <meta property="og:sitename"           content="{{ $general->site_title }}" />
    <meta property="og:url"                content="{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $post->title }}" />
    <meta property="og:description"        content="{{ str_limit(html_entity_decode($post->detail), $limit='145', $end='') }}" />
    <meta property="og:image"              content="{{ route('frontend.index') }}{{ $post->image }}" />

    <meta name="twitter:url" content="{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" />
    <meta name="twitter:domain" content="{{ $general->site_url }}" />
    <meta name="twitter:site" content="{{ $general->site_title }}" />
    <meta name="twitter:title" content="{{ $post->title }}" />
    <meta name="twitter:description" content="{{ str_limit(html_entity_decode($post->detail), $limit='145', $end='') }}" />
    <meta name="twitter:image:src" content="{{ route('frontend.index') }}{{ $post->image }}" />
@endsection

@section('css')
@endsection

@section('content')
    <main>
        
        <section class="section detail">
            <div class="container">
                <div class="content">
                    <div class="info">
                        <div class="short-info d-flex">
                            <span class="category">{{@$post->category->name }}</span>
                            <ul class="news">
                                @if(!empty($post->created_at)) <li><span>Haber Giriş: {{ date("d-m-Y H:i:s", strtotime($post->created_at)) }} </span></li> @endif
                                @if(!empty($post->updated_at)) <li><span>Son Güncelleme: {{ date("d-m-Y  H:i:s", strtotime($post->updated_at)) }} </span></li> @endif
                                @if(!empty($post->sources)) <li><span>Kaynak:{{ $post->sources->title }}</span></li> @endif
                            </ul>
                        </div>
                        <h3 class="title">{{ $post->title }}</h1>
                        <p class="description">{{ str_limit(html_entity_decode($post->short_detail), $limit='270', $end='...') }}</p>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="main-content">
								@if($id7['publish']==0) <div class="text-center my-1"> {!! $id7['code'] !!} </div> @endif
                                <div class="image">	
                                    <img src="{{ $post->image }}" class="w-100" alt="{{ $post->title }}">
                                </div>
								@if($id8['publish']==0) <div class="text-center my-1"> {!! $id8['code'] !!} </div> @endif
                                <div class="info">
                                    <div class="row">
                                        <div class="col-7 col-md-4">
                                            <div class="google-follow">
                                                <span>Abone Ol</span>
                                                <a href="{{ $general->site_newsname }}">
                                                    <img src="{{ asset('frontend/sonsayfa/img/google-news.png') }}" alt="google">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-5 col-md-8 text-right">
                                            <ul class="share-menu">
                                                <li>
                                                    <a href="https://twitter.com/home?status={{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" class="twitter">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 315 255.99"><defs>
                                                                <style>.cls-1{fill:#959595;}</style></defs>
                                                            <g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M0,227a182.9,182.9,0,0,0,99.07,29c118.87,0,183.87-98.47,183.87-183.88q0-4.19-.19-8.36A131.17,131.17,0,0,0,315,30.3a129.09,129.09,0,0,1-37.12,10.18A64.82,64.82,0,0,0,306.3,4.73a129.62,129.62,0,0,1-41,15.68A64.67,64.67,0,0,0,155.14,79.35,183.47,183.47,0,0,1,21.93,11.83a64.69,64.69,0,0,0,20,86.28A64.43,64.43,0,0,1,12.66,90v.82A64.66,64.66,0,0,0,64.5,154.21a65.1,65.1,0,0,1-17,2.27,64.11,64.11,0,0,1-12.16-1.17,64.68,64.68,0,0,0,60.37,44.88,129.63,129.63,0,0,1-80.26,27.67A130.71,130.71,0,0,1,0,227Z"></path></g></g></svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" class="facebook">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 147.01 315"><defs><style>.cls-1{fill:#fff;}</style></defs>
                                                            <g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M31.77,315H97V157.41h43.8s4.1-25.43,6.1-53.23H97.29V67.91c0-5.41,7.11-12.69,14.16-12.69H147V0H98.64C30.16,0,31.77,53.08,31.77,61v43.35H0v53H31.77Z"></path></g></g></svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://api.whatsapp.com/send?text={!! $post->title !!} - {{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" class="whatsapp">
                                                        <svg height="512pt" viewBox="0 0 512 512" width="512pt" xmlns="http://www.w3.org/2000/svg"><path d="m435.921875 74.351562c-48.097656-47.917968-112.082031-74.3242182-180.179687-74.351562-67.945313 0-132.03125 26.382812-180.445313 74.289062-48.5 47.988282-75.234375 111.761719-75.296875 179.339844v.078125.046875c.0078125 40.902344 10.753906 82.164063 31.152344 119.828125l-30.453125 138.417969 140.011719-31.847656c35.460937 17.871094 75.027343 27.292968 114.933593 27.308594h.101563c67.933594 0 132.019531-26.386719 180.441406-74.296876 48.542969-48.027343 75.289062-111.71875 75.320312-179.339843.019532-67.144531-26.820312-130.882813-75.585937-179.472657zm-180.179687 393.148438h-.089844c-35.832032-.015625-71.335938-9.011719-102.667969-26.023438l-6.621094-3.59375-93.101562 21.175782 20.222656-91.90625-3.898437-6.722656c-19.382813-33.425782-29.625-70.324219-29.625-106.71875.074218-117.800782 96.863281-213.75 215.773437-213.75 57.445313.023437 111.421875 22.292968 151.984375 62.699218 41.175781 41.03125 63.84375 94.710938 63.824219 151.152344-.046875 117.828125-96.855469 213.6875-215.800781 213.6875zm0 0"/><path d="m186.152344 141.863281h-11.210938c-3.902344 0-10.238281 1.460938-15.597656 7.292969-5.363281 5.835938-20.476562 19.941406-20.476562 48.628906s20.964843 56.40625 23.886718 60.300782c2.925782 3.890624 40.46875 64.640624 99.929688 88.011718 49.417968 19.421875 59.476562 15.558594 70.199218 14.585938 10.726563-.96875 34.613282-14.101563 39.488282-27.714844s4.875-25.285156 3.414062-27.722656c-1.464844-2.429688-5.367187-3.886719-11.214844-6.800782-5.851562-2.917968-34.523437-17.261718-39.886718-19.210937-5.363282-1.941406-9.261719-2.914063-13.164063 2.925781-3.902343 5.828125-15.390625 19.3125-18.804687 23.203125-3.410156 3.894531-6.824219 4.382813-12.675782 1.464844-5.851562-2.925781-24.5-9.191406-46.847656-29.050781-17.394531-15.457032-29.464844-35.167969-32.878906-41.003906-3.410156-5.832032-.363281-8.988282 2.570312-11.898438 2.628907-2.609375 6.179688-6.179688 9.105469-9.582031 2.921875-3.40625 3.753907-5.835938 5.707031-9.726563 1.949219-3.890625.972657-7.296875-.488281-10.210937-1.464843-2.917969-12.691406-31.75-17.894531-43.28125h.003906c-4.382812-9.710938-8.996094-10.039063-13.164062-10.210938zm0 0"/></svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

								<?php
								$pattern = "/<p>.*?<\/p>/"; 
								preg_match_all($pattern,$post->detail, $resres);
								?>
								
                                <p>
									@foreach($resres[0] as $pkey => $pler)
										@if($pkey == 10)
											@if($id32['publish']==0)  <div class="text-center"> {!! $id32['code'] !!} </div> @endif
										@endif
										{!! $pler !!}
									@endforeach
									</p>
								
                                @if($id9['publish']==0)
									<div class="text-center">
                                    {!! $id9['code'] !!}
									</div>
                                @endif
                            </div>

                            @if($otherpost->count())
                                <div class="similar-news">
                                    <ul>
                                        @foreach($otherpost as $posto)
                                            <li>
                                                <div class="row">
                                                    <div class="col-6 col-md-3">
                                                        <a href="{{ route('frontend.post', ['categoryslug' => str_slug($posto->category->name), 'id' => $posto->id, 'slug' => $posto->slug ]) }}">
                                                            <img src="{{$posto->image}}" alt="{{$posto->title}}" class="w-100">
                                                        </a>
                                                    </div>
                                                    <div class="col-6 col-md-9 mt-0 mt-sm-0">
                                                        <ul class="category">
                                                            <li> <a href="{{ route('frontend.post', ['categoryslug' => str_slug($posto->category->name), 'id' => $posto->id, 'slug' => $posto->slug ]) }}">{{ $posto->category->name }}</a></li>
                                                        </ul>
                                                        <div class="title">
                                                            <a href="{{ route('frontend.post', ['categoryslug' => str_slug($posto->category->name), 'id' => $posto->id, 'slug' => $posto->slug ]) }}"> {{ $posto->title }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if($post->keywords)
                                <ul  class="tags">
                                    @foreach(explode(',', $post->keywords) as $key) <li><a href="javascript:void(0)">{{ $key }}</a></li>@endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="col-12 col-md-4">
                            @if($id10['publish']==0)
                                <div class="ads-box pt-0 text-center">
                                    {!! $id10['code'] !!}
                                </div>
                            @endif
                            <div class="last-news">
                                <div class="head-title">
                                    <span>Son Haberler</span>
                                    <div class="line-str"></div>
                                </div>
                                <ul>
                                    @foreach($latestnews as $item)
                                        <li>
                                            <a href="{{route('frontend.post', ['categoryslug' => str_slug($item->category->name), 'id' => $item->id, 'slug' => $item->slug ]) }}">
                                                <div class="image">
                                                    <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-100">
                                                </div>
                                                <div class="title">
                                                    <span>{{ $item->title }}</span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection

@section('js')


    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "articleSection": "{{$post->category->name}}",
        "keywords": [
            @foreach(explode(',', $post->keywords) as $key) <li><a href="#">{{ $key }}</a></li>
            @endforeach
        ],
        "genre": "news",
        "inLanguage": "tr-TR",
        "typicalAgeRange": "{{$post->id}}",
        "headline": "{{$post->title}}",
        "alternativeHeadline": "{{$post->title}}",
        "wordCount": {{ str_word_count($post->detail, 0) }},
        "image": [
            {
                "@type": "ImageObject",
                "url": "{{$post->image}}",
                "height": 675,
                "width": 1200
            }
        ],
        "datePublished": "{{$post->created_at}}",
        "dateModified": "{{$post->uploated_at}}",
        "description": "{{ $post->short_detail }}",
        "articleBody": "{!! strip_tags($post->detail) !!}",
        "author": {
            "@type": "Thing",
            "name": "sonsayfa.com"
        },
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}"
        },
        "publisher": {
            "@type": "Organization",
            "name": "sonsayfa.com",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ route('frontend.index') }}{{ $post->image }}",
                "width": "300",
                "height": "60"
            }
        }
    }
</script>
@endsection

