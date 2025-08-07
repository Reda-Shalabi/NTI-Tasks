@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    font-family: 'Segoe UI', sans-serif;
  }

  .welcome-glass-box {
    max-width: 700px;
    margin: 80px auto;
    padding: 50px 40px;
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    text-align: center;
    color: #000;
  }

  .welcome-glass-box h1 {
    font-weight: bold;
    font-size: 2.5rem;
  }

  .welcome-glass-box p {
    font-size: 1.2rem;
    margin-bottom: 30px;
  }

  .btn {
    padding: 10px 20px;
    font-size: 1rem;
  }

  .btn-outline-primary {
    color: #2c3e50;
    border-color: #2c3e50;
  }

  .btn-outline-primary:hover {
    background-color: #2c3e50;
    color: #fff;
  }
</style>

<div class="welcome-glass-box">
    <h1>👋 Welcome to the Articles App</h1>
    <p class="lead">Laravel + Bootstrap simple app to manage articles.</p>
    
    <div class="mt-4">
        <a href="{{ route('articles.index') }}" class="btn btn-primary me-2">📄 View Articles</a>
        
        @auth
            <a href="{{ route('articles.create') }}" class="btn btn-success">✍️ Create Article</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-primary">🔐 Login</a>
        @endauth
    </div>
</div>
@endsection
