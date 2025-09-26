@if($modules[5]['publish']==0 and $modules[5]['value']==0)
    @if(isset($article->author))
        <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
            <div class="widget light-shadow">
                <h3 class="secondry-heading">Köşe Yazarı</h3>
                <div class="auther-widget">
                    <div id="auther-slider-thumb" class="auther-slider-thumb">
                        <a data-slide-index="0" href="#" class="active"><img src="/uploads/{{ $article->author->avatar }}" alt=""></a>
                    </div>
                    <ul class="auther-slider">
                        <li class="auther-detail">
                            <strong>{{ $article->author->name }}</strong>
                            <ul class="post-meta" style="float: left;display: contents;">
                                <li><a href="{{ $article->author->tw }}" class="ts-twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $article->author->fb }}" class="ts-facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $article->author->gp }}" class="ts-google-plus"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="{{ $article->author->linkedin }}" class="ts-linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <p>{!! $article->author->about !!}</p>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    @endif
@endif