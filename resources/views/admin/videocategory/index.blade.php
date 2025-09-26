@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Kategori Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kategori</th>
                        <th>Açıklama</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                    <a href="{{ route('videogallerycategory.edit', $category->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>

                                    <a href="{{ route('videogallerycategory.destroy', $category->id) }}" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
