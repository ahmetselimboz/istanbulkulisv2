@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Makale Düzenle</h5>
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
            <form action="{{ route('article.update', $article->id) }}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Makale</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-normal" value="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug]) }}" readonly>
                    </div>
                    <div class="col-sm-1" >
                        <a class="btn btn-success btn-sm"  href="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug]) }}" target="_blank">Tıkla Git</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-primary btn-sm btn-block" href="{{ route('article.create') }}">Makale Ekle</a>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Makale başlığı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="title" value="{{ $article->title }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Makale içeriği</label>
                    <div class="col-sm-10">
                        <textarea id="ckeditor" name="detail" required>{{ $article->detail }}</textarea>
                    </div>
                </div>

                <div class="form-group row clearfix">
                    <label class="col-sm-2 col-form-label">Diğer Ayarlar</label>
                    <div class="col-sm-4">
                        <select name="publish" class="form-control fill">
                            @if($article->publish==0)
                                <option value="0" selected>Yayında</option>
                                <option value="1">Taslak</option>
                            @elseif($article->publish==1)
                                <option value="0">Yayında</option>
                                <option value="1" selected>Taslak</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select name="user_id" class="form-control fill">
                            <option value="0">Yazar seçilmedi</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"  {{ $user->id == $article->user_id ? 'selected' : '' }} >{{ $user->name }}</option>
                            @endforeach
                        </select>
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