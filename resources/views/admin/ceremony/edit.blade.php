@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Sayfa Düzenle</h5>
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
            <form action="{{ route('ceremony.update', $ceremony->id) }}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">İsim Soyisim</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="name" required value="{{ $ceremony->name }}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Doğum Tarihi</label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control form-control-normal" placeholder="" name="birthday" value="{{ date('Y-m-d', strtotime($ceremony->birthday)) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ölüm Tarihi</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="form-control form-control-normal" placeholder="" name="deathday" value="{{ date('Y-m-d', strtotime($ceremony->deathday)).'T'.date('H:i', strtotime($ceremony->deathday)) }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Defin Yeri</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="burail" value="{{ $ceremony->burail }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Defin Tarihi</label>
                    <div class="col-sm-4">
                        <input type="datetime-local" class="form-control form-control-normal" placeholder="" name="burailday" value="{{ date('Y-m-d', strtotime($ceremony->burailday)).'T'.date('H:i', strtotime($ceremony->burailday)) }}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Detay (opsiyonel)</label>
                    <div class="col-sm-10">
                        <textarea id="detail" class="form-control" name="detail">{{ $ceremony->detail }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kişi Fotoğrafı</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="image">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mevcut Fotoğrafı</label>
                    <div class="col-sm-10">
                        <img src="uploads/value="{{ $ceremony->image }}"" alt="">
                    </div>
                </div>


                <div class="text-right m-t-20">
                    <button class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
@endsection


@section('css')
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'ckeditor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
    </script>
@endsection