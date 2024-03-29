@extends('layouts.main')


@section('main')

    @include('partials.shapes')

    <!-- ======= Breadcrumbs ======= -->

    <div class="breadcrumbs">
        <div class="container" data-aos="fade-right">
            <ol>
                <li><a href="{{route('shop.index')}}"> {{ $name }} </a></li>
                <li>{{ $post->post_title }}</li>
            </ol>
            <h2>{{ $post->post_title }}</h2>
        </div>
    </div><!-- End Breadcrumbs -->

     <!-- ======= Post Details Section ======= -->
     <div id="post-details" class="post-details">
        <div class="container">
          <div class="row gy-6">
            <div class="col-lg-8" data-aos="fade-right">
                <div class="post-info h-100">
                    <div class="row">
                        <div class="col-6">
                            <div class="post-details-slider swiper-container">
                                <div class="swiper-wrapper align-items-center">

                                    @foreach ($post->images as $key => $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/posts/'.$image->image_location) }}" data-toggle="modal" data-target="#image-{{$key}}" alt="picture" class="album sub-pic mr-2" >
                                        </div>
                                    @endforeach

                                </div>
                                <div class="swiper-pagination"></div>
                              </div>
                        </div>
                        <div class="col-6">
                            <div class="row justify-content-around">
                                <div class="col-11">
                                    <h3>Post Details</h3>
                                </div>
                                <div class="group post-utilities col-1 post-details-dropdown">
                                    <i class="fas fa-ellipsis-v" class="dropdown-toggle" style="font-size: 14px; color: gray; cursor: pointer;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#reportModal">Report</button>
                                        {{-- print == new tab and information(tbd) be shown --}}
                                        <a class="dropdown-item" href="{{ route('print_post', ['post_id' => $post->id]) }}">Print</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="badge
                                        @if ($post->status == "Has Documents") badge-success
                                        @elseif ($post->status == "Pending Documents") badge-warning
                                        @elseif ($post->status == "Sold") badge-primary
                                        @endif">
                                        {{$post->status}}
                                    </div>
                                    <div class="badge badge-info">{{$post->interests}} Interested</div>
                                </div>
                            </div>
                            <ul style="padding-top: 20px">
                                <li><strong>Location</strong>: {{ $user->address }}</li>
                                <li><strong>Date Listed</strong>: {{ $post->created_at }}y</li>
                                <li><strong>Price</strong>: &#8369 {{ number_format($post->price, 2, '.', ',') }}</li>
                                <li><strong>Dog Name</strong>: {{$dog->first_name}} {{$dog->kennel_name}}</li>
                                <li><strong>Breed</strong>: {{$dog->breed}}</li>
                                <li><strong>Age</strong>: {{$dog->age}} Months</li>
                                <li><strong>Gender</strong>: {{$dog->gender}}</li>
                                <li><strong>Size</strong>: {{$dog->size}}</li>
                                <li><strong>Description</strong>: {{ $post->post_description }}</li>
                            </ul>
                            <div class="d-flex justify-content-center">
                                <div class="btn cust-btn-primary">
                                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                                    Reserve
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-left">
              <div class="post-info h-100">
                <h3>Advertiser Details</h3>
                <ul>
                  <li><strong>Name</strong>: {{ $user->name }}</li>
                  <li><strong>Account</strong>: PCCI member</li>
                  <li><strong>Contact Number</strong>: {{ $user->contact_number }}</li>
                  <li><strong>Email Address</strong>: <a href="mailto:{{$user->email}}">{{$user->email}}</a></li>
                  <li><strong>Address</strong>: {{$user->address}}</li>
                </ul>
                <div class="row justify-content-around">
                    <div class="col-6">
                        @if (Auth::check())
                            <a class="btn cust-btn-outline-primary"  href="{{ route('inbox.show', Auth::id()) }}">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                                Message
                            </a>
                        @else
                            <button class="btn cust-btn-outline-primary"  data-toggle="modal" data-target="#messageModal">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                                Message
                            </button>
                        @endif
                    </div>
                    <div class="col-6">
                        <a class="btn cust-btn-outline-primary" href="{{ route('profile_all', $user->id) }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            View Profile
                        </a>
                    </div>
                </div>
              </div>
            </div>

          </div>

        </div>
    </div><!-- End Post Details Section -->

    </section>

    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="report">
            <form action="{{ route('report_post', ['post_id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Report post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea name="reason" cols="55" rows="10" placeholder="Reason for report" required></textarea>
                        <input id="input-files" type="file" name="report_files[]" multiple onchange="previewImage()">
                        <div id="preview"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit Report</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @foreach ($post->images as $key => $image)
        <!-- Modal -->
        <livewire:post-image :nthImage="$key" :postImg="$post->images[$key]" :post="$post"/>
    @endforeach

    <script>
        function previewImage(){
            var preview = document.querySelector('#preview');
            var files = document.querySelector('#input-files').files;

            function readAndPreview(file) {
                if( /\.(jpe?g|png)$/i.test(file.name) ){
                    var reader = new FileReader();
                    reader.addEventListener("load", function(){
                        var image = new Image();
                        image.height = 150;
                        image.title = file.name;
                        image.src = this.result;
                        image.style.padding = "5px";
                        preview.appendChild(image);
                    }, false);
                    reader.readAsDataURL(file);
                }
            }
            if(files){
                [].forEach.call(files, readAndPreview);
            }
        }

    </script>


@endsection
