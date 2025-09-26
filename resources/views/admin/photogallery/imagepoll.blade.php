@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Foto Galeri Resimleri</h5>
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
            <form action="{{ route('photogalleryimage.update', $photogallery->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">İlgili Galeri</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="title" value="{{ $photogallery->title }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Resimleri Yükle</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="images[]" multiple>
                    </div>
                </div>
                <div class="text-right m-t-20">
                    <button class="btn btn-primary">Yükle</button>
                </div>
            </form>

                <hr>

                <div class="row">
                    @if(!empty($pgimages))
                        @foreach($pgimages as $pgimage)
                                <div class="col-lg-12 col-xl-3">
                                    <form action="{{ route('image.description', $pgimage->id) }}" method="post">
                                        @csrf
                                        <div class="card-sub mb-2">
                                            <img class="card-img-top img-fluid" src="/uploads/{{ $pgimage->image }}" style="max-height: 130px;">
                                            <div>
                                                <textarea name="description" class="form-control" cols="10" rows="5">{{ $pgimage->description }}</textarea>
                                            </div>
                                            <button href="" class="btn btn-success">Güncelle</button>
                                            <a href="{{ route('image.delete', $pgimage->id) }}" class="btn btn-danger">Sil</a>
                                        </div>
                                    </form>
                                </div>
                        @endforeach
                    @endif
                </div>


        </div>
    </div>
@endsection


@section('css')
@endsection

@section('js')
@endsection