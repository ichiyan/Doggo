<nav id="navbar" class="navbar">
    <ul>
      <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }} " href="{{ url('/') }}">Home</a></li>
      <li><a class="nav-link scrollto" href="/#about">About</a></li>
      <li><a class="nav-link scrollto" href="">Shop</a></li>
      <li><a class="nav-link scrollto" href="">Rehome</a></li>
      <li><a class="nav-link scrollto" href="">Stud Service</a></li>
      <li><a class="nav-link scrollto" href="/#faq">F.A.Q</a></li>
      <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
      @if (Route::has('login'))
        @auth
            <li><a href="{{ url('/home') }}">My Account</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        @else
        <li><a class="nav-link scrollto  @if (str_contains(url()->current(), 'login')) active @endif" href="{{ route('login') }}">Log In</a></li>
        <li><a class="sign-up scrollto" href="{{ route('register') }}">Sign Up</a></li>
        @endauth
      @endif
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->
