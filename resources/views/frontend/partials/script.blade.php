
@yield('js')
<script src="{{ asset('frontend/sonsayfa/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('frontend/sonsayfa/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/sonsayfa/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/sonsayfa/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/sonsayfa/js/app.js') }}"></script>



{{-- <script data-schema="organization" type="application/ld+json">
    {
        "@context" : "https://schema.org",
        "@type" : "Organization",
        "name" : "Sonsayfa",
        "url" : "https://www.sonsayfa.com/",
        "logo" : "https://www.sonsayfa.com/logo.png",
        "sameAs" : [
            "https://www.facebook.com/sonsayfa",
            "https://twitter.com/sonsayfa",
            "https://instagram.com/sonsayfa"
        ]
    }
</script> --}}
{{-- @if(isset($search_term)) --}}
{{-- <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "url": "https://www.sonsayfa.com/",
        "potentialAction": {
            "@type": "SearchAction",
     
            "target": "https://www.sonsayfa.com/search/?q={{$search_term}}",
          
       
            "query-input": "required name=search_term"
        }
    }
</script> --}}
{{-- @endif --}}


