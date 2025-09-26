@if($modules[12]['publish']==0)
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget" id="scoretable">
            <h3 class="secondry-heading">Puan Durumu</h3>
            @include('frontend.partials.scoretable')
        </div>
    </div>
@endif