@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
  }

  .dashboard-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 40px 20px;
  }

  .dashboard-header {
    text-align: center;
    color: white;
    margin-bottom: 40px;
  }

  .dashboard-header h1 {
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
  }

  .dashboard-header p {
    font-size: 1.2rem;
    opacity: 0.9;
  }

  .admin-badge {
    display: inline-block;
    background: #e74c3c;
    color: white;
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 1rem;
    font-weight: 600;
    margin-left: 10px;
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
  }

  .stat-card {
    border-radius: 12px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 30px;
    text-align: center;
    color: white;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    transition: transform 0.3s, box-shadow 0.3s;
  }

  .stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.35);
  }

  .stat-card .number {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
  }

  .stat-card .label {
    font-size: 1rem;
    opacity: 0.9;
  }

  .articles-section {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    padding: 30px;
    color: white;
    margin-bottom: 30px;
  }

  .articles-section h2 {
    margin-bottom: 20px;
    font-size: 1.8rem;
  }

  .article-item {
    background: rgba(255, 255, 255, 0.05);
    border-left: 4px solid #4ca1af;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 6px;
    transition: all 0.3s;
  }

  .article-item:hover {
    background: rgba(255, 255, 255, 0.1);
    border-left-color: #f39c12;
  }

  .article-item h3 {
    margin: 0 0 5px 0;
    font-size: 1.1rem;
  }

  .article-item p {
    margin: 5px 0;
    opacity: 0.8;
    font-size: 0.95rem;
  }

  .article-actions {
    margin-top: 10px;
  }

  .article-actions a, .article-actions button {
    margin-right: 10px;
  }

  .btn-link {
    color: #4ca1af;
    text-decoration: none;
    cursor: pointer;
    background: none;
    border: none;
    font-weight: 600;
  }

  .btn-link:hover {
    color: #f39c12;
    text-decoration: underline;
  }

  .no-articles {
    text-align: center;
    opacity: 0.7;
    padding: 20px;
  }

  .action-buttons {
    margin-top: 30px;
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
  }

  .action-buttons a {
    padding: 12px 30px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
    background: #4ca1af;
    color: white;
  }

  .action-buttons a:hover {
    background: #3a8597;
  }

  .users-section {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 12px;
    padding: 30px;
    color: white;
    margin-bottom: 30px;
  }

  .users-section h2 {
    margin-bottom: 20px;
    font-size: 1.8rem;
  }

  .user-item {
    background: rgba(255, 255, 255, 0.05);
    border-left: 4px solid #4ca1af;
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 6px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s;
  }

  .user-item:hover {
    background: rgba(255, 255, 255, 0.1);
    border-left-color: #f39c12;
  }

  .user-info {
    flex: 1;
  }

  .user-info h4 {
    margin: 0 0 5px 0;
    font-size: 1.1rem;
  }

  .user-email {
    opacity: 0.7;
    font-size: 0.9rem;
  }

  .user-role {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    margin-left: 10px;
  }

  .user-role.admin {
    background: #e74c3c;
    color: white;
  }

  .user-role.user {
    background: #3498db;
    color: white;
  }

  .user-actions {
    display: flex;
    gap: 10px;
    align-items: center;
  }

  .toggle-role-btn {
    background: #f39c12;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    font-size: 0.9rem;
  }

  .toggle-role-btn:hover {
    background: #e67e22;
  }

  .role-dropdown {
    background: rgba(255, 255, 255, 0.95);
    color: #333;
    border: 1px solid #ddd;
    padding: 8px 12px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    font-size: 0.9rem;
  }

  .role-dropdown:hover {
    background: #fff;
    border-color: #4ca1af;
  }

  .role-dropdown:focus {
    outline: none;
    border-color: #4ca1af;
    box-shadow: 0 0 5px rgba(76, 161, 175, 0.3);
  }

  .alert {
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 20px;
  }

  .alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
  }

  .alert-error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
  }
</style>

<div class="dashboard-container">
  <div class="dashboard-header">
    <h1>
      Dashboard 
      @if(auth()->user()->isAdmin())
        <span class="admin-badge"> ADMIN</span>
      @endif
    </h1>
    <p>Welcome back {{ auth()->user()->name }}! </p>
  </div>

  <!-- Stats Grid -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="number">{{ auth()->user()->articles()->count() }}</div>
      <div class="label">My Articles</div>
    </div>
    <div class="stat-card">
      <div class="number">{{ auth()->user()->comments()->count() }}</div>
      <div class="label">My Comments</div>
    </div>
    @if(auth()->user()->isAdmin())
      <div class="stat-card">
        <div class="number">{{ \App\Models\Article::count() }}</div>
        <div class="label">Total Articles</div>
      </div>
      <div class="stat-card">
        <div class="number">{{ \App\Models\User::count() }}</div>
        <div class="label">Total Users</div>
      </div>
    @endif
  </div>

  <!-- My Articles Section -->
  <div class="articles-section">
    <h2>My Articles</h2>
    
    @if(auth()->user()->articles()->count() > 0)
      @foreach(auth()->user()->articles()->latest()->get() as $article)
        <div class="article-item">
          <h3>{{ $article->title }}</h3>
          <p><strong>Comments:</strong> {{ $article->topLevelComments()->count() }}</p>
          <p style="opacity: 0.6; font-size: 0.9rem;">{{ $article->created_at->format('m/d/Y') }}</p>
          <div class="article-actions">
            <a href="{{ route('articles.show', $article) }}" class="btn-link">View</a>
            <a href="{{ route('articles.edit', $article) }}" class="btn-link">Edit</a>
            <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-link" onclick="return confirm('Delete this article?')">Delete</button>
            </form>
          </div>
        </div>
      @endforeach
    @else
      <div class="no-articles">
        <p>You haven't written any articles yet.</p>
      </div>
    @endif
  </div>

  <div class="action-buttons">
    <a href="{{ route('articles.create') }}">+ Create New Article</a>
    <a href="{{ route('articles.index') }}">View All Articles</a>
  </div>

  <!-- Admin Users Management Section -->
  @if(auth()->user()->isAdmin())
    <div class="users-section">
      <h2>👥 Users Management</h2>

      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
      @endif
      
      @php
        $users = \App\Models\User::latest()->get();
      @endphp

      @if($users->count() > 0)
        @foreach($users as $user)
          <div class="user-item">
            <div class="user-info">
              <h4>{{ $user->name }}</h4>
              <span class="user-email">{{ $user->email }}</span>
            </div>
            <div class="user-actions">
              @if(auth()->id() !== $user->id)
                <form action="{{ route('admin.users.toggle-role', $user) }}" method="POST" style="display: inline;">
                  @csrf
                  <select name="role" class="role-dropdown" onchange="this.form.submit()">
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>👤 User</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}> Admin</option>
                  </select>
                </form>
              @else
                <span class="user-role {{ $user->role }}">
                  @if($user->isAdmin())
                     Admin (You)
                  @else
                    👤 User (You)
                  @endif
                </span>
              @endif
            </div>
          </div>
        @endforeach
      @else
        <div class="no-articles">
          <p>No users found.</p>
        </div>
      @endif
    </div>
  @endif
</div>

@endsection
