<style>
    #scoretable table{ margin: 20px;  font-weight: 700; font-size: 11px; }
    #scoretable .label {color: #1e7e34!important; text-align: right; display: contents;}
    #scoretable td.status{width: 1px;}
    #scoretable table tr.label th {
        font: normal 10px Tahoma,Arial,Verdana;
        color: #95979b;
        line-height: 25px;
    }
    #scoretable table tr.label th.position {
        width: 40px;
    }
    #scoretable table tr.label th.team_name {
        text-align: left;
        width: 220px;
        color: #95979b;
    }
    #scoretable table tr.label th.point, #scoretable table tr.label th.fpoint {
        text-align: center;
        width: 40px;
    }
    #scoretable table td, th{ text-align: center }
    #scoretable table .team_link{ text-align: left }
</style>
@php
$contents = \Illuminate\Support\Facades\Storage::disk('public')->get('scoretable.html');
@endphp