@extends('layout-admin')

@section('content')

            <div class="row">
                <div class="col-xl-5 col-md-12">
                    <div class="card sale-card">
                        <div class="card-header">
                            <h4 class="font-weight-bold m-0">Lisans ve Sistem Bilgileri</h4>
                        </div>
                        <div class="card-block" style="padding-top: 0px!important;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul class="basic-list list-icons">
                                        <li><h6><b class="font-weight-bold">Lisanslı domain:</b> {{ $_SERVER["SERVER_NAME"] }} </h6></li>
                                        <li><h6><b class="font-weight-bold">Lisanslı mail:</b> {{ $general->site_email }} </h6></li>
                                        <li><h6><b class="font-weight-bold">Yazılım versiyon:</b> v3.1 </h6></li>
                                        <li><h6><b class="font-weight-bold">PHP versiyon:</b> {{ phpversion() }} </h6></li>
                                    </ul>
                                    <div class="alert alert-info">Lisans değişikliği yapmak isterseniz lütfen iletişime geçin.
                                        <a href="">Sürüm notları için tıklayın</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card prod-p-card card-red">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Haberler</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $postcount }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-newspaper text-c-red f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card prod-p-card card-blue">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Yorumlar</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $commentcount }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comment text-c-blue f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card prod-p-card card-warning">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Video Galeriler</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $videocount }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-video text-c-red f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card prod-p-card card-success">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Foto Galeriler</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">{{ $photocount }}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-image text-c-blue f-18"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-5 col-md-12">
                    <div class="card latest-update-card">
                        <div class="card-header">
                            <h5>Son Hareketler</h5>
                        </div>
                        <div class="card-block">
                            <div class="scroll-widget">
                                <div class="latest-update-box">
                                    @foreach($activities as $activity)
                                        <div class="row p-t-10 p-b-10" style="    margin-bottom: 1px!important;">
                                            <div class="col-auto text-right update-meta" style="margin-left: -11px">
                                                <span class="badge badge-success" style="border-radius: .25rem;">
                                                    {{ date('H:i', strtotime($activity->created_at)) }} <br>
                                                    {{ date('d-m-Y', strtotime($activity->created_at)) }}
                                                </span>
                                            </div>
                                            <div class="col p-l-5">
                                                <a href="@if($activity->method=="POST") {{$activity->url}} @else javascript:void(0) @endif">
                                                    <h6>{{ $activity->user->name ." ". $activity->subject }}</h6>
                                                    <span>IP: {{ $activity->ip }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6">
                    <div class="card latest-update-card">
                        <div class="card-header">
                            <h5>Son Yorumlar</h5>
                        </div>
                        <div class="card-block">
                            <div class="scroll-widget">
                                <div class="latest-update-box">
                                    @foreach($comments as  $comment)
                                        <div class="row p-t-20 p-b-30">
                                            <div class="col-auto text-right update-meta p-r-0">
                                                <i class="b-primary update-icon ring"></i>
                                            </div>
                                            <div class="col p-l-5">
                                                <a href="{{ route('comment.edit', $comment->id) }}"><h6>{{ $comment->comment }}</h6></a>
                                                <p class="text-muted m-b-0">
                                                    @if($comment->publish==0)
                                                        <label class="label label-success">Yayında</label>
                                                    @elseif($comment->publish==1)
                                                        <label class="label label-danger">Taslak</label>
                                                    @endif
                                                    <a href="#!" class="text-c-blue">
                                                        @if(isset($comment->author->name))
                                                            {{ $comment->author->name }}
                                                        @else
                                                            Kullanıcı silinmiş
                                                        @endif
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-12">
                    <div class="card new-cust-card">
                        <div class="card-header">
                            <h5>Aktif Üyeler</h5>
                        </div>
                        <div class="card-block">
                            @foreach($users as $user)
                                <div class="align-middle m-b-35" style="    margin-bottom: 37.4px!important;">
                                    <img src="/uploads/{{ $user->avatar }}" alt="user image" class="img-radius img-40 align-top m-r-15">
                                    <div class="d-inline-block">
                                        <a href="{{ route('user.edit', $user->id) }}"><h6>{{ $user->name }}</h6></a>
                                        <p class="text-muted m-b-0">@if($user->status==2) Köşe Yazarı @elseif($user->status==1) Yönetici @else Standart Kullanıcı @endif</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>



                <div class="col-xl-12 col-md-12">
                    <div class="card latest-update-card">
                        <div class="card-header">
                            <h5>Son Eklenen Haberler</h5>
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
                            </div>
                        </div>
                    </div>
                </div>


            </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/widget.css') }}">
@endsection
