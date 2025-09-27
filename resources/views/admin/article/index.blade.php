@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Kullanıcı Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Başlık</th>
                            <th>Yazar</th>
                            <th>Hit</th>
                            <th>Eklenme Tarihi</th>
                            <th>Durumu</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <th scope="row">{{ $article->id }}</th>
                                <td>{{ $article->title }}</td>
                                <td>
                                    @if (isset($article->author->name))
                                        {{ $article->author->name }}
                                    @else
                                        Yazarı atanmamış
                                    @endif
                                </td>
                                <td>{{ views($article)->count() }}</td>
                                <td>{{ date('d-m-Y', strtotime($article->created_at)) }}</td>
                                <td>
                                    @if ($article->publish == 0)
                                        <label class="label label-success">Yayında</label>
                                    @elseif($article->publish == 1)
                                        <label class="label label-danger">Taslak</label>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('article.edit', $article->id) }}"><i
                                            class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>

                                    <a href="{{ route('article.destroy', $article->id) }}"><i
                                            class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
