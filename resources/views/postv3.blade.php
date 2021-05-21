@extends('layouts.main')


@section('main')

    <div class="shop-shapes-wrapper">
        <img class="shop-shape-top-right-over" data-aos="fade-left" data-aos-duration="1000" src="{{asset('images/shop-shape-top-right2.svg')}}" />
        <img class="shop-shape-top-right-under" data-aos="fade-left" data-aos-delay="400" data-aos-duration="1000" src="{{asset('images/shop-shape-top-right-blue2.svg')}}" />
    </div>

    <!-- ======= Breadcrumbs ======= -->

    <div class="breadcrumbs">
        <div class="container" data-aos="fade-right">
            <ol>
                <li><a href="{{route('shop.index')}}">buy/sell</a></li>
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
                                            <img src="{{ url('storage/'.$image->image_location) }}" data-toggle="modal" data-target="#image-{{$key}}" alt="picture" class="album sub-pic mr-2" >
                                            <!-- Modal -->
                                            <livewire:post-image :nthImage="$key" :postImg="$post->images[$key]" />
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
                                    <i class="fas fa-ellipsis-v" class="dropdown-toggle" style="font-size: 14px; color: gray;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
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
                                {{--add size--}}
                                <li><strong>Description</strong>: {{ $post->post_description }}</li>
                            </ul>

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
                  <li><strong>Contact Number</strong>: </li>
                  <li><strong>Email Address</strong>: <a href="mailto:{{$user->email}}">{{$user->email}}</a></li>
                  <li><strong>Address</strong>: {{$user->address}}</li>
                </ul>
                <div class="row justify-content-around">
                    <div class="col-6">
                        <div class="btn cust-btn-outline-primary">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                            Message
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="btn cust-btn-outline-primary">
                            <i class="fa fa-calendar-check" aria-hidden="true"></i>
                            Reserve
                        </div>
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

    <script>
        function previewImage(){
            var preview = document.querySelector('#preview');
            var files = document.querySelector('#input-files').files;

            function readAndPreview(file) {
                if( /\.(jpe?g|png|gif)$/i.test(file.name) ){
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

        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }

    </script>

@endsection
