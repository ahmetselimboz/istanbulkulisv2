@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Haber Listesi</h5>
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
                        <th>Ekleyen Kişi</th>
                        <th>Durumu</th>
                        <th>Hit</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td style="word-break: break-all; white-space: normal; width: 100%;">{{ $post->title }}</td>
                            <td>
                                @if(isset($post->category->name))
                                    {{ $post->category->name }}
                                @else
                                    Silinmiş
                                @endif
                            </td>
                            <td>{{ date('d-m-Y', strtotime($post->created_at)) }}</td>
                            <td>
                                @if(isset($post->author->name))
                                    {{ $post->author->name }}
                                @else
                                    Silinmiş
                                @endif
                            </td>
                            <td>
                                @if($post->publish==0)
                                    <label class="label label-success">Yayında</label>
                                @elseif($post->publish==1)
                                    <label class="label label-danger">Taslak</label>
                                @endif
                            </td>
                            <td>{{views($post)->count()}}</td>
                            <td>
                                    <a href="{{ route('post.edit', $post->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>

                                    <a href="{{ route('post.destroy', $post->id) }}" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
