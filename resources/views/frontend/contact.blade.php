@extends('layout-frontend')


@section('meta')
    <title>İletişim</title>
@endsection


@section('css')
@endsection

@section('content')

    <main>
        <section class="section detail">
            <div class="container">
                <div class="content">
                    <div class="row">
                        <h1>İletişim Formu </h1>
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="col-12 col-md-12">
                            <div class="main-content">
                                <form method="post" action="{{route('frontend.contactsubmit')}}" role="form">
                                    @csrf
                                    <div class="row">

                                        <div class=" col-md-6" id="fname-field">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="title" placeholder="Konu" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6" id="lname-field">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phone" placeholder="Telefon" required>
                                            </div>
                                        </div>

                                        <div class="col-md-12" id="message-field">
                                            <div class="form-group">
                                                <textarea class="form-control"  name="content"  placeholder="Mesajınız" rows="4" required=""></textarea>
                                            </div>
                                            <div class="alert alert-info" role="alert">
                                                Mesajınız yöneticiye gönderilecek olup, iletişim kurulmasını sağlamak için telefon numaranızı doğru yazmanız gerekir.
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12 m-0">
                                            <button type="submit" class="btn red form-btn">Gönder</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

@section('js')
@endsection

