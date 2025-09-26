@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Anket Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Anket <br> Seçenekleri </th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($surveys as $survey)
                        <tr>
                            <th scope="row">{{ $survey->id }}</th>
                            <td style="word-break: break-all; white-space: normal; width: 100%;">{{ $survey->title }}</td>
                            <td>
                                <a href="{{ route('surveyanswer.edit', $survey->id) }}"  ><i class="feather icon-eye f-w-600 f-16 text-c-red" style="font-size: 25px"></i></a>
                            </td>
                            <td>
                                @if($survey->publish==0)
                                    <label class="label label-success">Yayında</label>
                                @elseif($survey->publish==1)
                                    <label class="label label-danger">Taslak</label>
                                @endif
                            </td>
                            <td>
                                    <a href="{{ route('survey.edit', $survey->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                    <a href="{{ route('survey.destroy', $survey->id) }}" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $surveys->links() }}
            </div>
        </div>
    </div>
@endsection
