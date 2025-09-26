@if($id4['publish']==0) 
<div class="container my-2"> 
	<div class="text-center">
{!! $id4['code'] !!} 
		</div>
	</div>
@endif
<section class="section mb-4 thumbs-slider sport">
    <div class="container">
        <div class="content js-site-slide" data-slide-type="thumbs" data-slide-uniq-id="thumbs-1">
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    @foreach($thumbs_slider_sports as $key => $thumbs_slider_sport)
                        @if($key==0)
                        <div class="swiper-slide text-left">
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($thumbs_slider_sport->category->name), 'id' => $thumbs_slider_sport->id, 'slug' => $thumbs_slider_sport->slug ]) }}" class="image">
                                        <img src="{{ $thumbs_slider_sport->image }}" alt="{{ $thumbs_slider_sport->title }}">
                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($thumbs_slider_sport->category->name), 'id' => $thumbs_slider_sport->id, 'slug' => $thumbs_slider_sport->slug ]) }}" class="category">{{ $thumbs_slider_sport->category->name }}</a>
                                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($thumbs_slider_sport->category->name), 'id' => $thumbs_slider_sport->id, 'slug' => $thumbs_slider_sport->slug ]) }}" class="title">{{ str_limit(html_entity_decode($thumbs_slider_sport->title), $limit='34', $end='...') }}</a>
                                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($thumbs_slider_sport->category->name), 'id' => $thumbs_slider_sport->id, 'slug' => $thumbs_slider_sport->slug ]) }}" class="content m-0 p-0">{!! str_limit(html_entity_decode($thumbs_slider_sport->short_detail), $limit='140', $end='...') !!} </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                <!--
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
                -->
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-7">
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach($thumbs_slider_sports as $key => $thumbs_slider_sport)
                                    @if($key!=0)
                                        <div class="swiper-slide">
                                            <a href="{{ route('frontend.post', ['categoryslug' => str_slug($thumbs_slider_sport->category->name), 'id' => $thumbs_slider_sport->id, 'slug' => $thumbs_slider_sport->slug ]) }}">
                                                <img src="{{ $thumbs_slider_sport->image }}" alt="{{ $thumbs_slider_sport->title }}">
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <a href="{{ route('frontend.categoryslug', ['slug' => $thumbs_slider_sport->category->slug ] ) }}" class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 152.06 275.15"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M14.49,275.15,152.06,137.57,14.49,0,0,14.49,123.08,137.57,0,260.66Z"/></g></g></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if($id26['publish']==0) 
<div class="container my-2"> 
	<div class="text-center">
{!! $id26['code'] !!} 
		</div>
	</div>
@endif