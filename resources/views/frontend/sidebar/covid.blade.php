@if($modules[20]['publish']==0)
    <?php
    $covid = json_decode(\Illuminate\Support\Facades\Storage::disk('public')->get('covid.json'));
    ?>
    <div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
        <div class="widget">
            <h3 class="secondry-heading">Covid 19 Tablosu</h3>
            <ul class="categories-widget">
                <?php $number = 0; ?>
                @foreach($covid as $key => $cvd)
                    <li><a href="javascript:void(0)"><em>{{ $key }}</em><span class="bg-green">{{ $cvd }}</span></a></li>
                    @break($number==5)
                        <?php $number++; ?>
                    @endforeach
            </ul>
        </div>
    </div>
@endif