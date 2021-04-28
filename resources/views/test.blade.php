<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ella</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{-- <link href="{{asset('css/styles.scss')}}" rel="stylesheet"> --}}

</head>

<body>

   <div id="hero">
    <div class="container">
        <div class="row text-center text-xl-left justify-content-center justify-content-xl-start">
            <div class="col-md-10 col-lg-8 col-xl-6 px-lg-5" data-aos="fade-up" data-aos-delay="900" data-aos-duration="800">
                <h1 class="text-uppercase mb-0">Doggo</h1>
                <h2 class="font-weight-light text-uppercase mb-0">Committed to ethical dog breeding</h2>
                <div class="my-5">
                    <h3 class="h4 font-weight-bold text-uppercase text-black-50">100% Lorem</h3>
                    <p class="lead pr-lg-5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
                </div>
                <a href="#about" class="hero-btn"><i class="icofont-paw"></i>Learn More</a>
            </div>
        </div>
    </div>
    <div class="shapes-wrapper">
        <img class="shape-top-left" data-aos="fade-right" data-aos-duration="1000" src="{{asset('images/top-left_Mesa%20de%20trabajo%201.svg')}}" />
        <img class="shape-top-right" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000" src="{{asset('images/top-right_Mesa%20de%20trabajo%201.svg')}}" />
        <img class="shape-bottom" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000" src="{{asset('images/bottom_Mesa%20de%20trabajo%202.svg')}}" />
    </div>
    <img class="hero-main-image-desktop d-none d-xl-block" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000" src="{{asset('images/main-image.png')}}" />
    <img class="hero-main-image-mobile d-block d-xl-none" data-aos="fade-up" src="{{asset('images/main-image-mobile.png')}}" />
</div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script> --}}
</body>

</html>
