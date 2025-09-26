@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Yorumu Düzenle</h5>
        </div>
        <div class="card-block">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('comment.update', $comment->id) }}" method="post">
                @csrf



                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Yorum</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" placeholder="" name="comment">{{ $comment->comment }}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Diğer ayarlar</label>
                    <div class="col-sm-10">
                        <select name="publish" class="form-control fill">
                            @if($comment->publish==0)
                                <option value="0" selected>Yayında</option>
                                <option value="1">Taslak</option>
                            @elseif($comment->publish==1)
                                <option value="0">Yayında</option>
                                <option value="1" selected>Taslak</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="text-right m-t-20">
                    <button class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
@endsection



@section('css')
@endsection

@section('js')
@endsection