    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container">
                <div class="modal-header">
                    <header class="header">
                        <div class="container d-flex px-0">
                            <div class="logo">
                                <a href="{{ route('frontend.index') }}">
                                    <img  src="/uploads/{{ $general->site_logo }}" alt="{{ $general->site_title }}">
                                </a>
                            </div>
                            <div class="menu">
                                <ul>
                                    <li class="d-none d-sm-inline"><a href="" class="active">SON DAKİKA</a></li>
                                    @foreach($categories as $category)
                                        <li class="d-none d-sm-inline">
                                            <a href="{{ route('frontend.category', ['id' => $category->id, 'slug' => $category->slug, ]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <a href="#" class="icon-search" data-toggle="modal" data-target="#myModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 359.91 359.99"><defs><style>.cls-1{fill:#1a1b30;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="_2-Magnifying_Glass" data-name="2-Magnifying Glass"><path class="cls-1" d="M353.66,323.57l-69.18-69.18A158.4,158.4,0,0,0,158.43,0,157.48,157.48,0,0,0,46.35,46.43c-61.8,61.8-61.8,162.37,0,224.16a158.15,158.15,0,0,0,208,14l69.19,69.19a21.33,21.33,0,1,0,30.16-30.17ZM76.52,240.43a115.85,115.85,0,1,1,81.91,33.93A116,116,0,0,1,76.52,240.43Z"/></g></g></g></svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="icon-menu" data-toggle="modal" data-target="#myModal">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><defs><style>.cls-1{fill:#1a1b30;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path class="cls-1" d="M16.71,2.57H9A1.29,1.29,0,1,1,9,0h7.71a1.29,1.29,0,1,1,0,2.57Z"/><path class="cls-1" d="M16.71,10.29H1.29a1.29,1.29,0,1,1,0-2.58H16.71a1.29,1.29,0,0,1,0,2.58Z"/><path class="cls-1" d="M16.71,18H1.29a1.29,1.29,0,1,1,0-2.57H16.71a1.29,1.29,0,1,1,0,2.57Z"/></g></g></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                <div class="modal-body">
                    <div class="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Haber ara...">
                            <div class="input-group-append">
                                <button type="reset" class="btn">
                                    ARAMA
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 469.96 256.73"><defs><style>.cls-1{fill:#949494;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="svg10654"><g id="layer1"><path id="path9413" class="cls-1" d="M22.34,149.62H397.09l-70.21,70.21C306.71,240,337,270.25,357.13,250.08l63.94-64,42.68-42.75a21.32,21.32,0,0,0,0-30.08L357.13,6.46A21.32,21.32,0,0,0,341.67,0C322.47,0,313,23.39,326.88,36.71l70.37,70.21h-376c-29.57,1.46-27.36,44.18,1.11,42.71Z"/></g></g></g></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="menu popular-search-list m-0 d-none d-sm-block">
                        <div class="title">POPÜLER ARAMALAR</div>
                        <ul>
                            <li><a href="">Künye</a></li>
                            <li><a href="">Reklam</a></li>
                            <li><a href="">İletişim</a></li>
                            <li><a href="">Gizlilik Politikası</a></li>
                            <li><a href="">Hava Durumu</a></li>
                            <li><a href="">Döviz Kurları</a></li>
                            <li><a href="">Gazeteler</a></li>
                            <li><a href="">Yol Durumu</a></li>
                            <li><a href="">Namaz Vakitleri</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{------------------------------------------------------}}

{{--<div class="header-wrap">--}}

{{--    <!-- Top Bar -->--}}
{{--    <div class="top-bar">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}

{{--                <!-- Top Left Nav -->--}}
{{--                <div class="col-sm-6 col-xs-6">--}}
{{--                    <ul class="top-left">--}}
{{--                        <li><i class="fa fa-phone"></i>{{ $general->site_phone }}</li>--}}
{{--                        <li><i class="fa fa-envelope-o"></i>{{ $general->site_mail }}</li>--}}
{{--                        <li><a href="{{ route('frontend.photogalleryall') }}"> <i class="fa fa-camera"></i>Foto Galeri </a></li>--}}
{{--                        <li><a href="{{ route('frontend.videoall') }}"> <i class="fa fa-play"></i>Video Galeri </a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <!-- Top Left Nav -->--}}



{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Top Bar -->--}}

{{--    <!-- Navigation Holder -->--}}
{{--    <header class="header">--}}
{{--        <div class="container">--}}
{{--            <div class="nav-holder">--}}

{{--                <!-- Logo Holder -->--}}
{{--                <div class="logo-holder">--}}
{{--                    <a href="{{ route('frontend.index') }}" class="">--}}
{{--                        <img src="/uploads/{{ $general->site_logo }}" alt="{{ $general->site_title }}">--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <!-- Logo Holder -->--}}

{{--                <!-- Navigation -->--}}
{{--                <div class="cr-navigation">--}}

{{--                    <!-- Navbar -->--}}
{{--                    <nav class="cr-nav">--}}
{{--                        <ul>--}}
{{--                            @foreach($categories as $category)--}}
{{--                                <li>--}}
{{--                                    <a href="{{ route('frontend.category', ['id' => $category->id, 'slug' => $category->slug, ]) }}">{{ $category->name }}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                    <!-- Navbar -->--}}

{{--                    <ul class="cr-add-nav">--}}
{{--                        <li><a href="#" class="icon-search md-trigger" data-modal="search-popup"></a></li>--}}
{{--                        <li><a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a></li>--}}
{{--                    </ul>--}}

{{--                </div>--}}
{{--                <!-- Navigation -->--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}
{{--    <!-- Navigation Holder -->--}}

{{--</div>--}}