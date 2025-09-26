@if($modules[16]['publish']==0)
<section class="section upper-slider my-4 d-none d-sm-block">
    <div class="container">
        <div class="content">
            
            <div class="swiper-container js-site-slide" data-slide-type="upper">
                <div class="swiper-wrapper">
                    @foreach($topslides as $key => $slide)
                    <a href="{{ route('frontend.post', ['categoryslug' => str_slug($slide->category->name), 'id' => $slide->id, 'slug' => $slide->slug ]) }}" class="swiper-slide">
                        <img src="{{ env('APP_URL') }}{{$slide->image_top}}" alt="{{$slide->image_title}}">
                    </a>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>

            </div>
        </div>
        <div class="clear"></div>
    </div>
</section>
@endif