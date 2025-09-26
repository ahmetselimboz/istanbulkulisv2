@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Kod Oluşturucu</h5>
        </div>
        <div class="card-block">


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Reklam Kodunuz</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="code">{{ $result }}</textarea>
                    </div>
                </div>

        </div>
    </div>
@endsection



@section('css')
@endsection

@section('js')
@endsection