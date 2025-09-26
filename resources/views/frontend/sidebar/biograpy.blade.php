@if($modules[18]['publish']==0)
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget light-shadow">
            <h3 class="secondry-heading">Biyografi</h3>
            <div class="auther-widget">
                <div id="auther-slider-thumb" class="auther-slider-thumb">
                    @foreach($bio as $key => $bb)
                        <a data-slide-index="{{ $key }}" href="#" class="active"><img src="{{ $bb->image }}" alt="{{ $bb->title }}"></a>
                    @endforeach
                </div>
                <ul class="auther-slider">
                    @foreach($bio as $key => $bb)
                        <li class="auther-detail">
                            <strong>{{ $bb->title }}</strong>
                            <p>
                                <a href="{{ route('frontend.post', ['id' => $bb->id, 'slug' => $bb->slug, ]) }}" target="_blank">{!! str_limit(strip_tags($bb->detail), $limit='145', $end='...') !!}</a>
                            </p>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
@endif