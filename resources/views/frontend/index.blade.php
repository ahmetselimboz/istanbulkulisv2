@extends('layout-frontend')

@section('meta')
    <title>{{ $general->site_title }}</title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($general->site_description), 145) }}">
    <meta name="keywords" content="@if($general->site_keywords)@foreach(explode(',', $general->site_keywords) as $key){{ trim($key) }}@if(!$loop->last),@endif @endforeach @endif">

    @if ($route == 'frontend.index')
        <link rel="canonical" href="{{ route('frontend.index') }}" />
    @endif

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $general->site_title }}">
    <meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($general->site_description), 145) }}">
    <meta property="og:site_name" content="{{ $general->site_title }}">
    <meta property="og:url" content="{{ $general->site_url }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ route('frontend.index') }}/uploads/logo.jpg">
    <!-- /Open Graph End -->

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:url" content="{{ $general->site_url }}">
    <meta name="twitter:title" content="{{ $general->site_title }}">
    <meta name="twitter:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($general->site_description), 145) }}">
    <meta name="twitter:image" content="{{ route('frontend.index') }}/uploads/logo.jpg">
    <meta name="twitter:creator" content="@sonsayfa">
    <meta name="twitter:site" content="@sonsayfa">
    <!-- /Twitter Card End -->

    @php
        // JSON-LD verisini PHP array olarak hazırla — Blade içinde karmaşa yapmamak için
        $brands = [];
        foreach($categories as $category){
            $brands[] = ['@type' => 'Brand', 'name' => $category->name, 'url' => route('frontend.categoryslug', ['slug' => $category->slug])];
        }

        $newsOrg = [
            '@context' => 'https://schema.org',
            '@type' => 'NewsMediaOrganization',
            'name' => 'Haber7',
            'url' => route('frontend.index'),
            'logo' => [
                '@type' => 'ImageObject',
                'url' => route('frontend.index') . '/uploads/logo.jpg',
                'width' => 268,
                'height' => 58
            ],
            'sameAs' => [
                $general->site_facebook_url,
                $general->site_twitter_url,
                $general->site_instagram_url,
                $general->site_youtube_url
            ],
            'description' => strip_tags(\Illuminate\Support\Str::limit($general->site_description, 145, '')),
            'disambiguatingDescription' => strip_tags(\Illuminate\Support\Str::limit($general->site_description, 145, '')),
            'slogan' => $general->site_title,
            'email' => $general->site_email,
            'telephone' => $general->site_phone,
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => 'TR',
                'addressLocality' => 'İstanbul',
                'addressRegion' => 'İstanbul',
                'postalCode' => '34100',
                'streetAddress' => $general->site_address
            ],
            'contactPoint' => [
                [
                    '@type' => 'ContactPoint',
                    'telephone' => $general->site_phone,
                    'contactType' => 'customer service',
                    'contactOption' => 'TollFree',
                    'areaServed' => 'TR'
                ]
            ],
            'brand' => $brands
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($newsOrg, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endsection

@section('css')
@endsection

@section('content')
    <main>
        @if (\Illuminate\Support\Facades\Storage::disk('public')->exists('main.json'))
            @php $main = json_decode(\Illuminate\Support\Facades\Storage::disk('public')->get('main.json')); @endphp
            @foreach ($main as $itemmain)
                @includeIf("frontend.main.$itemmain")
            @endforeach
        @else
            <h1>Panelden Json Güncelleyin</h1>
        @endif
    </main>
@endsection

@section('js')
@endsection
