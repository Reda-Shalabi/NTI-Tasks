@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
  }

  .glass-box {
    max-width: 450px;
    margin: auto;
    margin-top: 60px;
    padding: 30px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    color: #fff;
  }

  .form-control {
    background: rgba(255, 255, 255, 0.15);
    border: none;
    color: #fff;
  }

  .form-control::placeholder {
    color: #ddd;
  }

  .btn-success {
    width: 100%;
    border: none;
  }

  label.form-label {
    color: #fff;
  }

  .text-link a {
    color: #fff;
    text-decoration: underline;
  }
</style>

<div class="glass-box">
  <h3 class="text-center mb-4"> Create an Account</h3>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label class="form-label">Full Name</label>
      <input type="text" name="name" class="form-control" placeholder="Your name" required value="{{ old('name') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" placeholder="Your email" required value="{{ old('email') }}">
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Create password" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Confirm Password</label>
      <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
    </div>

    <button type="submit" class="btn btn-success">Register</button>

    <div class="text-center mt-3 text-link">
      Already have an account? <a href="{{ route('login') }}">Login</a>
    </div>
  </form>
</div>
@endsection
