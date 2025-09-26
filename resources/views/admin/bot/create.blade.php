@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ $bot }} üzerinden gelen haberler</h5>
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
            
            <div class="accordion" id="accordionExample">
                @foreach($result as $key => $item)
                    <div class="card mb-1">
                        <div class="card-header p-1" id="heading_{{$key}}">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapse_{{$key}}" aria-expanded="true" aria-controls="collapse_{{$key}}">
                                    {{ ($key+1) }} - {{ $item["title"] }} <br> Tarih: {{ $item["date"] }}
                                </button>
                            </h2>
                        </div>
                        <div id="collapse_{{$key}}" class="collapse" aria-labelledby="heading_{{$key}}" data-parent="#accordionExample">
                            <div class="card-body">
                                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Haber başlığı</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-normal" placeholder="" name="title" value="{{ $item["title"] }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-10">
                                            <select name="category_id" class="form-control fill">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Haber içeriği</label>
                                        <div class="col-sm-10">
                                            <textarea class="ckeditor" name="detail">{{ $item["content"] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row clearfix">
                                        <label class="col-sm-2 col-form-label">Diğer Ayarlar</label>
                                        <div class="col-sm-2">
                                            <select name="publish" class="form-control fill">
                                                <option value="0">Yayında</option>
                                                <option value="1">Taslak</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <select name="location" class="form-control fill">
                                                <option value="0">Standart</option>
                                                <option value="1">Manşet</option>
                                                <option value="2">Sür Manşet</option>
                                                <option value="3">Top Manşet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Haber Fotoğrafı</label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="image" value="{{ $item["image"] }}">
                                            <img src="{{ $item["image"] }}" class="img-fluid">
                                        </div>
                                    </div>
                                    <input type="hidden" name="bot" value="{{ $bot }}">
                                    <div class="text-right m-t-20">
                                        <button class="btn btn-primary">Kaydet</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>
@endsection


@section('css')
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( '.ckeditor');
    </script>
    <script src="https://cdn.datedropper.com/get/onvi9om2"></script>



@endsection