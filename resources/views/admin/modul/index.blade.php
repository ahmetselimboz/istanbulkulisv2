@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Modül Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Değer</th>
                        <th>Bilgi</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($modules as $modul)
                        <form action="{{ route('modul.update', $modul->id) }}" method="post">
                            @csrf
                            <tr>
                                <th scope="row">{{ $modul->id }}</th>
                                <td>{{ $modul->title }}</td>
                                <td>
                                    @if($modul->id==19)
                                        <select name="value" id="value" class="form-control border">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if($modul->value==$category->id) selected @endif >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input class="form-control form-bg-primary col-md-6 text-center" type="text" name="value" value="{{ $modul->value }}">
                                    @endif
                                </td>
                                <td>
                                    @if(empty($modul->info))
                                        Ek Bilgi Yok
                                        @else
                                        {!! $modul->info !!}
                                    @endif
                                    </td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" @if($modul->publish==0) checked @endif name="publish">
                                        <span class="slider"></span>
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm"> Güncelle </button>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                    </tbody>
                </table>
                {{ $modules->links() }}
            </div>
        </div>
    </div>
@endsection



@section('css')
    <style>
        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection

@section('js')
@endsection