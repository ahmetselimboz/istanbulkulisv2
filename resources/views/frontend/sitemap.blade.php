

<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>


<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd
        http://www.google.com/schemas/sitemap-image/1.1
        http://www.google.com/schemas/sitemap-image/1.1/sitemap-image.xsd">
    <url>
        <loc>{{ $general->site_url }}</loc>
        <lastmod>{{ date('Y-m-d') }}T{{date('h:i:s')}}+03:00</lastmod>
        <changefreq>always</changefreq>
        <priority>1</priority>
    </url>

    @foreach($posts as $post)
        <url>
            <loc>{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}</loc>
            <changefreq>daily</changefreq>
            <lastmod>{!! date('Y-m-d', strtotime($post->created_at)) !!}T{!!date('h:i:s', strtotime($post->created_at))!!}+03:00</lastmod>
            <priority>0.8</priority>
            <image:image>
                <image:loc>{{ $general->site_url }}uploads/{{ $post->image }}</image:loc>
            </image:image>
        </url>
    @endforeach

</urlset>
