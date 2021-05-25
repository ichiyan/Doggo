@extends('layouts.main')


@section('main')

{{-- <div class="container" style="margin-top: 10%">
    <div class="row justify-content-center">
        <div class="col-4">
            <form action="{{ route('shop.index') }}" method="get" role="search" class="" style="display: block">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2" name="search-post">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> --}}

@include('partials.shapes')

<section id="shop-posts" class="shop-posts">
    <div class="container" data-aos="fade-up">
        <form method="get" action="{{ route('shop.index') }}">
          <div class="filter">
            <h1><small>Filter</small></h1>

            <div class="accordion" id="accordionExample">

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Breed
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                <div class="accordion-body">
                    <p>
                        <strong>Search for specific PCCI recognized breeds.</strong>
                    </p>
                    <div class="form-group">
                        <select id="multiple-select" class="ui fluid search dropdown" multiple name="breed">
                            {{--options should be fetched from db--}}
                            {{-- Make table for breeds --}}
                            <option value="Shiba Inu">Shiba Inu (42)</option>
                            <option value="Chihuahua">Chihuahua (42)</option>
                            <option value="Shih Tzu">Shih Tzu (42)</option>
                            <option value="German Shepherd">German Shepherd (42)</option>
                            <option value="Bulldog">Bulldog (42)</option>
                            <option value="Terrier">Terrier (42)</option>
                            <option value="Bernese Mountain Dog">Bernese Mountain Dog (42)</option>
                            <option value="Sheltie">Sheltie (42)</option>
                            <option value="Alaskan Malamute">Alaskan Malamute (42)</option>
                        </select>
                    </div>
                    <p>
                        <strong>Don't know what specific breed to look for?</strong> Browse by category.
                    </p>
                    {{--refer to PCCI recognized breeds indicated on their website--}}
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Sheep and Cattle" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Sheep and Cattle
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pincher and Schnauzer" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Pincher and Schnauzer
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Terriers" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Terriers
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Dachshunds" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Dachshunds
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Spitz & Primitive Types" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Spitz & Primitive Types
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Scent Hounds" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Scent Hounds
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pointing Dogs" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Pointing Dogs
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Retrievers-Water Dogs" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Retrievers-Water Dogs
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Companion and Toy Dogs" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Companion and Toy Dogs
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Sighthounds" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                          Sighthounds
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Age
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                <div class="accordion-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Puppy (1-7 mos)
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="8" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Junior (8 mos - 2 yrs)
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="36" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Adult (3 yrs and above)
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Size
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                  <div class="accordion-body">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Small" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            Small (0-25 lbs)
                          </label>
                          <span class="float-right badge badge-pill badge-light">42</span>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Medium" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            Medium (26-60 lbs)
                          </label>
                          <span class="float-right badge badge-pill badge-light">42</span>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Large" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            Large (61-100 lbs)
                          </label>
                          <span class="float-right badge badge-pill badge-light">42</span>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Extra Large" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Extra Large (101 lbs or more)
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                  </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Gender
                  </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                  <div class="accordion-body">
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Male" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            Male
                          </label>
                          <span class="float-right badge badge-pill badge-light">42</span>
                      </div>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="Female" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">
                            Female
                          </label>
                          <span class="float-right badge badge-pill badge-light">42</span>
                      </div>
                  </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    Price Range
                  </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive">
                  <div class="accordion-body">
                      <div class="filter-content">
                          <div class="card-body">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>Min</label>
                                <input type="number" class="form-control" id="" placeholder="&#8369 0">
                              </div>
                              <div class="form-group col-md-6 text-right">
                                <label>Max</label>
                                <input type="number" class="form-control" placeholder="&#8369 max price"> {{--max price in db?--}}
                              </div>
                            </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingSix">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                    Location
                  </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix">
                  <div class="accordion-body">
                            <p>
                                <strong>Search for specific regions</strong>
                            </p>
                            <div class="form-group">
                            <select id="multiple-select" class="ui fluid search dropdown" multiple name="">
                                <option value="1">National Capital Region (42)</option>
                                <option value="2">Cordillera Administrative Region (42)</option>
                                <option value="3">Ilocos Region (42)</option>
                                <option value="4">Cagayan Valley (42)</option>
                                <option value="5">Central Luzon (42)</option>
                                <option value="6">Calabarzon (42)</option>
                                <option value="7">MIMAROPA (42)</option>
                                <option value="8">Bicol Region (42)</option>
                                <option value="9">Western Visayas (42)</option>
                                <option value="10">Central Visayas (42)</option>
                                <option value="11">Eastern Visayas (42)</option>
                                <option value="12">Zamboanga Peninsula (42)</option>
                                <option value="13">Western Visayas (42)</option>
                                <option value="14">Northern Mindanao (42)</option>
                                <option value="15">Davao Region (42)</option>
                                <option value="16">Soccskargen (42)</option>
                                <option value="17">Caraga Region (42)</option>
                                <option value="18">Barmm (42)</option>
                            </select>
                        </div>
                        <p>
                            <strong>Filter by island groups</strong>
                        </p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Luzon
                            </label>
                            <span class="float-right badge badge-pill badge-light">42</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Visayas
                            </label>
                            <span class="float-right badge badge-pill badge-light">42</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Mindanao
                            </label>
                            <span class="float-right badge badge-pill badge-light">42</span>
                        </div>
                  </div>
                </div>
            </div>

            <div class="row justify-content-between" style="padding-top: 5%">
                <div class="col-6">
                    <input type='submit' name="FilterForm" class="btn cust-btn-primary" value='Apply Filters' style="width: 140px">
                </div>
                <div class="col-6 align-self-end text-right">
                    <input type='submit' name="FilterForm" class="btn cust-btn-outline-danger" value='Reset' style="width: 140px;">
                </div>
            </div>

          </div>
        </div>
        </form>

        <div class="right">
            <div class="row justify-content-start" style="margin-bottom: 5%;">
                <div class="col-4">
                    <form action="{{ route('shop.index') }}" method="get" role="search" class="" style="display: block">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for listing..."
                                aria-label="Search" aria-describedby="basic-addon2" name="search-post" value="{{ request('search-post') }}">
                            <div class="input-group-append">
                                <button class="btn cust-btn-light" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4 text-left">
                    <div class="ui floating labeled icon dropdown button">
                        <i class="bx bx-sort sort-icon"></i>
                        <span class="text sort-text">Sort by</span>
                        {{-- should we include pa sort by nearest location? --}}
                        <div class="menu">
                            <div class="item">
                                Latest addition
                            </div>
                            <div class="item">
                                Oldest addition
                            </div>
                            <div class="item">
                                Lowest price
                            </div>
                            <div class="item">
                                Highest price
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <a href="{{ route('shop.show',  $post->id) }}"> --}}
                            <div class="post">
                                <div class="post-img">
                                    <img src="{{ asset($post->getImage() ) }}" class="img-fluid" alt="" style="min-height: 240px; min-width: 300px; max-height: 375px;">
                                    <div class="options">
                                    <a href=""><i class="icofont-heart heart"></i></a>
                                    <a href="{{ route('shop.show',  $post->id) }}"><i class="icofont-info more-info"></i></a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <h4>{{ $post->post_title }}<span class="price">&#8369  {{ number_format($post->price, 2, '.', ',') }}</span></h4>
                                    <span class="breed">
                                        {{ $post->dog->breed }} | {{ $post->dog->age }} |
                                    </span>
                                    {{-- add location --}}
                                    <span class="badge badge-info">{{$post->interests}} Interested</span>
                                    <p>{{ $post->post_description }}</p>
                                </div>
                            </div>
                        {{-- </a> --}}
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center pagination" style="margin-top: 5%">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</section>
@endsection


