@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Reklam Düzenle</h5>
        </div>
        <div class="card-block">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="alert alert-info">
                    NOT: Reklam tıklanma sayılarını görüntülemek için muhakkak reklamın gideceği adresin olduğu taga <span class="bg-danger">class="advert_click" data-id="REKLAM-ID"</span> şeklinde eklenmelidir. <em style="text-decoration: underline">Sadece sizin link verdiğiniz içeriklerde geçerlidir.</em>
                </div>

                <form action="{{ route('advert.update', $advert->id) }}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Reklam Başlığı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="title" value="{{ $advert->title }}" disabled>
                    </div>
                </div>



                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Açıklama</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="code">{!! $advert->code !!}</textarea>
                    </div>
                </div>

                <div class="form-group row clearfix">
                    <label class="col-sm-2 col-form-label">Yayın Durumu</label>
                    <div class="col-sm-2">
                        <select name="publish" class="form-control fill">
                            @if($advert->publish==0)
                                <option value="0" selected>Yayında</option>
                                <option value="1">Gizli</option>
                            @elseif($advert->publish==1)
                                <option value="0">Yayında</option>
                                <option value="1" selected>Gizli</option>
                            @endif
                        </select>
                    </div>
                </div>


                    <div class="text-right m-t-20">
                    <button class="btn btn-primary">Kaydet</button>
                </div>
            </form>

                <form action="{{ route('click.empty', $advert->id) }}" method="post">
                    @csrf
                    <div class="form-group row clearfix" style="margin: 0px;">
                        <div class="col-sm-3 bg-success" style="padding: 5px; border-radius: 3px">
                            Reklam Tıklanma Sayısı:
                            @if(!empty($advert->click))
                                <b style="font-weight: 700;">{{ $advert->click }}</b>
                            @else
                                <b style="color:#000">YOK</b>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-danger btn-sm text-center">Sayıyı Sıfırla</button>
                        </div>
                    </div>

                </form>
        </div>
    </div>
@endsection



@section('css')
@endsection

@section('js')
@endsection