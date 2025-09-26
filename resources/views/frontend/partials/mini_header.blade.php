<section class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 align-self-center md-center-item">
                <ul class="ts-top-nav">
                    @foreach($pages as $page)<li><a href="{{ route('frontend.page', ['id' => $page->id, 'slug' => $page->slug ] ) }}"> {{ $page->title }} </a></li>@endforeach
                    @if($modules[2]['publish']==0)<li><a href="{{ route('frontend.videoall') }}"><i class="fa fa-video-camera"></i> Video Galeri</a></li>@endif
                    @if($modules[3]['publish']==0)<li><a href="{{ route('frontend.photogalleryall') }}"><i class="fa fa-photo"></i> Foto Galeri</a></li>@endif
                    @if($modules[17]['publish']==0)<li><a href="{{ route('frontend.newspaper', ['slug' => 'milat']) }}"><i class="fa fa-paperclip"></i> Gazete Manşetleri</a></li>@endif
                    @if($modules[5]['publish']==0)<li><a href="{{ route('frontend.authorall') }}"><i class="fa fa-user-md"></i> Köşe Yazarları</a></li>@endif
                    <li><a href="{{ route('frontend.contact') }}"><i class="fa fa-envelope"></i> İletişim</a></li>
                </ul>

            </div>
            <!-- end col-->

            <div class="col-lg-3 text-right align-self-center">
                <ul class="top-social">
                    <li>
                        <a href="{{ $general->site_twitter_url }}">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="{{ $general->site_facebook_url }}">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="{{ $general->site_instagram_url }}">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="{{ $general->site_youtube_url }}">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!--end col -->


        </div>
        <!-- end row -->
    </div>
</section>


