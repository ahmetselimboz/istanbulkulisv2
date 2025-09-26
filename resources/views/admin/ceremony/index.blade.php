@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Taziye Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>İsim Soyisim</th>
                        <th>Defin Tarihi</th>
                        <th>Defin Yeri</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ceremonies as $ceremony)
                        <tr>
                            <th scope="row">{{ $ceremony->id }}</th>
                            <td>{{ $ceremony->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($ceremony->burailday)) }}</td>
                            <td>{{ $ceremony->burail }}</td>
                            <td>
                                <a href="{{ route('ceremony.edit', $ceremony->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                <a href="{{ route('ceremony.destroy', $ceremony->id) }}" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $ceremonies->links() }}
            </div>
        </div>
    </div>
@endsection
