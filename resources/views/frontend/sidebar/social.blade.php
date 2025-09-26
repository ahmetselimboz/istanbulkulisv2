@if($modules[19]['publish']==0)
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget">
            <h3 class="secondry-heading">Sosyal Medyada Biz</h3>
            <ul class="aside-social">
                <li class="fb">
                    <a href="{{$general->site_facebook_url}}"><i class="fa fa-facebook"></i><span>Facebook</span><em>Beğen</em></a>
                </li>
                <li class="pi">
                    <a href="{{$general->site_instagram_url}}"><i class="fa fa-instagram"></i><span>Instagram</span><em>Takip Et</em></a>
                </li>
                <li class="tw">
                    <a href="{{$general->site_twitter_url}}"><i class="fa fa-twitter"></i><span>Twitter</span><em>Tweetle</em></a>
                </li>
            </ul>
        </div>
    </div>
@endif