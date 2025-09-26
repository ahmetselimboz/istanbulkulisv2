@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Kullanıcı Düzenle</h5>
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
            <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Ad Soyad</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="name" value="{{ $user->name }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E Posta</label>
                    <div class="col-sm-10">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Şifre</label>
                    <div class="col-sm-10">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Şifre Tekrar</label>
                    <div class="col-sm-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Yetkisi</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control fill">
                            @if($user->status==0)
                                <option value="0" selected>Standart Kullanıcı</option>
                                <option value="2">Köşe Yazarı</option>
                                <option value="3">Haber Editörü</option>
                                <option value="1">Yönetici</option>
                            @elseif($user->status==2)
                                <option value="0">Standart Kullanıcı</option>
                                <option value="2" selected>Köşe Yazarı</option>
                                <option value="3">Haber Editörü</option>
                                <option value="1">Yönetici</option>
                            @elseif($user->status==3)
                                <option value="0">Standart Kullanıcı</option>
                                <option value="2">Köşe Yazarı</option>
                                <option value="3" selected>Haber Editörü</option>
                                <option value="1">Yönetici</option>
                            @elseif($user->status==1)
                                <option value="0">Standart Kullanıcı</option>
                                <option value="2">Köşe Yazarı</option>
                                <option value="3">Haber Editörü</option>
                                <option value="1" selected>Yönetici</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Biyografi</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="about" >{{ $user->about }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Facebook</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="fb" value="{{ $user->fb }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Twitter</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="tw" value="{{ $user->tw }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Google Plus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="gp" value="{{ $user->gp }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">İnstagram</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="in" value="{{ $user->in }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Youtube</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="yt" value="{{ $user->yt }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Linkedin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="linkedin" value="{{ $user->linkedin }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Profil Fotoğrafı</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control form-control-normal" placeholder="" name="avatar">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mevcut Fotoğrafı</label>
                    <div class="col-sm-10">
                        <img src="/uploads/{{ $user->avatar }}" alt="" style="width: 200px;">
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