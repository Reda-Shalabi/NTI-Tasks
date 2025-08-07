@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
  }

  .glass-box {
    max-width: 430px;
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

  .nav-tabs .nav-link.active {
    background-color: rgba(255, 255, 255, 0.2);
    color: #fff;
    border: none;
  }

  .nav-tabs .nav-link {
    color: #eee;
    border: none;
    border-radius: 0;
  }

  .form-control {
    background: rgba(255, 255, 255, 0.15);
    border: none;
    color: #fff;
  }

  .form-control::placeholder {
    color: #ddd;
  }

  .btn-primary, .btn-success {
    border: none;
    width: 100%;
  }

  .text-link a {
    color: #fff;
    text-decoration: underline;
  }

  label.form-label {
    color: #fff;
  }
</style>

<div class="glass-box">
  <ul class="nav nav-tabs justify-content-center mb-4" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab">
         Login
      </button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button" role="tab">
         Signup
      </button>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="login" role="tabpanel">
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Enter password" required>
        </div>

        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="remember" name="remember">
          <label class="form-check-label" for="remember">Remember Me</label>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
        @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
         @endif

        <div class="text-center text-link mt-3">
          <a href="{{ route('password.request') }}">Forgot password?</a><br>
          Don't have an account? <a href="#" data-bs-toggle="tab" data-bs-target="#signup">Register</a>
        </div>
      </form>
    </div>

    <div class="tab-pane fade" id="signup" role="tabpanel">
      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label class="form-label">Full Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter name" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Enter email" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" placeholder="Create password" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
        </div>

        <button type="submit" class="btn btn-success">Signup</button>
      </form>
    </div>
  </div>
</div>
@endsection
