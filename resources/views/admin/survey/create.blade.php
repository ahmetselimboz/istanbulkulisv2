@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Anket Ekle</h5>
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
            <form action="{{ route('survey.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Anket Başlık</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="title" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Açıklama</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control" cols="30" rows="2"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Yayın Durumu</label>
                    <div class="col-sm-2">
                        <select name="publish" class="form-control fill">
                                <option value="0" selected>Yayında</option>
                                <option value="1">Taslak</option>
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
@endsection