@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => '/'])
            Süpriz
        @endcomponent
    @endslot

    {{-- Body --}}
    <a href="{{ $_SERVER['HTTP_HOST'] }}">{{ $_SERVER['HTTP_HOST'] }}</a> lisanslı scripti warez olarak kullanmaya çalışmaktadır.

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © Yazılımcı Kulübü İhbar Hattı
        @endcomponent
    @endslot
@endcomponent
