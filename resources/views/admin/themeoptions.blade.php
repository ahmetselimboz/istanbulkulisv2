@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Renk Tonları</h5>
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
            <form action="{{ route('themeoptionsupdate', 1) }}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-3">
                        <input type="color" id="menu_bg" name="menu_bg" value="{{ $themeoptions->menu_bg }}">
                        <label for="menu_bg">Menü Arkaplan Rengi</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="color" id="menu_color" name="menu_color" value="{{ $themeoptions->menu_color }}">
                        <label for="menu_color">Menü Yazı Rengi</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="color" id="footer_bg" name="footer_bg" value="{{ $themeoptions->footer_bg }}">
                        <label for="footer_bg">Footer Arkaplan Rengi</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="color" id="footer_color" name="footer_color" value="{{ $themeoptions->footer_color }}">
                        <label for="footer_color">Footer Yazı Rengi</label>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="card-header w-100" style="margin-bottom: 20px;">
                        <h5>Font Ayarları</h5>
                    </div>
                    <label for="body_font" class="col-md-2">Body Font Tipi</label>
                    <div class="col-sm-3">
                        <select name="body_font" id="body_font" class="form-control">
                            <option value="Roboto" {{ $themeoptions->body_font=="Roboto" ? "selected" : "" }} >Roboto</option>
                            <option value="Raleway" {{ $themeoptions->body_font=="Raleway" ? "selected" : "" }} >Raleway</option>
                            <option value="Open+Sans" {{ $themeoptions->body_font=="Open+Sans" ? "selected" : "" }} >Open+Sans</option>
                            <option value="Bodoni+Moda" {{ $themeoptions->body_font=="Bodoni+Moda" ? "selected" : "" }} >Bodoni+Moda</option>
                            <option value="Noto+Sans+JP" {{ $themeoptions->body_font=="Noto+Sans+JP" ? "selected" : "" }} >Noto+Sans+JP</option>
                            <option value="Lato" {{ $themeoptions->body_font=="Lato" ? "selected" : "" }}>Lato</option>
                            <option value="Montserrat" {{ $themeoptions->body_font=="Montserrat" ? "selected" : "" }}>Montserrat</option>
                            <option value="Oswald" {{ $themeoptions->body_font=="Oswald" ? "selected" : "" }}>Oswald</option>
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
