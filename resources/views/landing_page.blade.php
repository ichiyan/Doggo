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
                        <h3 class="h4 font-weight-bold text-uppercase text-black-50">100% Guaranteed</h3>
                        <p class="lead pr-lg-5">A platform for ethical dog breeding.</p>
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
            <p>To promote the integrity of the purebred dog registry, to encourage ethical breeding practices, to organize world-class canine exhibitions, to disseminate canine information & education and to support purebred canine welfare.
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
            <h3>Sell</h3>
            <p class="fst-italic">
              This is Jose, with good qualities on check:
            </p>
            <ul>
              <li><i class="bi bi-check"></i> Registered Dog</li>
              <li><i class="bi bi-check"></i> Ethically Raised</li>
              <li><i class="bi bi-check"></i> Healthy</li>
              <li><i class="bi bi-check"></i> 100% Pure Bred</li>
            </ul>
          </div>
        </div>

        <div class="row content">
          <div class="col-md-4 order-1 order-md-2 align-self-center wrapper" data-aos="fade-left">
            <div class="details-img-wrapper rehome">
                <img src="{{asset('images/details-rehome.jpg')}}" class="img-fluid details-img rehome" alt="">
            </div>
          </div>
          <div class="col-md-8 pt-5 order-2 order-md-1 align-self-center" data-aos="fade-up">
            <h3>Rehome</h3>
            <p class="fst-italic">
              Rehoming a dog is not always a bad decision.
            </p>
            <p>
                There are times where giving up your dog is not the worst option.
                Many folks end up facing guilt about rehoming their dog, but in some cases it will be best for all parties involved.

Facing the fact that either your life circumstances and/or your dog’s behavior mean you might need to give him up is an incredibly brave conversation to have with yourself.
            </p>
            <p>
                Sometimes, keeping your dog in your home is flat-out dangerous for your family. In these cases, it’s important to get your dog out of your home as soon as possible.
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
            <h3>Stud Service</h3>
            <p><i>Gain whelps according to your needs</i></p>
            <ul>
              <li><i class="bi bi-check"></i> Good Pedigree</li>
              <li><i class="bi bi-check"></i> Champion</li>
              <li><i class="bi bi-check"></i> Healthy</li>
            </ul>
            <p>
                Dogs who have characteristics that enable the breed to perform the job or function for which it was bred.
            </p>
            <p>
              Stud Service focuses on getting progenies while having the dog's welfare in mind.
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
          {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
        </div>

        <div class="accordion-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1">What is PCCI? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                <p>
                    The PCCI is a nonstock, nonprofit, service-oriented corporation established for the primary purpose of handling the registration of the growing number of pure-bred dogs in the country. It is internationally recognized as the only registering body for pedigreed dogs in the country and is an active member of two international canine organizations, the 90 member Federation Cynologique International (FCI) based in Brussels, Belgium.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">What are the functions of the PCCI? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                <p>
                    Purebred means that the sire (father) and dam (mother) of a dog are members of a recognized breed and that the ancestry of a dog consists of the same breed over many generations. Basically, this indicates that the father and mother of the dog are registered and that their father and mother were likewise registered. Therefore dogs whose sire and/or dam are not  pure breed, are ineligible for registration.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">Does the PCCI sell dogs? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                <p>
                    Although records of the parentage of thousands of dogs registered annually are kept by the club, the PCCI is not directly involved in the sale of dogs. The club can assist prospective owners in locating breeders who may have pups but cannot guarantee either the health or quality of the dogs in its registry. It is the sole responsibility of the prospective owner to visit the seller and determine if the pup meets his expectations.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed">What documents do I get when I register my pure-bred dog? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                <p>
                    Upon purchase, the seller should give you a registration certificate (much like a birth certificate) that is essentially a certificate of your dog's identity, providing recognition and official documentation of your dog's place in breed history. The name that appears on your dog's registration certificate was chosen by your dog's breeder and is unique. No other registered dog can have the same name. Together with your registration certificate is your dog's pedigree that traces its parentage back four-generations. You must bring this document, with the back portion properly endorsed by the seller to the PCCI to be able to transfer the dog to your name as your proof of ownership. Applications for membership are available at the PCCI office.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5" class="collapsed">Can I change the name of my dog? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                <p>
                    The name that appears on your dog's registration certificate is his pedigreed name for life. However, you may give your dog a call name of your choice. This is much like a nickname.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#accordion-list-6" class="collapsed">How do I contact the PCCI? Are there local chapters of the PCCI? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="accordion-list-6" class="collapse" data-bs-parent=".accordion-list">
                <p>
                    The PCCI holds office at Room A206 Hillcrest Condominium, 1616 E. Rodriguez Sr., Blvd., Corner Hillcrest Street, Cubao, Quezon City. Their contact number is 721-8345, local 102 to 105. The PCCI is the mother club and affiliated are several regional and breed clubs. You may call the main office to learn more about the clubs in your area or specific to your breed.
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
          {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
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

