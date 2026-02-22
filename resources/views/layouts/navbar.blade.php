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

  .nav-btn {
    background: linear-gradient(135deg, #4ca1af, #2c3e50);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white !important;
    padding: 6px 16px;
    border-radius: 6px;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
    font-weight: 600;
  }

  .nav-btn:hover {
    background: linear-gradient(135deg, #3a8597, #1f2d3d);
    border-color: rgba(255, 255, 255, 0.6);
    color: white !important;
    box-shadow: 0 4px 15px rgba(76, 161, 175, 0.3);
  }

  .nav-link {
    transition: all 0.3s ease;
  }

  .nav-link:hover {
    color: #4ca1af !important;
  }

  .logout-btn {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: white !important;
    padding: 6px 16px;
    border-radius: 6px;
    transition: all 0.3s ease;
    font-weight: 600;
  }

  .logout-btn:hover {
    background: linear-gradient(135deg, #c0392b, #a93226);
    border-color: rgba(255, 255, 255, 0.6);
    color: white !important;
    box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark glass-navbar py-3">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}"> Articles App</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center gap-2">
        @auth
          <li class="nav-item">
            <a class="nav-btn" href="{{ route('dashboard') }}"> Dashboard</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}"> My Articles</a>
          </li>


          @if(auth()->user()->isAdmin())
            <li class="nav-item">
              <span class="badge bg-danger" style="padding: 6px 12px; font-size: 0.9rem;"> Admin</span>
            </li>
          @endif

          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
              @csrf
              <button type="submit" class="logout-btn border-0" style="cursor: pointer;"> Logout</button>
            </form>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-btn" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-btn" href="{{ route('register') }}" style="background: linear-gradient(135deg, #8e44ad, #6c3483);"> Register</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
