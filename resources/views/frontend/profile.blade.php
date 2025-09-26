@extends('layout-frontend')

@section('meta')
    <title>Profilim: {{ $profile->name }}</title>
@endsection

@section('css')
@endsection

@section('content')

    <section class="banner-parallax overlay-dark" data-image-src="images/inner-banner.jpg" data-parallax="scroll">
        <div class="inner-banner">
            <h3>{{ $profile->name }}</h3>
        </div>
    </section>

    <div class="theme-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="content">
                        <div class="post-widget p-30 light-shadow white-bg">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="product-slider" id="product-slider">
                                        <ul id="product-slides" class="product-slides">
                                            <li><img src="/uploads/{{ $profile->avatar }}" alt=""></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="product-info-holder">
                                        <h3>{{ $profile->name }}</h3>
                                        <p>{{ $profile->about }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- review tabs -->
                        <div class="review-tabs-holder post-widget light-shadow p-30 white-bg">
                            <div class="horizontal-tabs-widget reviews-tabs">
                                <ul class="theme-tab-navs">
                                    <li class="active"><a href="#personel" data-toggle="tab">Kişisel Bilgiler</a></li>
                                    @if($profile->status==2)
                                    <li><a href="#author" data-toggle="tab">Makaleler</a></li>
                                    <li><a href="#articlesubmit" data-toggle="tab">Makale Gönder</a></li>
                                    @endif
                                </ul>

                                <!-- Tab panes -->
                                <div class="horizontal-tab-content tab-content">
                                    <div class="tab-pane fade active in" id="personel">
                                        <div class="clearfix mb-20"></div>
                                        <div class="card-block">
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Şifre</label>
                                                    <div class="col-sm-10">
                                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                                                        @if ($errors->has('password'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Şifre Tekrar</label>
                                                    <div class="col-sm-10">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Biyografi</label>
                                                    <div class="col-sm-10">
                                                        <textarea rows="3" cols="5" class="form-control" placeholder="" name="about" >{{ $profile->about }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Facebook</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-normal" placeholder="" name="fb" value="{{ $profile->fb }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Twitter</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-normal" placeholder="" name="tw" value="{{ $profile->tw }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">İnstagram</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-normal" placeholder="" name="in" value="{{ $profile->in }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Youtube</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-normal" placeholder="" name="yt" value="{{ $profile->yt }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Linkedin</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-normal" placeholder="" name="linkedin" value="{{ $profile->linkedin }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Profil Fotoğrafı</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" class="form-control form-control-normal" placeholder="" name="avatar">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Mevcut Fotoğrafı</label>
                                                    <div class="col-sm-10">
                                                        <img src="/uploads/{{ $profile->avatar }}" alt="" style="width: 100px;">
                                                    </div>
                                                </div>
                                                <div class="text-right m-t-20">
                                                    <button class="btn btn-primary btn-block">Güncelle</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                    @if($profile->status==2)
                                        <div class="tab-pane fade" id="author">
                                            <div class="reviews-product">
                                                @foreach($articles as $article)
                                                    <ul>
                                                        <li style="list-style: none;"> @if($article->publish==0) <i class="fa fa-check"></i> @else <i class="fa fa-close"></i> (Onay bekliyor) @endif <a href="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug, ]) }}" class="read-more">{{ $article->title }}</a> </li>
                                                    </ul>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="articlesubmit">
                                            <div class="reviews-product">
                                                <h4 class="comment-reply-title">Makale Gönder</h4>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                <form role="form" class="ts-form" action="{{ route('article.submit', $profile->id) }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <!-- Col end -->
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="title" placeholder="Makale Başlığı" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea class="form-control msg-box" name="detail" placeholder="Makale içeriği" rows="5" required=""></textarea>
                                                            </div>
                                                            <div class="alert alert-info" role="alert">
                                                                Makaleniz onaylanması sonrası sitede ve profilinzde görünecektir.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <button class="comments-btn btn btn-primary" type="submit">Gönder</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
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
