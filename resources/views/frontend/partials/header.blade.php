<header class="header">
    <div class="container d-flex">
        <div class="logo">
            <a href="{{ route('frontend.index') }}" class="">
                <img src="/uploads/{{ $general->site_logo }}" alt="{{ $general->site_title }}">
            </a>
        </div>
        <div class="menu">
            <ul>
                @foreach ($categories as $category)
                    <li class="d-none d-sm-inline">
                        <a
                            href="{{ route('frontend.categoryslug', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                    </li>
                @endforeach

                <li>
                    <a href="#" class="icon-menu" data-toggle="modal" data-target="#mainModal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #1a1b30;
                                    }
                                </style>
                            </defs>
                            <g id="Layer_2" data-name="Layer 2">
                                <g id="Layer_1-2" data-name="Layer 1">
                                    <path class="cls-1"
                                        d="M16.71,2.57H9A1.29,1.29,0,1,1,9,0h7.71a1.29,1.29,0,1,1,0,2.57Z" />
                                    <path class="cls-1"
                                        d="M16.71,10.29H1.29a1.29,1.29,0,1,1,0-2.58H16.71a1.29,1.29,0,0,1,0,2.58Z" />
                                    <path class="cls-1"
                                        d="M16.71,18H1.29a1.29,1.29,0,1,1,0-2.57H16.71a1.29,1.29,0,1,1,0,2.57Z" />
                                </g>
                            </g>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</header>




