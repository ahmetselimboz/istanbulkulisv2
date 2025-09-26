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
                        <th>Ad Soyad</th>
                        <th>E Posta</th>
                        <th>Yetkisi</th>
                        <th>Kayıt Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>@if($user->status==2) Köşe Yazarı @elseif($user->status==1) Yönetici @elseif($user->status==3) Haber Editörü @else Standart Kullanıcı @endif</td>
                            <td>{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
                            <td>
                                    <a href="{{ route('user.edit', $user->id) }}"><i class="icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green"></i></a>

                                    <a href="{{ route('user.destroy', $user->id) }}" ><i class="feather icon-trash-2 f-w-600 f-16 text-c-red"></i></a>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
