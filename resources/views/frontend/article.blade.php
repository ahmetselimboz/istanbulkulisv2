@extends('layout-frontend')

@section('meta')
    <title>{{ $article->title }}</title>
    <meta name="description" content="{{ Str::limit(strip_tags($article->detail), 145) }}">
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <!-- Makale İçerik -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <!-- Başlık -->
                        <h2 class="card-title">{{ $article->title }}</h2>

                        <!-- Meta Bilgiler -->
                        <p class="text-muted small mb-3">
                            <i class="fa fa-calendar"></i> {{ date('d.m.Y', strtotime($article->created_at)) }}  
                            • <i class="fa fa-eye"></i> {{ views($article)->count() }} görüntüleme
                        </p>

                        <!-- Makale İçerik -->
                        <div class="mb-3">
                            {!! $article->detail !!}
                        </div>

                        <!-- Paylaşım Butonları -->
                        <div class="d-flex gap-2 mb-3">
                            <a href="https://twitter.com/intent/tweet?url={{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug]) }}&text={{ $article->title }}"
                               class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-twitter"></i> Twitter
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug]) }}"
                               class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-facebook"></i> Facebook
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ $article->title }} - {{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug]) }}"
                               class="btn btn-outline-success btn-sm">
                                <i class="fa fa-whatsapp"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar: Yazar Bilgisi -->
            <div class="col-md-4">
                @if($article->author)
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <!-- Yazar Avatar -->
                            <img src="{{ route('frontend.index') }}/uploads/{{ $article->author->avatar ?? 'default.png' }}"
                                 alt="{{ $article->author->name }}"
                                 class="rounded-circle mb-3"
                                 style="width: 120px; height: 120px; object-fit: cover;">

                            <!-- Yazar Adı -->
                            <h5 class="card-title">{{ $article->author->name }}</h5>

                            <!-- Yazar Biyografi -->
                            <p class="card-text text-muted">
                                {{ $article->author->about ?? 'Yazar hakkında bilgi bulunmuyor.' }}
                            </p>

                            <!-- Yazarın Diğer Yazıları -->
                            <a href="{{ route('frontend.author', ['id' => $article->author->id]) }}"
                               class="btn btn-primary btn-sm">
                                Tüm Yazıları Gör
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
