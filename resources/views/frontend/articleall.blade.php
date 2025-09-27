@extends('layout-frontend')

@section('meta')
    <title>Tüm Makaleler - {{ $general->site_title }}</title>
    <meta name="description" content="En güncel makaleler ve haberlerin tümünü buradan takip edebilirsiniz.">
@endsection

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <!-- Ana Makale Listesi -->
                <div class="col-md-8">
                    <h1 class="mb-4">Tüm Makaleler</h1>

                    @if ($articles && $articles->count() > 0)
                        <div class="row">
                            @foreach ($articles as $article)
                                <div class="col-md-6 mb-4">
                                    <div class="card h-100">
                                        @if ($article->image)
                                            <a
                                                href="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug]) }}">
                                                <img src="{{ route('frontend.index') }}/uploads/{{ $article->image }}"
                                                    class="card-img-top" alt="{{ $article->title }}"
                                                    style="height:180px; object-fit:cover;">
                                            </a>
                                        @endif
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">
                                                <a href="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug]) }}"
                                                    class="text-dark text-decoration-none">
                                                    {{ $article->title }}
                                                </a>
                                            </h5>
                                            <p class="card-text small text-muted mb-2">
                                                <i class="fa fa-calendar"></i>
                                                {{ date('d.m.Y', strtotime($article->created_at)) }}
                                                • <i class="fa fa-eye"></i> {{ views($article)->count() }}
                                                @if ($article->author)
                                                    • <i class="fa fa-user"></i>
                                                    <a href="{{ route('frontend.author', ['id' => $article->author->id]) }}"
                                                        class="text-muted text-decoration-none">
                                                        {{ $article->author->name }}
                                                    </a>
                                                @endif
                                            </p>
                                            <p class="card-text">{{ str_limit(strip_tags($article->detail), 100, '...') }}
                                            </p>
                                            <div class="mt-auto">
                                                <a href="{{ route('frontend.article', ['id' => $article->id, 'slug' => $article->slug]) }}"
                                                    class="btn btn-primary btn-sm">Devamını Oku</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Sayfalama -->
                        <div class="mt-4">
                            {{ $articles->links() }}
                        </div>
                    @else
                        <div class="alert alert-info text-center">
                            Henüz makale bulunmuyor.
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-md-4">
                    {{-- Özelleştirilmiş sidebar, mevcut sidebar.json'dan bağımsız --}}
                    <div class="mb-4 card">
                        <h5 class="card-header">Son Makaleler</h5>
                        <div class="card-body">
                            <ul class="list-group">
                                @php
                                    try {
                                        $latestArticles = \App\Models\Article::where('publish', 0)
                                            ->with('author')
                                            ->orderBy('created_at', 'desc')
                                            ->take(5)
                                            ->get();
                                    } catch (\Exception $e) {
                                        $latestArticles = collect();
                                    }
                                @endphp
                                @if ($latestArticles && $latestArticles->count() > 0)
                                    @foreach ($latestArticles as $latest)
                                        <li class="list-group-item">
                                            <a href="{{ route('frontend.article', ['id' => $latest->id, 'slug' => $latest->slug]) }}"
                                                class="text-dark text-decoration-none">
                                                {{ str_limit($latest->title, 60) }}
                                            </a>
                                            @if ($latest->author)
                                                <div class="small text-muted mt-1">
                                                    <i class="fa fa-user"></i> {{ $latest->author->name }}
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach
                                @else
                                    <li class="list-group-item text-muted">Henüz makale bulunmuyor</li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <h5 class="card-header">Popüler Makaleler</h5>
                        <div class="card-body">
                            <ul class="list-group ">
                                @php
                                    try {
                                        $popularArticles = \App\Models\Article::where('publish', 0)
                                            ->with('author')
                                            ->orderBy('created_at', 'desc')
                                            ->take(5)
                                            ->get();
                                    } catch (\Exception $e) {
                                        $popularArticles = collect();
                                    }
                                @endphp
                                @if ($popularArticles && $popularArticles->count() > 0)
                                    @foreach ($popularArticles as $popular)
                                        <li class="list-group-item">
                                            <a href="{{ route('frontend.article', ['id' => $popular->id, 'slug' => $popular->slug]) }}"
                                                class="text-dark text-decoration-none">
                                                {{ str_limit($popular->title, 60) }}
                                            </a>
                                            <div class="small text-muted">
                                                @if ($popular->author)
                                                    <i class="fa fa-user"></i> {{ $popular->author->name }} •
                                                @endif
                                                <i class="fa fa-eye"></i> {{ views($popular)->count() }}
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="list-group-item text-muted">Henüz popüler makale bulunmuyor</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
