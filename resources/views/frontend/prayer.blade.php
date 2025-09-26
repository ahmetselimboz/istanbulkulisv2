<?php
$prayer = json_decode(\Illuminate\Support\Facades\Storage::disk('public')->get('prayer.json'));
?>
<div class="grid-item col-lg-12 col-md-12 col-sm-4 col-xs-6 r-full-width">
    <div class="widget">
            <h3 class="secondry-heading">{{ $prayer->pcityy }}</h3>

            <ul class="categories-widget">
                <table class="table post-title">
                    <tbody>
                    <tr>
                        <th scope="row" style="text-align: left;">İmsak:</th>
                        <td><strong>{{ $prayer->imsak }}</strong></td>
                    </tr>
                    <tr>
                        <th scope="row" style="text-align: left;">Güneş:</th>
                        <td><strong>{{ $prayer->gunes }}</strong></td>
                    </tr>
                    <tr>
                        <th scope="row" style="text-align: left;">Öğle:</th>
                        <td><strong>{{ $prayer->ogle }}</strong></td>
                    </tr>
                    <tr>
                        <th scope="row" style="text-align: left;">İkindi:</th>
                        <td><strong>{{ $prayer->ikindi }}</strong></td>
                    </tr>
                    <tr>
                        <th scope="row" style="text-align: left;">Akşam:</th>
                        <td><strong>{{ $prayer->aksam }}</strong></td>
                    </tr>
                    <tr>
                        <th scope="row" style="text-align: left;">Yatsı:</th>
                        <td><strong>{{ $prayer->yatsi }}</strong></td>
                    </tr>
                    </tbody>
                </table>
            </ul>
    </div>
</div>