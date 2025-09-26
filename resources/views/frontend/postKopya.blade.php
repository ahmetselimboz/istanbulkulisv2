@extends('layout-frontend')


@section('meta')
<title>{{ $post->title }}</title>
    <meta name="description" content="{{ str_limit(html_entity_decode($post->detail), $limit='145', $end='') }}">
    <meta name="keywords" content="@if($post->keywords) @foreach(explode(',', $post->keywords) as $key){{ $key }},@endforeach @endif">

    <link rel="canonical" href="{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" />

    <link rel="amphtml" href="{{ route('frontend.postamp', ['id' => $post->id, 'slug' => $post->slug ]) }}">

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
    <style>
        .cTags{
            border: 1px solid #e7e7e7;
            padding: 1px 10px;
            border-radius: 36px;
            -webkit-border-radius: 36px;
            -ms-border-radius: 36px;
            line-height: 36px;
            list-style: none!important;
            float: left;
            margin-right: 10px;
        }
        .cTags:hover{
            background: red;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <section class="single-post-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="ts-grid-box content-wrapper single-post">
                        <div class="entry-header">
                            <h2 class="post-title lg">{{ $post->title }}</h2>
                            <ul class="post-meta-info">
                                <li>
                                    <a href="#" class="post-cat ts-yellow-bg">
                                        @if(isset($post->category->name))
                                            {{ $post->category->name }}
                                        @else
                                            Kategorisiz/Silinmiş
                                        @endif
                                    </a>
                                </li>
                                @if(isset($post->author))
                                    <li class="author">
                                        <a href="#">
                                            <img src="{{ $post->author->avatar }}" alt=""> {{ $post->author->name }}
                                        </a>
                                    </li>
                                @endif
                                <li><i class="fa fa-clock-o"></i>   {{ date('d-m-Y', strtotime($post->created_at)) }} </li>
                                <li class="active"><i class="fa fa-eye"></i>{{ views($post)->count() }}</li>
                                @if(isset($post->photogallery->id))<li><a href="{{ route('frontend.photogallery', ['id' => $post->photogallery->id, 'slug' => $post->photogallery->slug, ]) }}" target="_blank"><i class="fa fa-camera" style="font-size: 18px; color: #165789;"></i></a></li>@endif
                                @if(isset($post->videogallery->id))<li><a href="{{ route('frontend.video', ['id' => $post->videogallery->id, 'slug' => $post->videogallery->slug, ]) }}" target="_blank"><i class="fa fa-video-camera"  style="font-size: 18px; color: #165789;"></i></a></li>@endif
                            </ul>
                        </div>
                        <!-- single post header end-->
                        <div class="post-content-area">
                            <div class="post-media post-featured-image">
                                @if($id7['publish']==0)
                                    <div class="banner-img text-center">
                                        {!! $id7['code'] !!}
                                    </div>
                                @endif

                                    <img src="{{ $post->image }}" class="img-fluid" alt="{{ $post->title }}">

                                @if($id8['publish']==0)
                                    <div class="banner-img text-center">
                                       {!! $id8['code'] !!}
                                    </div>
                                @endif
                            </div>
                            <div class="entry-content">

                                <ul class="footer-social mt-15">
                                    <li class="ts-facebook">
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}">
                                            <i class="fa fa-facebook"></i>
                                            <span>Faceboook</span>
                                        </a>
                                    </li>
                                    <li class="ts-google-plus">
                                        <a href="https://plus.google.com/share?url={{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}">
                                            <i class="fa fa-google-plus"></i>
                                            <span>Google Plus</span>
                                        </a>
                                    </li>
                                    <li class="ts-twitter">
                                        <a href="https://twitter.com/home?status={{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}">
                                            <i class="fa fa-twitter"></i>
                                            <span>Twitter</span>
                                        </a>
                                    </li>
                                    <li class="ts-linkedin">
                                        <a href="https://api.whatsapp.com/send?text={!! $post->title !!} - {{ route('frontend.post', ["id" => $post->id, "slug" => $post->slug]) }}">
                                            <i class="fa fa-whatsapp"></i>
                                            <span>WhatsApp</span>
                                        </a>
                                    </li>
                                </ul>

                                <p>
                                    {!! $post->detail !!}
                                </p>

                                @if($id9['publish']==0)
                                    <div class="banner-img text-center mb-20">
                                        {!! $id9['code'] !!}
                                    </div>
                                @endif

                            </div>

                            @if(!empty($post->keywords))
                                <ul>
                                    @foreach(explode(',', $post->keywords) as $key)
                                        <li class="cTags"><a>{{ $key }}</a></li>
                                    @endforeach
                                </ul>
                                <div class="clearfix"></div>
                                <br>
                            @endif

                        </div>

                        @if($modules[7]['publish']==0)
                            @if(isset($post->author))
                                <div class="author-box">
                                    <img class="author-img" src="{{ $post->author->avatar }}" alt="{{ $post->author->name }}">
                                    <div class="author-info">
                                        <h4 class="author-name">{{ $post->author->name }}</h4>
                                        <div class="authors-social">
                                            <a href="{{ $post->author->tw }}" class="ts-twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="{{ $post->author->fb }}" class="ts-facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a href="{{ $post->author->gp }}" class="ts-google-plus">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a href="{{ $post->author->linkedin }}" class="ts-linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <p> {!! $post->author->about !!} </p>
                                    </div>
                                </div>
                            @endif
                        @endif


                        @if($modules[6]['publish']==0)
                            @if(isset($nextpost))
                                <div class="post-navigation clearfix">
                                    @if(isset($nextpost))
                                        <div class="post-next float-right">
                                            <a href="{{ route('frontend.post', ['id' => $nextpost->id, 'slug' => $nextpost->slug, ]) }}">
                                                <img src="/uploads/{{ $nextpost->image }}" alt="{{ $nextpost->title }}">
                                                <span>Sonraki Haber</span>
                                                <p> {{ $nextpost->title }}</p>
                                            </a>
                                        </div>
                                    @endif

                                    @if(isset($previouspost))
                                            <div class="post-previous float-left">
                                                <a href="{{ route('frontend.post', ['id' => $previouspost->id, 'slug' => $previouspost->slug, ]) }}">
                                                    <img src="/uploads/{{ $previouspost->image }}" alt="{{ $previouspost->title }}">
                                                    <span>Önceki Haber</span>
                                                    <p> {{ $previouspost->title }} </p>
                                                </a>
                                            </div>
                                    @endif
                                </div>
                            @endif
                        @endif
                    </div>





                    @if(Auth::check())
                        <div class="comments-form ts-grid-box">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h3 class="comment-reply-title">Yorum Gönder</h3>

                            <form role="form" class="ts-form" action="{{ route('comment.submit', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <!-- Col end -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control msg-box" name="comment" placeholder="Yorum Gönder" rows="5" required=""></textarea>
                                        </div>
                                        <div class="alert alert-info" role="alert">
                                            Lütfen rencide edici yorumlarda bulunmayınız. <br>
                                            Yapılan yorumlardan doğacak olan her türlü hukuki sonuç, yorum yapan kullanıcıyı bağlamaktadır.
                                        </div>
                                    </div>
                                </div>
                                    {!! Captcha::display($attributes = [], $options = ['lang'=> 'tr']) !!}
                                <div class="clearfix">
                                    <button class="comments-btn btn btn-primary" type="submit">Yorumla</button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="comments-form ts-grid-box">
                            <i class="fa fa-comment"></i> Yorum yazabilmek için üye olmalı yada üye girişi yapmalısınız
                            <br>
                            <a href="{{ route('login') }}">Giriş Yap</a> |
                            <a href="{{ route('register') }}">Kayıt Ol</a>
                        </div>
                    @endif




                    @if($id10['publish']==0)
                        <div class="banner-img text-center mb-30">
                            {!! $id10['code'] !!}
                        </div>
                    @endif

                    <div class="ts-grid-box mb-30">
                        <h2 class="ts-title">Yorumlar</h2>
                        @if($comments->count())
                        <div class="ts-grid-item">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="post-list-box ts-list-post-box ts-grid-content">
                                        @foreach($comments as $comment)
                                            <div class="post-content media">
                                                @if(isset($comment->author))
                                                <img class="d-flex" src="/uploads/{{ $comment->author->avatar }}" alt="{{ $comment->comment }}" style="max-width: 60px; max-height: 60px">
                                                @endif
                                                <div class="media-body align-self-center">
                                                    <h3 class="post-title">{{ $comment->comment }}</h3>
                                                    <span class="post-date-info"><i class="fa fa-clock-o"></i> {{ date('d-m-Y', strtotime($comment->created_at)) }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            Henüz hiç yorum yapılmamış
                        @endif
                    </div>
                </div>
                @include('frontend.sidebar')
            </div>
        </div>
    </section>


@endsection

@section('js')
    <script>
        $( document ).ready(function() {
            $(".entry-content img").addClass("img-fluid");
        });
    </script>
@endsection

