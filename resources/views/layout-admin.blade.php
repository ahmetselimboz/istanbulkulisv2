<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>Yönetim Paneli</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- waves.css -->
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/icon/feather/css/feather.css') }}">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome-n.min.css') }}">
    <!-- Chartlist chart css -->
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">

    @yield('css')

</head>

<body>
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>
<!-- [ Pre-loader ] end -->
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        <!-- [ Header ] start -->
        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a href="index.html">
                        <img class="img-fluid" src="{{ asset('admin//assets/images/logo.png') }}"
                             style="max-width: 50%!important;"/>
                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu icon-toggle-right"></i>
                    </a>
                    <a class="mobile-options waves-effect waves-light">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.index') }}" class="waves-effect waves-light" target="_blank">
                                <i class="fa fa-laptop" title="Siteyi Görüntüle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('post.create') }}" class="waves-effect waves-light">
                                <i class="fa fa-plus" title="Haber Ekle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('page.create') }}" class="waves-effect waves-light">
                                <i class="fa fa-file" title="Sayfa Ekle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('runjson') }}" class="waves-effect waves-light">
                                <i class="fa fa-download" title="Json Güncelle"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('clear-cache') }}" class="waves-effect waves-light">
                                <i class="fa fa-spinner" title="Cache temizle"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="feather icon-bell"></i>
                                    @if(isset($push_count) and $push_count>0)
                                        <span class="badge bg-c-red">{{$push_count}}</span>
                                    @endif
                                </div>
                                @if(isset($push_count) and $push_count>0)
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Bildirimler</h6>
                                            <label class="label label-danger">Yeni</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="notification-msg"><a href="{{ route('comment.index') }}" class="bg-transparent"> Onay bekleyen <b>{{ $comment_count }}</b> yorum var </a></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="notification-msg"><a href="{{ route('article.index') }}" class="bg-transparent"> Onay bekleyen <b>{{ $article_count }}</b> makale var </a></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                @else
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Bildirimler</h6>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="notification-msg"> Onay bekleyen işlem bulunmuyor. </p>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                @endif
                            </div>
                        </li>
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="/uploads/{{ Auth::user()->avatar }} " class="img-radius"
                                         alt="User-Profile-Image">
                                    <span> {{ Auth::user()->name }} </span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu"
                                    data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    @if(Auth::user()->status=="1")
                                        <li>
                                            <a href="{{ route('user.edit', Auth::user()->id) }} ">
                                                <i class="feather icon-user"></i> Profillim
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::user()->status=="1")
                                        <li>
                                            <a href="{{ route('logoutt') }}">
                                                <i class="feather icon-log-out"></i> Çıkış
                                            </a>
                                        </li>
                                    @elseif(Auth::user()->status=="3")
                                        <li>
                                            <a href="{{ route('editor.logout') }}">
                                                <i class="feather icon-log-out"></i> Çıkış
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <!-- [ navigation menu ] start -->
                <nav class="pcoded-navbar">
                    <div class="nav-list">
                        <div class="pcoded-inner-navbar main-menu">
                            @if(Auth::user()->status=="3")
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-newspaper"></i>
                                        </span>
                                            <span class="pcoded-mtext">Haber Yönetimi</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{ route('category.create') }}"
                                                   class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kategori Ekle</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('category.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kategorileri Listele</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('post.create') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Haber Ekle</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('post.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Haberleri Listele</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @endif


                            @if(Auth::user()->status=="1")
                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="active">
                                            <a href="{{ route('manage.index') }}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-home"></i>
                                          </span>
                                                <span class="pcoded-mtext">Yönetim Anasayfa</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-user"></i>
                                        </span>
                                                <span class="pcoded-mtext">Kullanıcı Yönetimi</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="{{ route('user.create') }}" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Kullanıcı Ekle</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('user.index') }}" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Kullanıcıları Listele</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-newspaper"></i>
                                        </span>
                                            <span class="pcoded-mtext">Haber Yönetimi</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{ route('category.create') }}"
                                                   class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kategori Ekle</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('category.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kategorileri Listele</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('post.create') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Haber Ekle</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('post.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Haberleri Listele</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-video"></i>
                                        </span>
                                                <span class="pcoded-mtext">Video Galeri Yönetimi</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="{{ route('videogallerycategory.create') }}"
                                                       class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Kategori Ekle</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('videogallerycategory.index') }}"
                                                       class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Kategori Listele</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('videogallery.create') }}"
                                                       class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Video Galeri Ekle</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('videogallery.index') }}"
                                                       class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Video Galerileri Listele</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-image"></i>
                                        </span>
                                                <span class="pcoded-mtext">Foto Galeri Yönetimi</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="{{ route('photogallerycategory.create') }}"
                                                       class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Kategori Ekle</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('photogallerycategory.index') }}"
                                                       class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Kategori Listele</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('photogallery.create') }}"
                                                       class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Foto Galeri Ekle</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('photogallery.index') }}"
                                                       class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Foto Galerileri Listele</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>



                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fa fa-shield-alt"></i></span>
                                            <span class="pcoded-mtext">Modüler Sistem</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{ route('modul.index') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Modül Ayarları</span>
                                                </a>
                                            </li>
                                            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark"><span class="pcoded-mtext">Makale Yönetimi</span></a>
                                                <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="{{ route('article.create') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Makale Ekle</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="{{ route('article.index') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Makaleleri Listele</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark"><span class="pcoded-mtext">Sayfa Yönetimi</span></a>
                                                <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="{{ route('page.create') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Sayfa Ekle</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="{{ route('page.index') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Sayfaları Listele</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark"><span class="pcoded-mtext">Yorum Yönetimi</span></a>
                                                <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="{{ route('comment.index') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Yorumları Listele</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark"><span class="pcoded-mtext">Anket Yönetimi</span></a>
                                                <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="{{ route('survey.create') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Anket Ekle</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="{{ route('survey.index') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Anket Listele</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark"><span class="pcoded-mtext">Reklam Yönetimi</span></a>
                                                <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="{{ route('advert.index') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Reklamları Listele</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="{{ route('advert.custom') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Reklam Kod Oluşturucu</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark"><span class="pcoded-mtext">Bot Yönetimi</span></a>
                                                <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="{{ route('bot', "haberler") }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Haberler Botu<span class="badge badge-info float-right">Çalıştır</span> </span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="{{ route('bot', "ensonhaber") }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Ensonhaber Botu<span class="badge badge-info float-right">Çalıştır</span></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark"><span class="pcoded-mtext">Taziye Yönetimi</span></a>
                                                <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="{{ route('ceremony.create') }}"
                                                           class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Taziye Ekle</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="{{ route('ceremony.index') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Taziye Listele</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark"><span class="pcoded-mtext">Kaynak Yönetimi</span></a>
                                                <ul class="pcoded-submenu">
                                                    <li class="">
                                                        <a href="{{ route('source.create') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Kaynak Ekle</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="{{ route('source.index') }}" class="waves-effect waves-dark">
                                                            <span class="pcoded-mtext">Kaynak Listele</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>



                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                          <i class="fa fa-paint-brush"></i>
                                        </span>
                                            <span class="pcoded-mtext">Tema Ayarları</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{ route('themeoptions') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Renk ve Font</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{ route('sidebar.sortable') }}"
                                                   class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Şablon Yapısı / Sırlama</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="pcoded-hasmenu">
                                            <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="fa fa-language"></i></span>
                                                <span class="pcoded-mtext">Dil ve Çeviri Yönetimi</span>
                                            </a>
                                            <ul class="pcoded-submenu">
                                                <li class="">
                                                    <a href="{{ route('language.index') }}" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Dil Listesi</span>
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('language.index') }}" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Sabit Çeviri</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>

                                <ul class="pcoded-item pcoded-left-item">
                                    <li>
                                        <a href="{{ route('message.index') }}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-envelope"></i>
                                          </span>
                                            <span class="pcoded-mtext">İletişim Talepleri</span>
                                        </a>
                                    </li>
                                </ul>




                                <ul class="pcoded-item pcoded-left-item">
                                    <li>
                                        <a href="{{ route('generalsetting.edit') }}" class="waves-effect waves-dark">
                                          <span class="pcoded-micon">
                                            <i class="fa fa-cog"></i>
                                          </span>
                                            <span class="pcoded-mtext">Genel Ayarlar</span>
                                        </a>
                                    </li>
                                </ul>
                            @endif


                        </div>
                    </div>
                </nav>
                <!-- [ navigation menu ] end -->
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="row">
                                    <div class="col-lg-12">
                                        @yield('content')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>Internet Explorer'ın eski bir sürümünü kullanıyorsunuz,
        <br> lütfen bu web sitesine erişmek için aşağıdaki web tarayıcılarından herhangi birine yükseltin.

    </p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="{{ asset('admin/assets/images/browser/chrome.png') }}" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="{{ asset('admin/assets/images/browser/firefox.png') }}" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="{{ asset('admin/assets/images/browser/opera.png') }}" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="{{ asset('admin/assets/images/browser/safari.png') }}" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="{{ asset('admin/assets/images/browser/ie.png') }}" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Rahatsızlıktan dolayı özür dileriz!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{ asset('admin/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>


<!-- Custom js -->
<script src="{{ asset('admin/assets/js/pcoded.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/vertical/vertical-layout.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin/assets/js/script.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>


<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
@include('sweetalert::alert')


@yield('js')

</body>


</html>
