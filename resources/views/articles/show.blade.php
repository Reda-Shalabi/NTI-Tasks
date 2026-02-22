@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
  }

  .article-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 20px;
  }

  .article-glass-box {
    padding: 40px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    color: #000;
    margin-bottom: 30px;
  }

  .article-glass-box h3 {
    font-weight: bold;
    font-size: 2.2rem;
    margin-bottom: 1rem;
    color: #2c3e50;
  }

  .article-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    border-bottom: 2px solid #ecf0f1;
    margin-bottom: 20px;
    font-size: 0.95rem;
    color: #7f8c8d;
  }

  .article-body {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
    margin-bottom: 30px;
  }

  .article-actions {
    display: flex;
    gap: 10px;
    margin-top: 20px;
  }

  .article-actions a, .article-actions button {
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-weight: 600;
    transition: all 0.3s;
  }

  .btn-secondary {
    background: #95a5a6;
    color: white;
  }

  .btn-secondary:hover {
    background: #7f8c8d;
  }

  .btn-primary {
    background: #4ca1af;
    color: white;
  }

  .btn-primary:hover {
    background: #3a8597;
  }

  .btn-danger {
    background: #e74c3c;
    color: white;
  }

  .btn-danger:hover {
    background: #c0392b;
  }

  /* Comments Section */
  .comments-section {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 16px;
    padding: 40px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
  }

  .comments-section h2 {
    font-size: 1.8rem;
    color: #2c3e50;
    margin-bottom: 30px;
    border-bottom: 3px solid #4ca1af;
    padding-bottom: 15px;
  }

  .comment-form {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 30px;
    border-left: 4px solid #4ca1af;
  }

  .comment-form textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-family: 'Segoe UI', sans-serif;
    font-size: 1rem;
    resize: vertical;
    min-height: 100px;
  }

  .comment-form textarea:focus {
    outline: none;
    border-color: #4ca1af;
    box-shadow: 0 0 5px rgba(76, 161, 175, 0.3);
  }

  .comment-form button {
    background: #4ca1af;
    color: white;
    padding: 10px 30px;
    border: none;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    margin-top: 10px;
    transition: all 0.3s;
  }

  .comment-form button:hover {
    background: #3a8597;
  }

  .comment-item {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    border-left: 4px solid #4ca1af;
  }

  .comment-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 10px;
  }

  .comment-author {
    font-weight: 600;
    color: #2c3e50;
  }

  .comment-time {
    font-size: 0.85rem;
    color: #95a5a6;
  }

  .comment-body {
    color: #333;
    line-height: 1.6;
    margin: 10px 0;
  }

  .comment-actions {
    display: flex;
    gap: 10px;
    margin-top: 10px;
  }

  .comment-actions a, .comment-actions button {
    background: none;
    border: none;
    color: #4ca1af;
    cursor: pointer;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 600;
    padding: 0;
    transition: color 0.3s;
  }

  .comment-actions a:hover, .comment-actions button:hover {
    color: #e74c3c;
  }

  .replies {
    margin-top: 20px;
    padding-left: 30px;
    border-left: 2px solid #ecf0f1;
  }

  .reply-item {
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
    border-left: 3px solid #95a5a6;
  }

  .reply-item .comment-header {
    margin-bottom: 8px;
  }

  .reply-item .comment-body {
    margin: 8px 0;
  }

  .reply-form {
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    margin-top: 15px;
    border-left: 3px solid #95a5a6;
  }

  .reply-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-family: 'Segoe UI', sans-serif;
    font-size: 0.95rem;
    min-height: 70px;
  }

  .reply-form textarea:focus {
    outline: none;
    border-color: #4ca1af;
    box-shadow: 0 0 5px rgba(76, 161, 175, 0.3);
  }

  .reply-form button {
    background: #4ca1af;
    color: white;
    padding: 8px 20px;
    border: none;
    border-radius: 6px;
    font-size: 0.9rem;
    font-weight: 600;
    cursor: pointer;
    margin-top: 8px;
    transition: all 0.3s;
  }

  .reply-form button:hover {
    background: #3a8597;
  }

  .no-comments {
    text-align: center;
    color: #95a5a6;
    padding: 40px 20px;
    font-size: 1.1rem;
  }

  .auth-required {
    text-align: center;
    color: #7f8c8d;
    font-size: 0.95rem;
    background: #d1ecf1;
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 20px;
  }

  .auth-required a {
    color: #0c5460;
    text-decoration: underline;
    font-weight: 600;
  }
</style>

<div class="article-container">
  <!-- Article Display -->
  <div class="article-glass-box">
    <h3>{{ $article->title }}</h3>
    
    <div class="article-meta">
      <div>
        <strong>الكاتب:</strong> {{ $article->user->name ?? 'مجهول' }}
        @if($article->user->isAdmin())
          <span style="background: #e74c3c; color: white; padding: 2px 8px; border-radius: 3px; font-size: 0.8rem; margin-left: 5px;">👑 Admin</span>
        @endif
        <br>
        <small>{{ $article->created_at->format('d/m/Y \a\t H:i') }}</small>
      </div>
      @can('update', $article)
        <div class="article-actions">
          <a href="{{ route('articles.edit', $article) }}" class="btn-primary">✏️ تعديل</a>
          <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger" onclick="return confirm('هل تريد حذف هذه المقالة؟')">🗑️ حذف</button>
          </form>
        </div>
      @endcan
    </div>

    <div class="article-body">
      {!! nl2br(e($article->body)) !!}
    </div>

    <div class="article-actions">
      <a href="{{ route('articles.index') }}" class="btn-secondary">⬅ رجوع للمقالات</a>
    </div>
  </div>

  <!-- Comments Section -->
  <div class="comments-section">
    <h2>💬 التعليقات ({{ $article->topLevelComments()->count() }})</h2>

    @if(session('success'))
      <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 6px; margin-bottom: 20px;">
        {{ session('success') }}
      </div>
    @endif

    <!-- Add Comment Form -->
    @auth
      <div class="comment-form">
        <form action="{{ route('comments.store', $article) }}" method="POST">
          @csrf
          <textarea name="body" placeholder="شارك رأيك..." required></textarea>
          @error('body')
            <span style="color: #e74c3c;">{{ $message }}</span>
          @enderror
          <button type="submit">إرسال التعليق</button>
        </form>
      </div>
    @else
      <div class="auth-required">
        <a href="{{ route('login') }}">سجّل دخولك</a> لإضافة تعليق على هذه المقالة.
      </div>
    @endauth

    <!-- Comments List with Recursion -->
    @if($article->comments()->count() > 0)
      @foreach($article->comments()->latest()->get() as $comment)
        @include('comments.comment-item', ['comment' => $comment, 'article' => $article])
      @endforeach
    @else
      <div class="no-comments">
        لا توجد تعليقات بعد. كُن الأول في التعليق! 💭
      </div>
    @endif
  </div>
</div>

<script>
  function toggleReplyForm(commentId) {
    const form = document.getElementById('reply-form-' + commentId);
    if (form.style.display === 'none') {
      form.style.display = 'block';
    } else {
      form.style.display = 'none';
    }
  }
</script>

@endsection
