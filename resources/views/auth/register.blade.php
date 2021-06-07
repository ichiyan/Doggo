@extends('layouts.main')

@section('auth')

  <!-- ======= Login ======= -->
{{-- <div id="hero"> --}}
    <div id="hero" class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="shapes-wrapper">
            <img class="shape-top-left" data-aos="fade-right" data-aos-duration="1000" src="{{asset('images/shape-top-left.svg')}}" />
            <img class="shape-top-right" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000" src="{{asset('images/shape-top-right-v2.svg')}}" />
            <img class="shape-bottom" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000" src="{{asset('images/shape-bottom-v2.svg')}}" />
        </div>
        <div class="container login">
            <div class="card login-card" data-aos="fade-up">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{ asset('images/login-img.jpg') }}" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                             <p class="login-card-description">Register a new account</p>
                            <form action="{{ route ('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                        <label for="password" class="sr-only">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="***********">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <button type="submit" name="login" id="login" class="btn btn-block login-btn mb-4">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="forgot-password-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif

                                    <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Sign Up Here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- End Login -->

@endsection