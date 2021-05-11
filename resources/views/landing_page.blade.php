@extends('layouts.main')

@section('hero')

  <!-- ======= Hero Section ======= -->

    <div id="hero">
        <div class="container">
            {{-- omitted class text center (if mobile), will add once bug is fixed --}}
            <div class="row text-xl-left justify-content-xl-start justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6 px-lg-5" data-aos="fade-up" data-aos-delay="900" data-aos-duration="800">
                    <h1 class="text-uppercase mb-0">Doggo</h1>
                    <h2 class="font-weight-light text-uppercase mb-0">Committed to ethical dog breeding</h2>
                    <div class="my-5">
                        <h3 class="h4 font-weight-bold text-uppercase text-black-50">100% Lorem</h3>
                        <p class="lead pr-lg-5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
                    </div>
                    <a href="#about" class="hero-btn scrollto"><i class="icofont-paw"></i>Learn More</a>
                </div>
            </div>
        </div>
        <div class="shapes-wrapper">
            <img class="shape-top-left" data-aos="fade-right" data-aos-duration="1000" src="{{asset('images/shape-top-left.svg')}}" />
            <img class="shape-top-right" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000" src="{{asset('images/shape-top-right.svg')}}" />
            <img class="shape-bottom" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000" src="{{asset('images/shape-bottom.svg')}}" />
        </div>
        <img class="hero-main-image-desktop d-none d-xl-block" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000" src="{{asset('images/main-image.png')}}" />
        <img class="hero-main-image-mobile d-block d-xl-none" data-aos="fade-up" src="{{asset('images/main-image-mobile.png')}}" />
    </div>

  <!-- End Hero -->

@endsection

@section('main')

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

          <div class="section-title" data-aos="zoom-in">
            <h2>What we do</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
                Voluptas nisi in quia excepturi nihil voluptas nam et ut. Expedita omnis eum consequatur non. Sed in asperiores aut repellendus. Error quisquam ab maiores. Quibusdam sit in officia
            </p>
            <a href="http://www.pcci.org.ph/" target="_blank" class="PCCI-btn">Visit PCCI Website</a>
          </div>

        </div>
      </section><!-- End About Section -->

    <!-- ======= Details Section ======= -->
    <section id="details" class="details">

      <div class="container">

        <div class="row content">
           <div class="col-md-4 align-self-center wrapper" data-aos="fade-right">
                <div class="details-img-wrapper sell">
                    <img src="{{asset('images/details-sell.jpg')}}" class="img-fluid details-img sell" alt="">
                </div>
           </div>

          <div class="col-md-8 pt-4 align-self-center" data-aos="fade-up">
            <h3>Sell temporibus maiores provident</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check"></i> Iure at voluptas aspernatur dignissimos doloribus repudiandae.</li>
              <li><i class="bi bi-check"></i> Est ipsa assumenda id facilis nesciunt placeat sed doloribus praesentium.</li>
            </ul>
            <p>
              Voluptas nisi in quia excepturi nihil voluptas nam et ut. Expedita omnis eum consequatur non. Sed in asperiores aut repellendus. Error quisquam ab maiores. Quibusdam sit in officia
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2 align-self-center wrapper" data-aos="fade-left">
            <div class="details-img-wrapper rehome">
                <img src="{{asset('images/details-rehome.jpg')}}" class="img-fluid details-img rehome" alt="">
            </div>
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1 align-self-center" data-aos="fade-up">
            <h3>Rehome Corporis temporibus maiores provident</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
            <p>
              Inventore id enim dolor dicta qui et magni molestiae. Mollitia optio officia illum ut cupiditate eos autem. Soluta dolorum repellendus repellat amet autem rerum illum in. Quibusdam occaecati est nisi esse. Saepe aut dignissimos distinctio id enim.
            </p>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 align-self-center wrapper" data-aos="fade-right">
            <div class="details-img-wrapper stud-service">
                <img src="{{asset('images/details-stud-service.jpg')}}" class="img-fluid details-img stud-service" alt="">
            </div>
          </div>
          <div class="col-md-8 pt-5" data-aos="fade-up">
            <h3>Stud Service consequatur ad ut est nulla consectetur reiciendis animi voluptas</h3>
            <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe odit aut quia voluptatem hic voluptas dolor doloremque.</p>
            <ul>
              <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
            </ul>
            <p>
              Qui consequatur temporibus. Enim et corporis sit sunt harum praesentium suscipit ut voluptatem. Et nihil magni debitis consequatur est.
            </p>
            <p>
              Suscipit enim et. Ut optio esse quidem quam reiciendis esse odit excepturi. Vel dolores rerum soluta explicabo vel fugiat eum non.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Details Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">

          <h2>Frequently Asked Questions</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="accordion-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row align-items-center">

          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-6 info">
                <i class="bx bx-map"></i>
                <h4>Office Address</h4>
                <p>Rm. 206 Hillcrest Condominium
                    <br>1616 E. Rodriguez, Sr. Blvd corner Hillcrest Street
                    <br>Cubao, Quezon City 1100, PHILIPPINES
                </p>
              </div>
              <div class="col-lg-6 info">
                <i class="bx bx-phone"></i>
                <h4>Call Us</h4>
                <p>+632-87218345<br>+632 - 3412-4104<br>Fax: +632-87217152</p>
              </div>
              <div class="col-lg-6 info">
                <i class="bx bx-envelope"></i>
                <h4>Email Us</h4>
                <p>info@pcci.org.ph</p>
              </div>
              <div class="col-lg-6 info">
                <i class="bx bx-time-five"></i>
                <h4>Office Hours</h4>
                <p>Mon - Fri: 8AM to 5PM</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.5500431365176!2d121.03906376478947!3d14.624689589787195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7b65acfd1c5%3A0x448a7eef078a78c2!2sPhilippine%20Canine%20Club%20Inc.!5e0!3m2!1sen!2shk!4v1619206014207!5m2!1sen!2shk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>

        </div>



      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @endsection

