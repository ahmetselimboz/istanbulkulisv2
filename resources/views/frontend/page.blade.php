@extends('layout-frontend')

@section('meta')
    <title>{{ $page->title }}</title>
    <meta name="description" content="{{ str_limit(strip_tags($page->detail), $limit='145', $end='') }}">
    <meta name="keywords" content="@if($page->keywords) @foreach(explode(',', $page->keywords) as $key){{ $key }},@endforeach @endif">

    <link rel="canonical" href="{{ route('frontend.page', ['id' => $page->id, 'slug' => $page->slug ]) }}" />

    <meta property="og:sitename"           content="{{ $general->site_title }}" />
    <meta property="og:url"                content="{{ route('frontend.page', ['id' => $page->id, 'slug' => $page->slug ]) }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $page->title }}" />
    <meta property="og:description"        content="{{ str_limit(strip_tags($page->detail), $limit='145', $end='') }}" />
    <meta property="og:image"              content="{{ route('frontend.index') }}/uploads/{{ $page->image }}" />

    <meta name="twitter:url" content="{{ route('frontend.page', ['id' => $page->id, 'slug' => $page->slug ]) }}" />
    <meta name="twitter:domain" content="{{ $general->site_url }}" />
    <meta name="twitter:site" content="{{ $general->site_title }}" />
    <meta name="twitter:title" content="{{ $page->title }}" />
    <meta name="twitter:description" content="{{ str_limit(strip_tags($page->detail), $limit='145', $end='') }}" />
    <meta name="twitter:image:src" content="{{ route('frontend.index') }}/uploads/{{ $page->image }}" />
@endsection

@section('css')
@endsection

@section('content')
    <main>
        <section class="section detail">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <h1>{{ $page->title }}</h1>
                        <div class="col-12 col-md-12">
                            <div class="main-content">
                                <p>{!! $page->detail !!}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

@endsection

@section('js')
@endsection
