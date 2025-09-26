@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Kaynak Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Eklenme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sources as $source)
                        <tr>
                            <th scope="row">{{ $source->id }}</th>
                            <td>{{ $source->title }}</td>
                            <td>{{ date('d-m-Y', strtotime($source->created_at)) }}</td>

                            <td>
                                    <a href="{{ route('source.edit', $source->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>

                                    <a href="{{ route('source.destroy', $source->id) }}" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $sources->links() }}
            </div>
        </div>
    </div>
@endsection
