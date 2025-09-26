@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Kod Oluşturucu</h5>
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
            <form action="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Reklam URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="Başına http:// veya https:// ekleyiniz." name="advert_url">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Reklam Alanı Ölçüleri (Opsiyonel)</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-normal" placeholder="Genişlik ( Pixel )" name="advert_width">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-normal" placeholder="Yükseklik ( Pixel )" name="advert_height">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Reklam resmi</label>
                    <div class="col-sm-10">
                        <input type="file" class="" placeholder="" name="advert_image">
                    </div>
                </div>





                <div class="text-right m-t-20">
                    <button class="btn btn-primary">Kod Oluştur</button>
                </div>
            </form>
        </div>
    </div>
@endsection



@section('css')
@endsection

@section('js')
@endsection