@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Foto Galeri Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Resimler</th>
                        <th>Başlık</th>
                        <th>Kategori</th>
                        <th>Eklenme Tarihi</th>
                        <th>Durumu</th>
                        <th>Hit</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($photogalleries as $photogallery)
                        <tr>
                            <th scope="row">{{ $photogallery->id }}</th>
                            <th scope="row"><a href="{{ route('photogalleryimage.poll', $photogallery->id) }}"> <i class="feather icon-upload-cloud"></i> </a> </th>
                            <td style="word-break: break-all; white-space: normal; width: 100%;">{{ $photogallery->title }}</td>
                            <td>
                                @if(isset($photogallery->category->name))
                                    {{ $photogallery->category->name }}
                                @else
                                    Silinmiş
                                @endif
                            </td>
                            <td>{{ date('d-m-Y', strtotime($photogallery->created_at)) }}</td>
                            <td>
                                @if($photogallery->publish==0)
                                    <label class="label label-success">Yayında</label>
                                @elseif($photogallery->publish==1)
                                    <label class="label label-danger">Taslak</label>
                                @endif
                            </td>
                            <td>{{ $photogallery->getViews() }}</td>
                            <td>
                                    <a href="{{ route('photogallery.edit', $photogallery->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>

                                    <a href="{{ route('photogallery.destroy', $photogallery->id) }}" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $photogalleries->links() }}
            </div>
        </div>
    </div>
@endsection
