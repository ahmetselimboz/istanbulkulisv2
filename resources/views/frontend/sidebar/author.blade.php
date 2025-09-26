@if($modules[5]['publish']==0)
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget">
            <h3 class="secondry-heading">Köşe Yazıları</h3>
            <div class="slider-widget">
                <div id="post-slider">
                    @foreach($authors as $author)
                        <div class="item">
                            @if(isset($author->article->id))
                                <img src="/uploads/{{$author->avatar}}" alt="slider">
                                <div style="padding: 10px;">
                                    <h4><a href="{{ route('frontend.article', ['id' => $author->article->id, 'slug' => $author->article->slug, ]) }}">{{$author->article->title}}</a></h4>
                                    <li style="list-style: none"><i class="icon-user"></i> {{$author->name}}</li>
                                    <h4><a href="{{ route('frontend.article', ['id' => $author->article->id, 'slug' => $author->article->slug, ]) }}">{{$author->article->title}}</a></h4>
                                    <li style="list-style: none"><i class="icon-user"></i> {{$author->name}}</li>

                                 </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif