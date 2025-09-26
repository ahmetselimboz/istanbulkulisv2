@if(isset($othervideos))
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget">
            <h3 class="secondry-heading">Benzer Galeriler</h3>
            <div class="horizontal-tabs-widget">
                <!-- Tab panes -->
                <div class="horizontal-tab-content tab-content">
                    <div class="tab-pane fade active in" id="week">
                        <ul class="post-wrap-list">
                            @foreach($othervideos as $othervideo)
                                <li class="post-wrap small-post">
                                    <div class="post-thumb">
                                        <img src="/uploads/{{ $othervideo->image }}" alt="{{ $othervideo->title }}">
                                    </div>
                                    <div class="post-content">
                                        <h4><a href="{{ route('frontend.video', ['id' => $othervideo->id, 'slug' => $othervideo->slug, ]) }}">{{ $othervideo->title }}</a></h4>
                                        <ul class="post-meta">
                                            <li><i class="fa fa-clock-o"></i>{{ date('d-m-Y', strtotime($othervideo->created_at)) }}</li>
                                            @if(isset($othervideo->category->name))
                                                <li>
                                                    {{ $othervideo->category->name }}
                                                </li>
                                            @else
                                                Kategorisiz/Silinmiş
                                            @endif
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

