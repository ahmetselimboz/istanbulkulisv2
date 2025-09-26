@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Kategori Düzenle</h5>
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
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kategori Adı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="name" value="{{ $category->name }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Üst Kategori</label>
                    <div class="col-sm-10">
                        <select name="parent_id" class="form-control fill">
                            <option value="0">Seçilmedi</option>
                            @foreach($categories as $parent)
                                <option value="{{ $parent->id }}"  {{ $parent->id == $category->parent_id ? 'selected' : '' }} >{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Açıklama</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="description">{{ $category->description }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sıra Numarası</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="sortby" value="{{ $category->sortby }}">
                    </div>
                </div>
				
				<div class="form-group row">
                    <label class="col-sm-2 col-form-label">İkinci Menü</label>
                    <div class="col-sm-10">
                        <select name="show" id="show" class="form-control">
                            <option value="0" @if($category->show==0) selected @endif >Gösterme</option>
                            <option value="1" @if($category->show==1) selected @endif >Göster</option>
                        </select>
                    </div>
                </div>
				
				<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kategori ilk sayfa seo metni</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="cat_seo_content">{{ $category->cat_seo_content }}</textarea>
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
@endsection