<div class="modal fade header-modal" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container d-none d-sm-block">
                <div class="modal-header">
                    <header class="header">
                        <div class="container d-flex px-0">
                            <div class="logo">
                                <a href="{{ route('frontend.index') }}">
                                    <img src="/uploads/{{ $general->site_menu_logo }}" alt="{{ $general->site_title }}">
                                </a>
                            </div>
                            <div class="menu">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li class="d-none d-sm-inline"><a
                                                href="{{ route('frontend.categoryslug', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <a href="{{ route('frontend.search') }}" class="icon-search" name="search"
                                            type="button" class="close" data-dismiss="modal">
                                            <svg id="Icons" height="512" viewBox="0 0 64 64" width="512"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="m4.59 59.41a2 2 0 0 0 2.83 0l24.58-24.58 24.59 24.58a2 2 0 0 0 2.83-2.83l-24.59-24.58 24.58-24.59a2 2 0 0 0 -2.83-2.83l-24.58 24.59-24.59-24.58a2 2 0 0 0 -2.82 2.82l24.58 24.59-24.58 24.59a2 2 0 0 0 0 2.82z" />
                                            </svg>
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
                            <input type="text" class="form-control js-control-input" placeholder="Haber ara...">
                            <div class="input-group-append">
                                <button type="reset" class="btn">
                                    ARAMA
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 469.96 256.73">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: #949494;
                                                }
                                            </style>
                                        </defs>
                                        <g id="Layer_2" data-name="Layer 2">
                                            <g id="svg10654">
                                                <g id="layer1">
                                                    <path id="path9413" class="cls-1"
                                                        d="M22.34,149.62H397.09l-70.21,70.21C306.71,240,337,270.25,357.13,250.08l63.94-64,42.68-42.75a21.32,21.32,0,0,0,0-30.08L357.13,6.46A21.32,21.32,0,0,0,341.67,0C322.47,0,313,23.39,326.88,36.71l70.37,70.21h-376c-29.57,1.46-27.36,44.18,1.11,42.71Z" />
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </div>
                            <div class="clear-input js-clear-input" style="display: none;">
                                <svg id="Icons" height="512" viewBox="0 0 64 64" width="512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m4.59 59.41a2 2 0 0 0 2.83 0l24.58-24.58 24.59 24.58a2 2 0 0 0 2.83-2.83l-24.59-24.58 24.58-24.59a2 2 0 0 0 -2.83-2.83l-24.58 24.59-24.59-24.58a2 2 0 0 0 -2.82 2.82l24.58 24.59-24.58 24.59a2 2 0 0 0 0 2.82z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="menu">
                        <div class="row">
                            @foreach ($categories_other as $key => $c_other)
                                <div class="col">
                                    <ul>
                                        <li><a href="{{ route('frontend.categoryslug', ['slug' => $c_other->slug]) }}"
                                                class="title">{{ $c_other->name }}</a></li>
                                        @foreach ($c_other->subCategory($c_other->id) as $sub)
                                            <li><a
                                                    href="{{ route('frontend.categoryslug', ['slug' => $sub->slug]) }}">{{ $sub->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <style>
                        .link-white {
                            color: #fff !important;
                            font-weight: 400 !important;
                            font-size: 16px !important;
                            padding: 0 !important;
                            display: table !important;
                        }
                    </style>
                    <div class="menu under-menu m-0 d-none d-sm-block">
                        <ul>
                            @foreach ($pages as $page)
                                <li><a
                                        href="{{ route('frontend.page', ['id' => $page->id, 'slug' => $page->slug]) }}">{{ $page->title }}</a>
                                </li>
                            @endforeach
                            <li><a href="{{ route('frontend.articleAll') }}" class="link-white">Tüm Makaleler</a></li>
                            <li class="text-white">Hava Durumu</li>
                            <li class="text-white">Döviz Kurları</li>
                            <li class="text-white">Gazeteler</li>
                            <li class="text-white">Yol Durumu</li>
                            <li class="text-white">Namaz Vakitleri</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container d-block d-sm-none px-0">
                <div class="mobile-search">
                    <div class="input-group">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Aramak için tıklayın">

                            <a href="#" class="mobile-close" data-dismiss="modal">
                                <svg id="Icons" height="512" viewBox="0 0 64 64" width="512"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m4.59 59.41a2 2 0 0 0 2.83 0l24.58-24.58 24.59 24.58a2 2 0 0 0 2.83-2.83l-24.59-24.58 24.58-24.59a2 2 0 0 0 -2.83-2.83l-24.58 24.59-24.59-24.58a2 2 0 0 0 -2.82 2.82l24.58 24.59-24.58 24.59a2 2 0 0 0 0 2.82z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <ul class="mobile-menu">
                    <li class="dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown1" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manşet <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170.81 298.75">
                                <g id="Layer_2" data-name="Layer 2">
                                    <g id="Layer_1-2" data-name="Layer 1">
                                        <g id="_15" data-name=" 15">
                                            <path
                                                d="M21.46,298.75A21.33,21.33,0,0,1,6.31,262.27L119.38,149.42,6.31,36.57A21.42,21.42,0,0,1,36.6,6.27l128,128a21.32,21.32,0,0,1,0,30.08l-128,128A21.27,21.27,0,0,1,21.46,298.75Z" />
                                        </g>
                                    </g>
                                </g>
                            </svg></a>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <a class="dropdown-item" href="#">Alt Manşet 1</a>
                            <a class="dropdown-item" href="#">Alt Manşet 2</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown2" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Koronavirüs <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170.81 298.75">
                                <g id="Layer_2" data-name="Layer 2">
                                    <g id="Layer_1-2" data-name="Layer 1">
                                        <g id="_15" data-name=" 15">
                                            <path
                                                d="M21.46,298.75A21.33,21.33,0,0,1,6.31,262.27L119.38,149.42,6.31,36.57A21.42,21.42,0,0,1,36.6,6.27l128,128a21.32,21.32,0,0,1,0,30.08l-128,128A21.27,21.27,0,0,1,21.46,298.75Z" />
                                        </g>
                                    </g>
                                </g>
                            </svg></a>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <a class="dropdown-item" href="#">Alt Manşet 1</a>
                            <a class="dropdown-item" href="#">Alt Manşet 2</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown3" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gündem <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170.81 298.75">
                                <g id="Layer_2" data-name="Layer 2">
                                    <g id="Layer_1-2" data-name="Layer 1">
                                        <g id="_15" data-name=" 15">
                                            <path
                                                d="M21.46,298.75A21.33,21.33,0,0,1,6.31,262.27L119.38,149.42,6.31,36.57A21.42,21.42,0,0,1,36.6,6.27l128,128a21.32,21.32,0,0,1,0,30.08l-128,128A21.27,21.27,0,0,1,21.46,298.75Z" />
                                        </g>
                                    </g>
                                </g>
                            </svg></a>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            <a class="dropdown-item" href="#">Alt Manşet 1</a>
                            <a class="dropdown-item" href="#">Alt Manşet 2</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown4" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dikkat Çekenler <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170.81 298.75">
                                <g id="Layer_2" data-name="Layer 2">
                                    <g id="Layer_1-2" data-name="Layer 1">
                                        <g id="_15" data-name=" 15">
                                            <path
                                                d="M21.46,298.75A21.33,21.33,0,0,1,6.31,262.27L119.38,149.42,6.31,36.57A21.42,21.42,0,0,1,36.6,6.27l128,128a21.32,21.32,0,0,1,0,30.08l-128,128A21.27,21.27,0,0,1,21.46,298.75Z" />
                                        </g>
                                    </g>
                                </g>
                            </svg></a>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                            <a class="dropdown-item" href="#">Alt Manşet 1</a>
                            <a class="dropdown-item" href="#">Alt Manşet 2</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>




@if ($id1['publish'] == 0)
    <div class="container my-2">
        <div class="text-center">
            {!! $id1['code'] !!}
        </div>
    </div>
@endif
