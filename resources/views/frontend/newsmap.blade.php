<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="sitemap-news.xsl"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd
            http://www.google.com/schemas/sitemap-news/0.9
            http://www.google.com/schemas/sitemap-news/0.9/sitemap-news.xsd
        http://www.google.com/schemas/sitemap-image/1.1
        http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd">

    @foreach($posts as $post)
        <url>
            <loc>{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}</loc>
            <news:news>
                <news:publication>
                    <news:name>{{ $general->site_newsname }}</news:name>
                    <news:language>tr</news:language>
                </news:publication>
                <news:publication_date>{!! date('Y-m-d', strtotime($post->created_at)) !!}T{!!date('h:i:s', strtotime($post->created_at))!!}+03:00</news:publication_date>
                <news:title>{{ $post->title }}</news:title>
                <news:keywords>@foreach(explode(',', $post->keywords) as $key) {{ $key }}, @endforeach</news:keywords>
            </news:news>
        </url>
    @endforeach

</urlset>