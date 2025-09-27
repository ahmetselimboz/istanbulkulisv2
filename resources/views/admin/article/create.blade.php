@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Makale Ekle</h5>
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
            <form action="{{ route('article.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Makale başlığı</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-normal" placeholder="" name="title"
                            required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Makale içeriği</label>
                    <div class="col-sm-10">
                        <textarea id="ckeditor" name="detail" required></textarea>
                    </div>
                </div>

                <div class="form-group row clearfix">
                    <label class="col-sm-2 col-form-label">Diğer Ayarlar</label>
                    <div class="col-sm-4">
                        <select name="publish" class="form-control fill">
                            <option value="0">Yayında</option>
                            <option value="1">Taslak</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <select name="user_id" class="form-control fill">
                            <option value="0">Yazar seçilmedi</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
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
    <script src="//cdn.ckeditor.com/4.10.1/full/ckeditor.js"></script>
    <script>
        if (window.CKEDITOR && !CKEDITOR.plugins.get('multiupload')) {
            CKEDITOR.plugins.add('multiupload', {
                init: function(editor) {
                    editor.addCommand('multiUploadCmd', {
                        exec: function(editorInstance) {
                            const input = document.createElement('input');
                            input.type = 'file';
                            input.accept =
                                'image/png, image/gif, image/jpeg, image/webp';
                            input.multiple = true;
                            input.style.display = 'none';
                            document.body.appendChild(input);

                            input.addEventListener('change', function() {
                                if (!input.files || input.files.length === 0) {
                                    document.body.removeChild(input);
                                    return;
                                }

                                const formData = new FormData();
                                Array.from(input.files).forEach(function(file) {
                                    formData.append('images[]', file);
                                });
                                formData.append('_token',
                                    '{{ csrf_token() }}');

                                $('#form_loader').show();
                                $.ajax({
                                    url: "{{ route('article.editor.upload.multiple') }}",
                                    method: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(res) {
                                        try {
                                            if (res && res
                                                .success && Array
                                                .isArray(res.images)
                                            ) {
                                                res.images.forEach(
                                                    function(
                                                        url) {
                                                        editorInstance
                                                            .insertHtml(
                                                                '<p><img src="' +
                                                                url +
                                                                '" alt=""/></p>'
                                                            );
                                                    });
                                            } else {
                                                alert(
                                                    'Yükleme başarısız: Sunucudan beklenen yanıt alınamadı.'
                                                );
                                            }
                                        } finally {
                                            $('#form_loader')
                                                .hide();
                                            document.body
                                                .removeChild(input);
                                        }
                                    },
                                    error: function() {
                                        $('#form_loader').hide();
                                        alert(
                                            'Resimler yüklenemedi. Lütfen tekrar deneyin.'
                                        );
                                        document.body.removeChild(
                                            input);
                                    }
                                });
                            });

                            input.click();
                        }
                    });

                    editor.ui.addButton('MultiUpload', {
                        label: 'Çoklu Resim Yükle',
                        command: 'multiUploadCmd',
                        toolbar: 'insert',
                        icon: 'image'
                    });
                }
            });
        }



        CKEDITOR.replace('ckeditor', {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            extraPlugins: 'multiupload'
        });
    </script>
@endsection
