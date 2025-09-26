@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Yorum Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Yorum</th>
                        <th>Kullanıcı</th>
                        <th>İlgili Haber</th>
                        <th>Durum</th>
                        <th>İp</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as  $comment)
                        <tr>
                            <th scope="row">{{ $comment->id }}</th>
                            <td style="word-break: break-all; white-space: normal; width: 25%;">{{ $comment->comment }}</td>
                            <td>
                                @if(isset($comment->author->name))
                                    {{ $comment->author->name }}
                                @else
                                    Kullanıcı silinmiş
                                @endif
                            </td>
                            <td style="word-break: break-all; white-space: normal; width: 100%;">
                                @if(isset($comment->post->title))
                                    {{ $comment->post->title }}
                                @else
                                    Haber silinmiş
                                @endif
                            </td>
                            <td>
                                @if($comment->publish==0)
                                    <label class="label label-success">Yayında</label>
                                @elseif($comment->publish==1)
                                    <label class="label label-danger">Taslak</label>
                                @endif
                            </td>
                            <td>{{ $comment->ip }}</td>
                            <td>
                                    <a href="{{ route('comment.edit', $comment->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>

                                    <a href="{{ route('comment.destroy', $comment->id) }}" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
