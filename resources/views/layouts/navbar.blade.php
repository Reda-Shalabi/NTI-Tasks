<style>
  body {
    background: linear-gradient(135deg, #2c3e50, #4ca1af);
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    color: #fff;
  }

  .glass-navbar {
    background: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
  }

  .glass-navbar .nav-link,
  .glass-navbar .navbar-brand {
    color: #ffffff !important;
    text-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
  }

  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(255,255,255,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark glass-navbar py-3">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">Articles App</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        @auth
          <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}">📚 My Articles</a>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-sm btn-outline-light ms-2">Logout</button>
            </form>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">🔐 Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">📝 Register</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
