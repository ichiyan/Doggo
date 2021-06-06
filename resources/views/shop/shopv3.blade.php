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
                        <select id="multiple-select" class="ui fluid search dropdown" multiple name="find[]">
                            @foreach($tags as $tag)
                              @if($tag->tag_category == "Breed")
                                <option value="{{$tag->id}}"> {{$tag->tag_name}} ({{$tag->tags()->count()}}) </option>
                              @endif
                            @endforeach
                        </select>
                    </div>
                    <p>
                        <strong>Don't know what specific breed to look for?</strong> Browse by category.
                    </p>
                    @foreach($tags as $tag)
                      @if($tag->tag_category == "Breed")
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="find[]" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              {{$tag->tag_name}}
                            </label>
                            <span class="float-right badge badge-pill badge-light"> {{$tag->tags()->count()}} </span>
                        </div>
                      @endif
                    @endforeach
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
                        <input class="form-check-input" type="checkbox" value="1" name="find[]" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Puppy (1-7 mos)
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="8" name="find[]" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Junior (8 mos - 2 yrs)
                        </label>
                        <span class="float-right badge badge-pill badge-light">42</span>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="36" name="find[]" id="flexCheckDefault">
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
                    @foreach($tags as $tag)
                      @if($tag->tag_category == "Size")
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="find[]" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              {{$tag->tag_name}}
                            </label>
                            <span class="float-right badge badge-pill badge-light"> {{$tag->tags()->count()}} </span>
                        </div>
                      @endif
                    @endforeach
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
                    @foreach($tags as $tag)
                      @if($tag->tag_category == "Gender")
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="find[]" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              {{$tag->tag_name}}
                            </label>
                            <span class="float-right badge badge-pill badge-light"> {{$tag->tags()->count()}} </span>
                        </div>
                      @endif
                    @endforeach
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
                              <select id="multiple-select" class="ui fluid search dropdown" multiple name="find[]">
                                @foreach($tags as $tag)
                                  @if($tag->tag_category == "Location")
                                    <option value="{{$tag->id}}"> {{$tag->tag_name}} ({{$tag->tags()->count()}}) </option>
                                  @endif
                                @endforeach
                              </select>
                        </div>
                        <p>
                            <strong>Filter by island groups</strong>
                        </p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="find[]" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Luzon
                            </label>
                            <span class="float-right badge badge-pill badge-light">42</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="find[]" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Visayas
                            </label>
                            <span class="float-right badge badge-pill badge-light">42</span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" name="find[]" id="flexCheckDefault">
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
                                <button class="btn cust-btn-light-square" type="submit">
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
                        <div class="menu">
                            <div class="item">
                                Latest addition
                            </div>
                            <div class="item">
                                Oldest addition
                            </div>
                            <div class="item">
                              <form action="{{ route('shop.index') }}" method="get">
                                @csrf
                                <input type='hidden' value='low price' name='sort'>
                                Lowest price
                                </form>
                            </div>
                            <div class="item">
                                Highest price
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row gy-4">
              @if($pivot == NULL)
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        {{-- <a href="{{ route('shop.show',  $post->id) }}"> --}}
                            <div class="post">
                                <div class="post-img">
                                    <img src="{{ asset('storage/posts/'.$post->getImage()) }}" class="img-fluid" alt="" style="min-height: 240px; min-width: 300px; max-height: 375px;">
                                    <div class="options shop">
                                    @if (!Auth::check())
                                        <span data-toggle="modal" data-target="#bookmarkModal">
                                             <a class="unbookmarked" data-toggle="tooltip" data-placement="right" title="bookmark post"><i class="icofont-heart heart"></i></a>
                                        </span>
                                    @elseif(Auth::check() && Auth::user()->id != $post->user_id)
                                        @if ( $post->bookmarked)
                                            <a class="bookmarked" id="bookmarked-post-{{$post->id}}" onclick="bookmark(event, {{$post->id}})" data-toggle="tooltip" data-placement="right" title="unbookmark post"><i class="icofont-heart heart"></i></a>
                                        @else
                                            <a class="unbookmarked" id="unbookmarked-post-{{$post->id}}" onclick="bookmark(event, {{$post->id}})" data-toggle="tooltip" data-placement="right" title="bookmark post"><i class="icofont-heart heart"></i></a>
                                        @endif
                                     @endif
                                    <a  class="info unbookmarked" href="{{ route('shop.show',  $post->id) }}" data-toggle="tooltip" data-placement="right" title="more info"><i class="icofont-info  more-info"></i></a>
                                    </div>
                                </div>
                                <div class="post-info">
                                    <h4>{{ $post->post_title }}<span class="price">&#8369  {{ number_format($post->price, 2, '.', ',') }}</span></h4>
                                    <span class="breed">
                                        {{ $post->dog->breed }} | {{ $post->dog->age }} |
                                    </span>
                                    {{-- add location --}}
                                    <span class="badge badge-info">{{$post->interests}} Interested</span>
                                    <p style="text-overflow: ellipsis; white-space: nowrap;
                                    overflow: hidden;">{{ $post->post_description }}</p>
                                </div>
                            </div>
                        {{-- </a> --}}
                    </div>
                    @php
                         echo '<script>
                            function bookmark(e, $post_id){
                                e.preventDefault();
                                $.ajax({
                                    type: "get",
                                    url: "shop/{post_id}/bookmark",
                                    data: {"post_id": $post_id},

                                    success: function(response){
                                        console.log(response);
                                    },

                                    error: function(error){
                                        console.log(error);
                                    },

                                });


                                var bookmarked = document.getElementById("bookmarked-post-"+$post_id);
                                if (bookmarked){
                                    if(bookmarked.classList.contains("bookmarked")){
                                        bookmarked.classList.remove("bookmarked");
                                        bookmarked.classList.add("unbookmarked");
                                    }else{
                                        bookmarked.classList.remove("unbookmarked");
                                        bookmarked.classList.add("bookmarked");
                                    }
                                }

                                var unbookmarked = document.getElementById("unbookmarked-post-"+$post_id);
                                if(unbookmarked){
                                    if(unbookmarked.classList.contains("unbookmarked")){
                                        unbookmarked.classList.remove("unbookmarked");
                                        unbookmarked.classList.add("bookmarked");
                                    }else{
                                        unbookmarked.classList.remove("bookmarked");
                                        unbookmarked.classList.add("unbookmarked");
                                    }
                                }
                            }
                            </script>';
                    @endphp
                @endforeach
              @else
                @foreach ($pivot as $piv)
                  @foreach ($posts as $post)
                    @if($piv->post_id == $post->id)
                      <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                          {{-- <a href="{{ route('shop.show',  $post->id) }}"> --}}
                              <div class="post">
                                  <div class="post-img">
                                      <img src="{{ url("public/storage/posts/" . $post->getImage() ) }}" class="img-fluid" alt="" style="min-height: 240px; min-width: 300px; max-height: 375px;">
                                      <div class="options shop">
                                      @if (!Auth::check())
                                          <a href="{{ route('bookmark_post',  $post->id) }}"><i class="icofont-heart heart"></i></a>
                                      @else
                                          <a class="bookmark" id="bookmark-btn-{{$post->id}}" onclick="bookmark(event, {{$post->id}})"><i class="icofont-heart heart"></i></a>
                                      @endif
                                      <a  class="info" href="{{ route('shop.show',  $post->id) }}"><i class="icofont-info  more-info"></i></a>
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
                    @endif
                  @endforeach
                @endforeach
              @endif
                <div class="d-flex justify-content-center pagination" style="margin-top: 5%">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal" id="bookmarkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Want to bookmark posts?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">You have to be logged in to bookmark posts and be able to see them in your profile.</div>
        <div class="modal-footer">
            {{-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> --}}
            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
            <a class="btn btn-primary" href="{{ route('register') }}">Sign Up</a>
        </div>
    </div>
</div>
</div>


@endsection


