@extends('layouts.app')

@section('content')
<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
  }

  .glass-box {
    max-width: 500px;
    margin: 80px auto;
    padding: 30px;
    border-radius: 16px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
    color: #fff;
  }

  .btn {
    width: 100%;
  }

  .btn-logout {
    background: transparent;
    color: #fff;
    text-decoration: underline;
    border: none;
    padding: 0;
  }

  .btn-logout:hover {
    color: #ddd;
  }

  p, div {
    color: #fff;
  }
</style>

<div class="glass-box text-center">

  <h3 class="mb-4">📧 Verify Your Email</h3>

  <p>
    Thanks for signing up! Before getting started, please verify your email address
    by clicking the link we just sent to you.
    <br>
    If you didn’t receive the email, we’ll gladly send you another.
  </p>

  @if (session('status') == 'verification-link-sent')
    <div class="alert alert-success mt-3">
      A new verification link has been sent to your email address.
    </div>
  @endif

  <div class="mt-4">
    <form method="POST" action="{{ route('verification.send') }}">
      @csrf
      <button type="submit" class="btn btn-primary mb-2">Resend Verification Email</button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn-logout">Log Out</button>
    </form>
  </div>
</div>
@endsection
