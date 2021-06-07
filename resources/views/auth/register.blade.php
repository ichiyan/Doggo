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
                                <div class="form-group ">
                                    <a href="/PCCIregister" name="PCCI" id="register" class="btn btn-block login-btn mb-4">
                                        Register as PCCI member
                                    </a>
                                    <a href="/NonMemberRegister"name="Nonmember" id="Nonmember" class="btn btn-block login-btn mb-4">
                                        Register as non-member
                                    </a>
                                </div>
                                <p class="login-card-footer-text">Already have an account? <a href="{{ route('login') }}" class="text-reset">Login Here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- End Login -->

@endsection