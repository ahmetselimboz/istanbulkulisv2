@if($modules[0]['publish']==0)
    <div class="banner-slider">

        <div id="ninja-slider" class="ninja-slider">
            <div class="slider-inner">
                <ul>
                    @foreach($slides as $key => $slide)
                        @if($key==6 and !empty($id28["code"]) and $id28['publish']==0)
                            <li> {!! $id28["code"] !!} </li>
                        @elseif($key==10 and !empty($id29["code"]) and $id29['publish']==0)
                            <li> {!! $id29["code"] !!} </li>
                        @elseif($key==14 and !empty($id30["code"]) and $id30['publish']==0)
                            <li> {!! $id30["code"] !!} </li>
                        @else
                            <li>
                                <a href="{{ route('frontend.post', ['id' => $slide->id, 'slug' => $slide->slug ]) }}">
                                    <img class="ns-img" src="{{ $slide->image }}"  alt="{{ $slide->title }}">
                                    <div class="caption-holder">
                                        <div class="container p-relative">
                                            @if($slide->mtitle==0)
                                                <div class="caption">
                                                    <span>{{ $slide->category->name }}</span>
                                                    <h2>
                                                        <a href="{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}">
                                                            {{ $slide->title }}
                                                        </a>
                                                    </h2>
                                                    <div class="post-meta"><span><i class="icon-clock"></i>{{ date("H:i", strtotime($slide->created_at)) }}</span></div>
                                                </div>
                                            @endif
                                       </div>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <div class="fs-icon" title="Slayt Başlat/Kapat"></div>
            </div>
        </div>
        <div class="banner-thumbnail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-6 pull-right">
                        <div id="thumbnail-slider">
                            <div class="inner">
                                <ul class="post-wrap-list">
                                    @foreach($slides as $key => $slide)
                                        <li @if($key==0) class="active" @endif>
                                            <div class="post-wrap small-post">
                                                <div class="post-thumb">
                                                    <img src="{{ $slide->image }}" alt="{{ $slide->title }}">
                                                </div>
                                                <div class="post-content">
                                                    <h4><a href="{{ route('frontend.post', ['id' => $slide->id, 'slug' => $slide->slug ]) }}">
                                                            {{ $slide->title }}
                                                        </a></h4>
                                                    <ul class="post-meta">
                                                        <li><i class="icon-clock"></i>{{ date("H:i", strtotime($slide->created_at)) }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="news-bar white-bg">
        <div class="container">
            <div class="row">


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-9 r-full-width">
                    <div class="headline-wrap">
                        @if($modules[14]['publish']==0)
                            <span class="badge">Piyasalar</span>
                            <div class="clip">
                                <div class="today">
                                    <style>
                                        .change li{ font-weight: bold!important; float: left;margin-left: 10px;}
                                    </style>
                                    <ul class="change">
                                        <li>Dolar: </li>
                                        <li>
                                            @if($repo["usd_simge"]=="**asagi**")
                                                <b style="color: #ff0000">{{ $repo["usd"] }}  <i class="fa fa-chevron-circle-down" aria-hidden="true"></i> </b>
                                            @else
                                                <b style="color: #1e7e34">{{ $repo["usd"] }} <i class="fa fa-chevron-circle-up" aria-hidden="true"></i></b>
                                            @endif
                                        </li>
                                        <li>Euro</li>
                                        <li>
                                            @if($repo["euro_simge"]=="**asagi**")
                                                <b style="color: #ff0000">{{ $repo["euro"] }} <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></b>
                                            @else
                                                <b style="color: #1e7e34">{{ $repo["euro"] }} <i class="fa fa-chevron-circle-up" aria-hidden="true"></i></b>
                                            @endif
                                        </li>
                                        <li>İngiliz Sterlini</li>
                                        <li>
                                            @if($repo["sterlin_simge"]=="**asagi**")
                                                <b style="color: #ff0000">{{ $repo["sterlin"] }} <i class="fa fa-chevron-circle-down" aria-hidden="true"></i></b>
                                            @else
                                                <b style="color: #1e7e34">{{ $repo["sterlin"] }} <i class="fa fa-chevron-circle-up" aria-hidden="true"></i></b>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>



                @if($modules[10]['publish']==0)
                    @php
                    $weather = json_decode(\Illuminate\Support\Facades\Storage::disk('public')->get('weather.json'));
                    @endphp
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 r-full-width">
                        <div class="time-clock">

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
                        <div class="weather-holder">
                            <span class="weather-state">{{ $weather->wcity }} / {{ $weather->degree_text }}</span>
                            <span class="temp"> {{$weather->wdegree}}<sup>0</sup> C</span>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endif

@if($id2['publish']==0)
    <div class="container">
        <div class="row">
            {!! $id2['code'] !!}
        </div>
    </div>
@endif