@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>İletişim Talepleri</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Telefon</th>
                        <th>Mesaj</th>
                        <th>Durum</th>
                        <th>İP Adresi</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <th scope="row">{{ $message->id }}</th>
                            <td>{{ $message->title }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>

                                <button type="button" class="btn btn-mini btn-info waves-effect" data-toggle="modal" data-target="#small-Modal{{ $message->id }}"> OKU </button>
                                <div class="modal fade" id="small-Modal{{ $message->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Mesaj İçeriği</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="word-break: break-all; white-space: normal; width: 100%;">{{ $message->content }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Kapat</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                @if($message->publish==0)
                                    <label class="label label-success">Okundu</label>
                                @elseif($message->publish==1)
                                    <label class="label label-danger">Okunmadı</label>
                                @endif
                            </td>
                            <td>{{ $message->ip }}</td>
                            <td>
                                <a class="btn btn-success btn-mini" href="{{ route('message.edit', $message->id) }}"> Onayla </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $messages->links() }}
            </div>
        </div>
    </div>
@endsection
