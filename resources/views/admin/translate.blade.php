@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Çeviri Ayarları</h5>
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
            <form action="{{ route('admin.translateupdate', ['postId' => $default->id, 'postType' => $postType]) }}" method="post" enctype="multipart/form-data">
                @csrf

                <hr>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Başlık</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" value="{{ $default->title }}" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Detay</label>
                    <div class="col-sm-10">
                        <textarea rows="5" cols="5" class="form-control" readonly>{!! strip_tags($default->detail) !!}</textarea>
                    </div>
                </div>
                <hr>



                <div id="accordion">
                    @foreach($lang as $key => $la)
                        <input type="hidden" name="postid" value="{{ $default->id }}">
                        <input type="hidden" name="posttype" value="{{ $postType }}">

                        <div class="card">
                            <div class="card-header" id="lang_{{ $la->id }}">
                                <h5 class="mb-0">
                                    <a href="javascript:void(0)" class="btn btn-link" data-toggle="collapse" data-target="#l_lang_{{ $la->id }}" aria-expanded="true" aria-controls="l_lang_{{ $la->id }}">
                                        {{ $la->title }}
                                    </a>
                                </h5>
                            </div>
                            <div id="l_lang_{{ $la->id }}" class="collapse @if($key==0) show @endif " aria-labelledby="lang_{{ $la->id }}" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Başlık</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-normal" name="lang[{{ $la->id }}][title]" value="{{ @$la->hook($default->id, $la->id)[0]->title }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Özet (opsiyonel)</label>
                                        <div class="col-sm-10">
                                            <textarea rows="2" cols="5" class="form-control" name="lang[{{ $la->id }}][description]">{{ @$la->hook($default->id, $la->id)[0]->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Detay</label>
                                        <div class="col-sm-10">
                                            <textarea rows="5" cols="5" class="form-control ckeditor" name="lang[{{ $la->id }}][detail]">{{ @$la->hook($default->id, $la->id)[0]->detail }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Anahtar Kelime</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control form-control-normal" name="lang[{{ $la->id }}][keywords]" value="{{ @$la->hook($default->id, $la->id)[0]->keywords }}" >
                                        </div>
                                    </div>

                                    <input type="hidden" name="lang[{{ $la->id }}][lang_id]" value="{{ $la->id }}" >
                                    <input type="hidden" name="lang[{{ $la->id }}][item_id]" value="{{ @$la->hook($default->id, $la->id)[0]->id }}" >
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>








                <div class="text-right m-t-20">
                    <button class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
    <script>CKEDITOR.replace( '.ckeditor');</script>
@endsection
