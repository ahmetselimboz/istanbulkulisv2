@if ($modules[0]['publish'] == 0)

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Haberler</li>
            </ol>
        </nav>
    </div>

    <section class="section headlines">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="left-headline">
                        @if ($modules[0]['publish'] == 0)
                            <div class="main-slider">
                                <div class="content">
                                    <div class="swiper-container js-site-slide" data-slide-type="main">
                                        <div class="swiper-wrapper">
                                            @foreach ($slides as $key => $slide)
                                                @if ($key == 6 and !empty($id28['code']) and $id28['publish'] == 0)
                                                    {!! $id28['code'] !!}
                                                @elseif($key == 10 and !empty($id29['code']) and $id29['publish'] == 0)
                                                    {!! $id29['code'] !!}
                                                @elseif($key == 14 and !empty($id30['code']) and $id30['publish'] == 0)
                                                    {!! $id30['code'] !!}
                                                @else
                                                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($slide->category->name), 'id' => $slide->id, 'slug' => $slide->slug]) }}"
                                                        class="swiper-slide">
                                                        <img src="@if ($slide->id < 221) {{ $slide->image }} @else {{ $slide->image_main }} @endif "
                                                            alt="{{ $slide->title }}">
                                                        @if ($slide->mtitle == 0)
                                                            <div class="info">
                                                                <span class="title">{{ $slide->title }}</span>
                                                                <span
                                                                    class="sub-title">{{ $slide->short_custom }}</span>
                                                            </div>
                                                        @endif
                                                    </a>
                                                @endif
                                            @endforeach

                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 d-block d-sm-none">
                    <section class="section exchange mobile-exchange mb-3">
                        <div class="container">
                            <div class="content">

                                {{-- Dolar --}}
                                <div class="item {{ $trends['USD'] ?? '' }}">
                                    <div class="status">
                                        <img src="{{ asset('frontend/sonsayfa/img/exchange-' . ($trends['USD'] ?? 'up') . '.png') }}"
                                            alt="status">
                                    </div>
                                    <div class="detail">
                                        <span
                                            class="title">{{ $exchange['currencies']['USD']['name'] ?? 'USD' }}</span>
                                        <span
                                            class="value">{{ $exchange ? number_format($exchange['currencies']['USD']['selling'], 2, ',', '.') : '-' }}</span>
                                    </div>
                                </div>

                                {{-- Euro --}}
                                <div class="item {{ $trends['EUR'] ?? '' }}">
                                    <div class="status">
                                        <img src="{{ asset('frontend/sonsayfa/img/exchange-' . ($trends['EUR'] ?? 'up') . '.png') }}"
                                            alt="status">
                                    </div>
                                    <div class="detail">
                                        <span
                                            class="title">{{ $exchange['currencies']['EUR']['name'] ?? 'EUR' }}</span>
                                        <span
                                            class="value">{{ $exchange ? number_format($exchange['currencies']['EUR']['selling'], 2, ',', '.') : '-' }}</span>
                                    </div>
                                </div>

                                {{-- Gram Alt覺n --}}
                                <div class="item {{ $trends['GA'] ?? '' }}">
                                    <div class="status">
                                        <img src="{{ asset('frontend/sonsayfa/img/exchange-' . ($trends['GA'] ?? 'up') . '.png') }}"
                                            alt="status">
                                    </div>
                                    <div class="detail">
                                        <span class="title">{{ $exchange['gold']['name'] ?? 'Gram Altın' }}</span>
                                        <span class="value">{{ $exchange['gold']['sell'] ?? '-' }}</span>
                                    </div>
                                </div>

                                {{-- BIST 100 --}}
                                <div class="item {{ $trends['XU100'] ?? '' }}">
                                    <div class="status">
                                        <img src="{{ asset('frontend/sonsayfa/img/exchange-' . ($trends['XU100'] ?? 'up') . '.png') }}"
                                            alt="status">
                                    </div>
                                    <div class="detail">
                                        <span class="title">BIST 100</span>
                                        <span
                                            class="value">{{ $exchange ? number_format($exchange['borsaIstanbul'], 3, ',', '.') : '-' }}</span>
                                    </div>
                                </div>

                                {{-- Bitcoin --}}
                                <div class="item {{ $trends['BTC'] ?? '' }} mobile-hidden">
                                    <div class="status">
                                        <img src="{{ asset('frontend/sonsayfa/img/exchange-' . ($trends['BTC'] ?? 'up') . '.png') }}"
                                            alt="status">
                                    </div>
                                    <div class="detail">
                                        <span class="title">Bitcoin</span>
                                        <span class="value">{{ $exchange['coin'] ?? '-' }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
                <style>
                    .main-author-box {
                        background: url("/uploads/white.jpg");
                        background-size: cover;
                        transition: all .1s ease-in-out;
                        box-shadow: 0 0 0px 0px #00000040;
                        overflow: hidden;


                    }

                    .main-author-box:hover {

                        box-shadow: 0 0 10px 1px #00000020;
                    }

                    .main-author-box img {
                        position: absolute;
                        bottom: 0;
                        right: 25px;
                        width: 140px;
                        height: auto;
                        object-fit: cover;

                    }

                    .main-author-box span {
                        color: #ef1a1a;
                        font-family: "HeronSans";
                        font-weight: 700;
                        font-size: 28px;

                    }

                    .main-author-box h3 {

                        font-family: "HeronSans";
                        font-weight: 600;
                        font-size: 30px;
                        color: #000;
                        display: -webkit-box;
                        /* kutu modeli */
                        -webkit-line-clamp: 2;
                        /* maksimum 2 satır */
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                        /* taşanı gizle */
                        text-overflow: ellipsis;

                    }
                </style>
                <div class="col-12 col-md-4">
                    <div class="right-headline">
                        <div class="row">
                            <div class="col-6 col-md-12">
                                <a href="{{ $general->author_link }}"
                                    class="item mb-4  main-author-box d-flex flex-column justify-content-between position-relative">

                                    <div class="row  align-items-center justify-content-start mt-1 px-4 pt-4">

                                        <h3>{{ $general->author_title }}</h3>
                                    </div>
                                    <div class="d-flex flex-column  align-items-start justify-content-end  px-4 pb-4">
                                        <span class="px-4">{{ $general->author_name }}</span>

                                        <span class="px-4">{{ $general->author_surname }}</span>
                                    </div>
                                    <img src="{{ '/uploads/' . $general->author_image }}" class="img-fluid" />
                                </a>
                            </div>
                            @foreach ($minislides->take(1) as $mini)
                                <div class="col-6 col-md-12">
                                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($mini->category->name), 'id' => $mini->id, 'slug' => $mini->slug]) }}"
                                        class="item mb-4 shadow-sm">
                                        <div class="image">
                                            <img src="{{ $mini->image }}" alt="{{ $mini->title }}" class="w-100">
                                        </div>
                                        <div class="title">
                                            <span>{{ $mini->title }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
