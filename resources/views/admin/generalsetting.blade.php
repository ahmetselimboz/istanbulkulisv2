@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Genel Ayarlar</h5>
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
            <form action="{{ route('generalsetting.update', 1) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site Başlık</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_title" value="{{ $general->site_title }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site Anahtar Kelime</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_keywords" value="{{ $general->site_keywords }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site Açıklama</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="site_description">{{ $general->site_description }}</textarea>
                    </div>
                </div>
				
				<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Anasayfada görünecek seo alanı</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="site_mainpage_seo">{{ $general->site_mainpage_seo }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Google News Adı (Sahipse)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_newsname" value="{{ $general->site_newsname }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E Posta</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_email" value="{{ $general->site_email }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Telefon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_phone" value="{{ $general->site_phone }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Adres</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_address" value="{{ $general->site_address }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Copyright</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_copyright" value="{{ $general->site_copyright }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_url" value="{{ $general->site_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Facebook APP ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_facebookapp_id" value="{{ $general->site_facebookapp_id }}">
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Google Plus ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_googleplus_id" value="{{ $general->site_googleplus_id }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Facebook URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_facebook_url" value="{{ $general->site_facebook_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Twitter URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_twitter_url" value="{{ $general->site_twitter_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">İnstagram URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_instagram_url" value="{{ $general->site_instagram_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Youtube URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_youtube_url" value="{{ $general->site_youtube_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Çerez Politikası Metni</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_cookie_text" value="{{ $general->site_cookie_text }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Çerez Politikası URL</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="site_cookie_url" value="{{ $general->site_cookie_url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Özel Meta Tag</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="site_meta_tag">{{ $general->site_meta_tag }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Özel Analitik Kod</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="site_analytics">{{ $general->site_analytics }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sayfa Yenileme Süresi (Saniye )</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="Boş bırakabilirsiniz" name="site_refresh" value="{{ $general->site_refresh }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site Logo ( JPG veya PNG tavsiye edilir )</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="site_logo" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Menü Logo ( JPG veya PNG tavsiye edilir )</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="site_menu_logo" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Site Yayın Durumu</label>
                    <div class="col-sm-2">
                        <select name="site_publish" class="form-control fill">
                            @if($general->site_publish==0)
                                <option value="0" selected>Yayında</option>
                                <option value="1">Yapım Aşamasında</option>
                            @elseif($general->site_publish==1)
                                <option value="0">Yayında</option>
                                <option value="1" selected>Yapım Aşamasında</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="jumbotron py-2">
                    <h4>Anasayfa Spor ve Magazin kategorisi seçimi</h4>
                    <div class="row">
                        @foreach(explode(",", $general->home_box_list) as $key => $item)
                            @if($key==0)
                                <div class="col-md-2">Spor kategorisi
                                    <select name="categorybox[]" id="" class="form-control">
                                        @foreach($categories as $category)<option value="{{ $category->id }}" @if($category->id==$item) selected @endif>{{ $category->name }}</option>@endforeach
                                    </select>
                                </div>
                            @elseif($key==1)
                                <div class="col-md-2">Magazin kategorisi
                                    <select name="categorybox[]" id="" class="form-control">
                                        @foreach($categories as $category)<option value="{{ $category->id }}" @if($category->id==$item) selected @endif>{{ $category->name }}</option>@endforeach
                                    </select>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                
                <div class="jumbotron py-2">
                    <h4>Sabit Köşe Yazısı Alanı</h4>
                    <div class="row">
                         <div class="form-group col-md-4">
                            <label class="col-md-12 col-form-label">Resim</label>
                            <div class="col-md-12">
                                <input type="file" class="form-control form-control-normal" placeholder="" name="author_image" value="">
                            </div>
                        </div>
                         <div class="form-group col-md-4">
                            <label class="col-md-12 col-form-label">Ad</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-normal" placeholder="" name="author_name" value="{{ $general->author_name }}">
                            </div>
                        </div>
                         <div class="form-group col-md-4">
                            <label class="col-md-12 col-form-label">Soyad</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-normal" placeholder="" name="author_surname" value="{{ $general->author_surname }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       
                        <div class="form-group col-md-6">
                            <label class="col-md-12 col-form-label">Başlık</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-normal" placeholder="" name="author_title" value="{{ $general->author_title }}">
                            </div>
                        </div>
                         <div class="form-group col-md-6">
                            <label class="col-md-12 col-form-label">Makale Linki</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control form-control-normal" placeholder="" name="author_link" value="{{ $general->author_link }}">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="text-right m-t-20">
                    <button class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
@endsection
