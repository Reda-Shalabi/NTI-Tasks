@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    font-family: 'Segoe UI', sans-serif;
  }

  .articles-glass-box {
    max-width: 800px;
    margin: 60px auto;
    padding: 30px 40px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    color: #dfdddd;
  }

  .article-card {
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.7);
    border: 1px solid rgba(255, 255, 255, 0.3);
    padding: 20px;
    margin-bottom: 20px;
    color: #000;
    transition: all 0.3s ease-in-out;
  }

  .article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    background: rgba(255, 255, 255, 0.9);
  }

  .article-card h4 {
    color: #000;
  }

  .article-card p {
    color: #333;
  }

  .article-card .btn {
    margin-right: 5px;
  }

  .btn-success,
  .btn-info,
  .btn-warning,
  .btn-danger {
    color: white !important;
    border: none;
  }

  .alert {
    border-radius: 8px;
    font-weight: bold;
  }
</style>

<div class="articles-glass-box">

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"> All Articles</h2>
        @auth
            <a href="{{ route('articles.create') }}" class="btn btn-success shadow">+ Create Article</a>
        @endauth
    </div>

    @forelse ($articles as $article)
        <div class="article-card">
            <h4>{{ $article->title }}</h4>
            <p>{{ Str::limit($article->body, 120) }}</p>
            <p style="font-size: 0.9rem;" class="text-muted">
                 By {{ $article->user->name ?? 'Unknown' }}
            </p>

            <div class="d-flex">
                <a href="{{ route('articles.show', $article) }}" class="btn btn-info btn-sm">View</a>

                @can('update', $article)
                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-sm">Edit</a>
                @endcan

                @can('delete', $article)
                    <form method="POST" action="{{ route('articles.destroy', $article) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                @endcan
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">
            No articles found.
        </div>
    @endforelse

</div>
@endsection
