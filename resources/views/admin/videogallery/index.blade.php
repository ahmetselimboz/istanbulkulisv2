@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Video Galeri Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Başlık</th>
                            <th>Kategori</th>
                            <th>Eklenme Tarihi</th>
                            <th>Durumu</th>
                            <th>Hit</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videogalleries as $videogallery)
                            <tr>
                                <th scope="row">{{ $videogallery->id }}</th>
                                <td style="word-break: break-all; white-space: normal; width: 100%;">
                                    {{ $videogallery->title }}</td>
                                <td>
                                    @if (isset($videogallery->category->name))
                                        {{ $videogallery->category->name }}
                                    @else
                                        Silinmiş
                                    @endif
                                </td>
                                <td>{{ date('d-m-Y', strtotime($videogallery->created_at)) }}</td>
                                <td>
                                    @if ($videogallery->publish == 0)
                                        <label class="label label-success">Yayında</label>
                                    @elseif($videogallery->publish == 1)
                                        <label class="label label-danger">Taslak</label>
                                    @endif
                                </td>
                                <td>{{ views($videogallery)->count() }}</td>
                                <td>
                                    <a href="{{ route('videogallery.edit', $videogallery->id) }}"><i
                                            class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>

                                    <a href="{{ route('videogallery.destroy', $videogallery->id) }}"><i
                                            class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $videogalleries->links() }}
            </div>
        </div>
    </div>
@endsection
