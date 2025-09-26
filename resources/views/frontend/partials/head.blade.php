<head>
    <meta charset="utf-8">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    @if (!empty($general->site_refresh))
        <meta http-equiv="refresh" content="{{ $general->site_refresh }}">
    @endif

    @yield('meta')

    {!! $general->site_meta_tag !!}


    <link rel="stylesheet" href="{{ asset('frontend/sonsayfa/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/sonsayfa/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/sonsayfa/css/app.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family={{ $general->body_font }}">
    <style>
        body {
            font-family: '{{ $general->body_font }}' !important;
        }
    </style>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ $general->site_url }}/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $general->site_url }}/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $general->site_url }}/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ $general->site_url }}/favicon/site.webmanifest">
    <link rel="mask-icon" href="{{ $general->site_url }}/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    {!! $general->site_analytics !!}

    @yield('css')
</head>
