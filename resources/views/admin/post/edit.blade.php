@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Haber Düzenle</h5>
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
            <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Haber</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form-control-normal" value="{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" readonly>
                    </div>
                    <div class="col-sm-1" >
                        <a class="btn btn-success btn-sm"  href="{{ route('frontend.post', ['categoryslug' => str_slug($post->category->name), 'id' => $post->id, 'slug' => $post->slug ]) }}" target="_blank">Tıkla Git</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-primary btn-sm btn-block" href="{{ route('post.create') }}">Haber Ekle</a>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Haber başlığı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="title" value="{{ $post->title }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Seo başlık ( URL - Opsiyonel )</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="slug" value="{{ $post->slug }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Haber özeti</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="short_detail" value="{{ $post->short_detail }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Haber içeriği</label>
                    <div class="col-sm-10">
                        <textarea id="ckeditor" name="detail">{{ $post->detail }}</textarea>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Anahtar kelimeler</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="keywords" value="{{ $post->keywords }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-3">
                        <select name="category_id" class="form-control fill">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"  {{ $category->id == $post->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="mtitle" class="form-control fill" >
                            <option value="0">Manşette Başlık</option>
                            @if($post->mtitle==0)
                                <option value="0" selected>Göster</option>
                                <option value="1">Gösterme</option>
                            @elseif($post->mtitle==1)
                                <option value="0" >Göster</option>
                                <option value="1" selected>Gösterme</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="source_id" class="form-control fill" >
                            <option value="">Kaynak seçin</option>
                            @foreach($sources as $source)
                                <option value="{{ $source->id }}"  {{ $source->id == $post->source_id ? 'selected' : '' }} >{{ $source->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row clearfix">
                    <label class="col-sm-2 col-form-label">Diğer Ayarlar</label>
                    <div class="col-sm-2">
                        <select name="publish" class="form-control fill">
                            @if($post->publish==0)
                                <option value="0" selected>Yayında</option>
                                <option value="1">Taslak</option>
                            @elseif($post->publish==1)
                                <option value="0">Yayında</option>
                                <option value="1" selected>Taslak</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select name="location" class="form-control fill">
                            @if($post->location==0)
                                <option value="0" selected>Standart</option>
                                <option value="1">Manşet</option>
                                <option value="2">Sür Manşet</option>
                                <option value="3">Top Manşet</option>
                            @elseif($post->location==1)
                                <option value="0">Standart</option>
                                <option value="1" selected>Manşet</option>
                                <option value="2">Sür Manşet</option>
                                <option value="3">Top Manşet</option>
                            @elseif($post->location==2)
                                <option value="0">Standart</option>
                                <option value="1">Manşet</option>
                                <option value="2" selected>Sür Manşet</option>
                                <option value="3">Top Manşet</option>
                            @elseif($post->location==3)
                                <option value="0">Standart</option>
                                <option value="1">Manşet</option>
                                <option value="2">Sür Manşet</option>
                                <option value="3" selected>Top Manşet</option>
                            @endif

                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="photogallery_id" class="form-control fill">
                            <option value="0">Foto Galeri Seçilmedi</option>
                            @if(!empty($photogalleries))
                                @foreach($photogalleries as $photogallery)
                                    <option value="{{ $photogallery->id }}" {{ $photogallery->id == $post->photogallery_id ? 'selected' : '' }} >{{ $photogallery->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="videogallery_id" class="form-control fill">
                            <option value="0">Video Galeri Seçilmedi</option>
                            @if(!empty($photogalleries))
                                @foreach($videogalleries as $videogallery)
                                    <option value="{{ $videogallery->id }}" {{ $videogallery->id == $post->videogallery_id ? 'selected' : '' }}>{{ $videogallery->title }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <hr>
                <div class="form-group has-warning row">
                    <div class="col-sm-2">
                        <label class="col-form-label" for="meta1">Meta anahtar kelimeler (Opsiyonel)</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="meta1" name="meta_keywords" value="{{ $post->meta_keywords }}">
                        <div class="col-form-label">Arama motorları için kelime bazlı önem taşır.</div>
                    </div>
                </div>
                <div class="form-group has-warning row">
                    <div class="col-sm-2">
                        <label class="col-form-label" for="meta2">Meta açıklama (Opsiyonel)</label>
                    </div>
                    <div class="col-sm-10">
                        <textarea rows="2" cols="5" class="form-control " placeholder="" name="meta_description"  id="meta2">{{ $post->meta_description }}</textarea>
                        <div class="col-form-label">Arama motorları maksimum 200 karakteri geçmeyecek şekilde doldurulabilir.</div>
                    </div>
                </div>
                <hr>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mevcut resim</label>
                    <div class="col-sm-10">
                        <img src="/{{ $post->image }}" width="200" >
                    </div>
                </div>

                <div id="out"></div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Standart Haber Fotoğrafı</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="image">
                        <a class="btn btn-primary imageRepo btn-mini my-2" data-toggle="collapse" href="#Repo" role="button" aria-expanded="false" aria-controls="Repo">
                            Sunucudan Getir
                        </a>
                        <div class="collapse m-2" id="Repo"><div class="row border p-2 image_standart"></div></div>
                        <div class="image-select my-2"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ana Manşet Fotoğrafı</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="image_main">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Top Manşet Fotoğrafı</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="image_top">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mini Manşet Fotoğrafı</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="image_mini">
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
    <script>CKEDITOR.replace( 'ckeditor');</script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/jquery.marcopolo.min.js') }}"></script>
    @include('admin.post.fm')
@endsection


