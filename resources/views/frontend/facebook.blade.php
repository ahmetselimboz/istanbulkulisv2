<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/">
    <channel>
        <title>{{ $general->site_title }}</title>
        <link>{{ $general->site_url }}</link>
        <description>
            {{ $general->description }}
        </description>
        <language>tr-tr</language>
        <lastBuildDate>{{ date('Y-m-d') }}T{{date('h:i:s')}}Z</lastBuildDate>

        @foreach($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <link>{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}</link>
            <pubDate>{!! date('Y-m-d', strtotime($post->created_at)) !!}T{!!date('h:i:s', strtotime($post->created_at))!!}Z</pubDate>
            <author>{{ $post->author->name }}</author>
            <description>{{ str_limit(strip_tags($post->title), $limit='145', $end='') }}</description>
            <content:encoded>
                <![CDATA[
                <!doctype html>
                <html lang="tr" prefix="op: http://media.facebook.com/op#">
                <head>
                    <meta charset="utf-8">
                    <link rel="canonical" href="{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}">
                    <meta property="op:markup_version" content="v1.0">
                </head>
                <body>
                <article>
                    <header>

                    </header>

                    {{ $post->content }}

                    <footer>

                    </footer>
                </article>
                </body>
                </html>
                ]]>
            </content:encoded>
        </item>
        @endforeach

    </channel>
</rss>