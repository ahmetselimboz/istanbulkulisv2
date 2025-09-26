<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0" xmlns:g="http://base.google.com/ns/1.0">

    <channel>
        <title>{{ $general->site_title }}</title>
        <link>{{ $general->site_url }}</link>
        <description>{{ $general->site_description }}</description>
        @foreach($posts as $post)
        <item>
            <title>{{ $post->title }}</title>
            <link>{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}</link>
            <description>
                <![CDATA[
                {!! strip_tags($post->detail) !!}
                ]]>
            </description>
            <g:image_link>{{ $general->site_url }}{{ $post->image }}</g:image_link>
        </item>
        @endforeach
    </channel>

</rss>
