@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Dil Listesi</h5>
            <a href="{{ route('language.create') }}" class="btn btn-success float-right">Dil Ekle</a>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Kısaltma</th>
                        <th>Sabit Çeviri</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($languages as $language)
                        <tr>
                            <th scope="row">{{ $language->id }}</th>
                            <td>{{ $language->title }}</td>
                            <td>{{ $language->slug }}</td>
                            <td><a href="{{ route('language.staticword', $language->id) }}" class="btn btn-sm btn-success btn-fluid text-center">Liste</a></td>
                            <td>{{ date('d-m-Y', strtotime($language->created_at)) }}</td>
                            <td>
                                <a href="{{ route('language.edit', $language->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                                <a href="{{ route('language.destroy', $language->id) }}" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $languages->links() }}
            </div>
        </div>
    </div>
@endsection
