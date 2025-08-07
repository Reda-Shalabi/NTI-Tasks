@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    font-family: 'Segoe UI', sans-serif;
  }

  .edit-glass-box {
    max-width: 800px;
    margin: 60px auto;
    padding: 30px 40px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    color: #000;
  }

  .edit-glass-box h2 {
    font-weight: bold;
    font-size: 2rem;
    margin-bottom: 1.5rem;
  }

  .form-label {
    font-weight: 600;
  }

  .btn-primary {
    padding: 10px 25px;
    font-weight: 500;
  }
</style>

<div class="edit-glass-box">
    <h2>Edit Article</h2>

    <!-- Form to update existing article -->
    <form method="POST" action="{{ route('articles.update', $article->id) }}">
        @csrf
        @method('PUT')

        <!-- Title input field with current value -->
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>

        <!-- Body textarea field with current value -->
        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-control" rows="5" required>{{ old('body', $article->body) }}</textarea>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">Update Article</button>
    </form>
</div>
@endsection
