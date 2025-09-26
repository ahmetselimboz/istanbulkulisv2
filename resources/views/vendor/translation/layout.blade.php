@extends('layout-admin')

@section('css')
    <link rel="stylesheet" href="{{ asset('/vendor/translation/css/main.css') }}">
@endsection

@section('content')

    <div id="app">

        @include('translation::notifications')

        @yield('body')

    </div>

@endsection


@section('js')
    <script src="{{ asset('/vendor/translation/js/app.js') }}"></script>
@endsection
