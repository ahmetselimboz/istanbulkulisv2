@if(isset($othergalleries))
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget">
            <h3 class="secondry-heading">Benzer Galeriler</h3>
            <div class="horizontal-tabs-widget">
                <!-- Tab panes -->
                <div class="horizontal-tab-content tab-content">
                    <div class="tab-pane fade active in" id="week">
                        <ul class="post-wrap-list">
                            @foreach($othergalleries as $othergallery)
                                <li class="post-wrap small-post">
                                    <div class="post-thumb">
                                        <img src="/uploads/{{ $othergallery->image }}" alt="{{ $othergallery->title }}">
                                    </div>
                                    <div class="post-content">
                                        <h4><a href="{{ route('frontend.photogallery', ['id' => $othergallery->id, 'slug' => $othergallery->slug, ]) }}">{{ $othergallery->title }}</a></h4>
                                        <ul class="post-meta">
                                            <li><i class="fa fa-clock-o"></i>{{ date('d-m-Y', strtotime($othergallery->created_at)) }}</li>
                                            @if(isset($photogallery->category->name))
                                                <li>
                                                    {{ $photogallery->category->name }}
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