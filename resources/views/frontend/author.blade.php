@extends('layout-frontend')

@section('meta')
    <title>{{ $author->name }}</title>
    <meta name="description" content="{{ Str::limit(strip_tags($author->about), 145) }}">
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <!-- Makaleler -->
            <div class="col-md-8">
                <h2 class="mb-4">{{ $author->name }} - Yazıları</h2>

                @if ($articles->count())
                    @foreach ($articles as $article)
                        <div class="card mb-3">
                            <div class="card-body">
                                <!-- Başlık -->
                                <h5 class="card-title">
                                    <a href="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug]) }}"
                                       class="text-dark text-decoration-none">
                                        {{ $article->title }}
                                    </a>
                                </h5>

                                <!-- Meta -->
                                <p class="text-muted small mb-2">
                                    <i class="fa fa-calendar"></i> {{ date('d.m.Y', strtotime($article->created_at)) }}
                                    • <i class="fa fa-eye"></i> {{ views($article)->count() }} görüntüleme
                                </p>

                                <!-- İçerik Özeti -->
                                <p class="card-text">
                                    {{ Str::limit(strip_tags($article->detail), 200, '...') }}
                                </p>

                                <a href="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug]) }}"
                                   class="btn btn-primary btn-sm">Devamını Oku</a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Sayfalama -->
                    <div class="mt-4">
                        {{ $articles->links() }}
                    </div>
                @else
                    <div class="alert alert-info">Bu yazarın henüz yazısı bulunmuyor.</div>
                @endif
            </div>

            <!-- Yazar Bilgisi -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <!-- Avatar -->
                        <img src="{{ route('frontend.index') }}/uploads/{{ $author->avatar ?? 'default.png' }}"
                             alt="{{ $author->name }}"
                             class="rounded-circle mb-3"
                             style="width:120px; height:120px; object-fit:cover;">

                        <!-- İsim -->
                        <h5 class="card-title">{{ $author->name }}</h5>

                        <!-- Hakkında -->
                        <p class="card-text text-muted">
                            {{ $author->about ?? 'Yazar hakkında bilgi bulunmamaktadır.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
