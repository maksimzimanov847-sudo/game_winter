@extends('layouts.game')

@section('title', 'Game zone')

@section('content')
    <div class="container py-4">
        <h1 class="mb-4">Game zone</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($articles as $article)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-light">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">Рейтинг: {{ $article->rating }}/</span>
                                <small class="text-muted">#{{ $article->id }}</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Автор: {{ $article->author }}</h6>
                            <p class="card-text mt-3">{{ Str::limit($article->description, 200) }}</p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Создано: {{ $article->created_at->format('d.m.Y H:i') }}</small>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-primary">
                                        Редактировать
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        Статьи пока не добавлены. <a href="{{ route('articles.create') }}" class="alert-link">Добавить первую статью</a>
                    </div>
                </div>
            @endforelse
        </div>

        @if($articles->hasPages())
            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
@endsection



