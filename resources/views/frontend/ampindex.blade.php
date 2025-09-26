@extends('layout-amp-frontend')

@section('meta')
    <title>{{ $general->site_title }}</title>
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
                        <a href="{{ route('frontend.amppost', ['categoryslug' => str_slug($slide->category->name), 'id' => $slide->id, 'slug' => $slide->slug ]) }}">
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

        <section class="section exchange mobile-exchange">
            <div class="container">
                <div class="content">
        
                    {{-- Dolar --}}
                    <div class="item {{ $trends['USD'] ?? '' }}">
                        <div class="status">
                            <amp-img width="16" height="16"
                                src="{{ asset('frontend/sonsayfa/img/exchange-' . ($trends['USD'] ?? 'up') . '.png') }}"
                                alt="{{ $trends['USD'] ?? 'up' }}">
                            </amp-img>
                        </div>
                        <div class="detail">
                            <span class="title">{{ $exchange["currencies"]["USD"]["name"] }}</span>
                            <span class="value">{{ number_format($exchange["currencies"]["USD"]["selling"], 2, ',', '.') }}</span>
                        </div>
                    </div>
        
                    {{-- Euro --}}
                    <div class="item {{ $trends['EUR'] ?? '' }}">
                        <div class="status">
                            <amp-img width="16" height="16"
                                src="{{ asset('frontend/sonsayfa/img/exchange-' . ($trends['EUR'] ?? 'up') . '.png') }}"
                                alt="{{ $trends['EUR'] ?? 'up' }}">
                            </amp-img>
                        </div>
                        <div class="detail">
                            <span class="title">{{ $exchange["currencies"]["EUR"]["name"] }}</span>
                            <span class="value">{{ number_format($exchange["currencies"]["EUR"]["selling"], 2, ',', '.') }}</span>
                        </div>
                    </div>
        
                    {{-- Gram Altın --}}
                    <div class="item {{ $trends['GA'] ?? '' }}">
                        <div class="status">
                            <amp-img width="16" height="16"
                                src="{{ asset('frontend/sonsayfa/img/exchange-' . ($trends['GA'] ?? 'up') . '.png') }}"
                                alt="{{ $trends['GA'] ?? 'up' }}">
                            </amp-img>
                        </div>
                        <div class="detail">
                            <span class="title">{{ $exchange["gold"]["name"] }}</span>
                            <span class="value">{{ $exchange["gold"]["sell"] }}</span>
                        </div>
                    </div>
        
                    {{-- BIST 100 --}}
                    <div class="item {{ $trends['XU100'] ?? '' }}">
                        <div class="status">
                            <amp-img width="16" height="16"
                                src="{{ asset('frontend/sonsayfa/img/exchange-' . ($trends['XU100'] ?? 'up') . '.png') }}"
                                alt="{{ $trends['XU100'] ?? 'up' }}">
                            </amp-img>
                        </div>
                        <div class="detail">
                            <span class="title">BIST 100</span>
                            <span class="value">{{ number_format($exchange["borsaIstanbul"], 3, ',', '.') }}</span>
                        </div>
                    </div>
        
                </div>
            </div>
        </section>


        <section class="section headlines">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="right-headline">
                            <div class="row">
                                @foreach($single_box_ones as $key => $st)
                                    @if($key==0 or $key==1)
                                        <div class="col-6 col-md-12">
                                            <a href="{{ route('frontend.amppost', ['categoryslug' => str_slug($st->category->name), 'id' => $st->id, 'slug' => $st->slug ]) }}" class="item mb-4 shadow-sm">
                                                <div class="image">
                                                    <amp-img alt="{{ $st->title }}" src="{{ $st->image }}" width="182" height="107" layout="responsive"></amp-img>
                                                </div>
                                                <div class="title">
                                                    <span>{{ $st->title }}</span>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section single-box">
            <div class="container">
                <div class="content">
                    <div class="row">
                        @foreach($single_box_ones as $key => $st)
                            @if($key!=0 and $key!=1)
                                <div class="col-md-4">
                                    <a href="{{ route('frontend.amppost', ['categoryslug' => str_slug($st->category->name), 'id' => $st->id, 'slug' => $st->slug ]) }}" class="item mb-4 shadow-sm">
                                        <div class="image">
                                            <amp-img alt="{{ $st->title }}" src="{{ $st->image }}" width="100" height="59" layout="responsive"></amp-img>
                                        </div>
                                        <div class="title">
                                            <span>{{ $st->title }}</span>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
@endsection

















