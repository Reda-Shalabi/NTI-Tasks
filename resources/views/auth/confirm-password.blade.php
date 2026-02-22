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
    margin: 80px auto;
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

  label {
    color: #fff;
  }

  .btn-primary {
    width: 100%;
    border: none;
  }
</style>

<div class="glass-box">
  <h3 class="text-center mb-4"> Confirm Password</h3>

  <p class="text-center text-light mb-4">
    This is a secure area of the application. <br>
    Please confirm your password before continuing.
  </p>

  <form method="POST" action="{{ route('password.confirm') }}">
    @csrf

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input id="password" type="password" name="password" class="form-control" placeholder="Enter your password" required autocomplete="current-password">
      @error('password')
        <small class="text-danger">{{ $message }}</small>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Confirm</button>
  </form>
</div>
@endsection
