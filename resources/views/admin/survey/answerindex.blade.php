@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5> </h5>
            <div class="alert alert-success background-success">İlgili Anket: <code>{{ $survey->title }}</code> </div>

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

            @foreach($surveyanswers as $surveyanswer)

                    <a href="{{ route('surveyanswer.destroy', $surveyanswer->id) }}" class="cCustom" style="float: left;"><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                    <form action="{{ route('surveyanswer.update', $surveyanswer->id) }}" method="post">
                        @csrf
                            <button class="btn cCustom" style="float: left;margin-right: 10px" ><i class="feather icon-edit f-w-600 f-16 text-c-red"></i></button>
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <input type="text" class="form-control form-control-normal" placeholder="" name="title" value="{{ $surveyanswer->title }}" required>
                                    <span style="background: dodgerblue; padding: 3px; color: #fff;">
                                        @if(!empty($surveyanswer->vote)) {{ $surveyanswer->vote }} oy verilmiş @else Oy verilmemiş @endif</span>
                                </div>
                            </div>
                        </form>
            @endforeach


                <hr>


            <form action="{{ route('surveyanswer.create', $survey->id) }}" method="post">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="Yeni seçenek" name="title" value="" >
                    </div>
                </div>

                <div class="text-right m-t-20">
                    <button class="btn btn-primary">Seçenek Ekle</button>
                </div>
            </form>



        </div>
    </div>
@endsection

@section('css')
    <style>
        .cCustom{
            margin: 0px!important;
            padding: 0px!important;
            margin-left: 10px!important;
            font-size: 19px;
        }
    </style>
@endsection

@section('js')
@endsection