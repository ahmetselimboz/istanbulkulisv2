@extends('layout-admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Reklam Listesi</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Başlık</th>
                        <th>Son Güncelleme</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($adverts as $advert)
                        <tr>
                            <th scope="row">{{ $advert->id }}</th>
                            <td>{{ $advert->title }}</td>
                            <td>{{ date('d-m-Y', strtotime($advert->updated_at)) }}</td>
                            <td>
                                @if($advert->publish==0)
                                    <label class="label label-success">Yayında</label>
                                @elseif($advert->publish==1)
                                    <label class="label label-danger">Gizli</label>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('advert.edit', $advert->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $adverts->links() }}
            </div>
        </div>
    </div>
@endsection
