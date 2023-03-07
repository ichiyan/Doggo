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
                             <p class="login-card-description">Register PCCI account</p>
                            <form action="{{ route ('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input id="email" type="email" class="form-control " name="email" value="{{ old('email') }}" required autofocus placeholder="Email address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="PCCI Member ID" class="sr-only">PCCI Member ID</label>
                                    <input id="PCCI Member ID" type="text" class="form-control " name="memberID" required autofocus placeholder="Member ID">
                                </div>
                                <div class="form-group mb-4">
                                        <label for="password" class="sr-only">Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="***********">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                                    <input id="password_confirmation" type="password" class="form-control " name="password" required placeholder="***********">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                                <div class="form-group ">
                                    <a href="/verify-email" name="register" id="register" class="btn btn-block login-btn mb-4">
                                        {{ __('Register') }}
                                    </a>
                                </div>
                                <p class="login-card-footer-text">Already have an account? <a href="{{ route('login') }}" class="text-reset sign-up-in-link">Login Here</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- End Login -->

@endsection


