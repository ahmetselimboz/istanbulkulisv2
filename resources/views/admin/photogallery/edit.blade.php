@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Foto Galeri Düzenle</h5>
            <a class="btn btn-warning btn-sm float-right" href="{{ route('photogalleryimage.poll', $photogallery->id) }}">Galeri Resimleri</a>
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
            <form action="{{ route('photogallery.update', $photogallery->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto Galeri</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-normal" value="{{ route('frontend.photogallery', ['id' => $photogallery->id, 'slug' => $photogallery->slug]) }}" readonly>
                    </div>
                    <div class="col-sm-1" >
                        <a class="btn btn-success btn-sm"  href="{{ route('frontend.photogallery', ['id' => $photogallery->id, 'slug' => $photogallery->slug]) }}" target="_blank">Tıkla Git</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-primary btn-sm btn-block" href="{{ route('photogallery.create') }}">Foto Galer Ekle</a>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto Galeri Başlığı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="title" value="{{ $photogallery->title }}" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto Galeri Kategori</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="form-control fill">
                            <option value="0">Seçilmedi</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"  {{ $category->id == $photogallery->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto Galeri İçeriği</label>
                    <div class="col-sm-10">
                        <textarea id="ckeditor" name="detail">{{ $photogallery->detail }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Anahtar Kelimeler</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="keywords" value="{{ $photogallery->keywords }}">
                    </div>
                </div>

                <div class="form-group row clearfix">
                    <label class="col-sm-2 col-form-label">Diğer Ayarlar</label>
                    <div class="col-sm-2">
                        <select name="publish" class="form-control fill">
                            @if($photogallery->publish==0)
                                <option value="0" selected>Yayında</option>
                                <option value="1">Taslak</option>
                            @elseif($photogallery->publish==1)
                                <option value="0">Yayında</option>
                                <option value="1" selected>Taslak</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mevcut resim</label>
                    <div class="col-sm-10">
                        <img src="/uploads/{{ $photogallery->image }}" width="200" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Foto Galeri Fotoğrafı</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="image">
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
        CKEDITOR.replace( 'ckeditor' );
    </script>

@endsection