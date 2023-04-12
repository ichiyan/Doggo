<nav id="navbar" class="navbar">
    <ul>
      <li><a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }} " href="{{ url('/') }}">Home</a></li>
      <li><a class="nav-link scrollto" href="/#about">About</a></li>
      <li><a class="nav-link scrollto @if (str_contains(url()->current(), '/shop')) active @endif " href="/shop">Shop</a></li>
      <li><a class="nav-link scrollto" href="/rehome">Rehome</a></li>
      <li><a class="nav-link scrollto" href="/stud_service">Stud Service</a></li>
      <li><a class="nav-link scrollto" href="/#faq">F.A.Q</a></li>
      <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
      @if (Route::has('login'))
        @auth
        <li class="dropdown">
            <a href="#">
                <span class="nav-link">{{ Auth::user()->profiles->name }}</span>
                {{-- <img class="img-profile rounded-circle" src="{{asset('images/profile-user.svg')}}"> --}}
                <img class="img-profile rounded-circle" src="{{ url(Auth::user()->profiles->profile_pic) }}">
            </a>
            <ul>
                @if ( Auth::user()->profiles->is_admin || Auth::user()->profiles->pcci_member_id != null )
                    <li>
                        <a class="nav-user-dropdown" href="{{ route('shop.create') }}">
                            <i class="fas fa-dog fa-sm fa-fw mr-2 text-gray-400"></i>
                            <span class="badge badge-warning" style="color: black;">Sell a dog</span>
                        </a>
                    </li>
                    <div class="dropdown-divider"></div>
                @endif

                <li><a class="nav-user-dropdown" href="{{ route('profile_all', Auth::user()->id) }}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile</a></li>
                <div class="dropdown-divider"></div>
                <li><a class="nav-user-dropdown" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a></li>
            </ul>
        @else
            <li><a class="nav-link scrollto  @if (str_contains(url()->current(), 'login')) active @endif" href="{{ route('login') }}">Log In</a></li>
            <li><a class="sign-up scrollto" href="{{ route('register') }}">Sign Up</a></li>
        @endauth
      @endif
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->
