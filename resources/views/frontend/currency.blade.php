@if($modules[14]['publish']==0)
    <?php
    $connectCurrency = get_headers('https://www.turkiye.gov.tr/doviz-kurlari');
    if($connectCurrency[0] == 'HTTP/1.1 200 OK'){
        $change = file_get_contents("https://www.turkiye.gov.tr/doviz-kurlari");
        preg_match_all('@\t\t\t\t\t<td>1 ABD DOLARI</td>\t\t\t\t\t
\t\t\t\t\t<td>(.*?)</td>
\t\t\t\t\t<td>(.*?)</td>@si',$change,$dollar,PREG_SET_ORDER);
        preg_match_all('@\t\t\t\t\t<td>1 EURO</td>\t\t\t\t\t
\t\t\t\t\t<td>(.*?)</td>
\t\t\t\t\t<td>(.*?)</td>@si',$change,$euro,PREG_SET_ORDER);

        $dollar = $dollar[0][2];
        $euro = $euro[0][2];
    }else{
        $dollar = 'Bekliyor';
        $euro = 'Bekliyor';
    }
    ?>
    <div class="widgets ts-grid-box clearfix ts-category-title">
        <h3 class="widget-title">Döviz Kurları </h3>
        <div class="col-lg-6 ccitem"> <i class="fa fa-dollar"></i> <span> {{ $dollar }}</span> <b>Dolar</b> </div>
        <div class="col-lg-6 ccitem"> <i class="fa fa-euro"></i> <span>{{ $euro }}</span> <b>Euro</b> </div>
    </div>
@endif