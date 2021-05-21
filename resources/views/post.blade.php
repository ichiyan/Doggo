@extends('layouts.main')
@section('hero')
<style>
    ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
    background-color: #eee;
    }

    /* Display list items side by side */
    ul.breadcrumb li {
    display: inline;
    font-size: 18px;
    }

    /* Add a slash symbol (/) before/behind each list item */
    ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: "/\00a0";
    }

    /* Add a color to all links inside the list */
    ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
    }

    /* Add a color on mouse-over */
    ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
    }

    .advertisement {
        width: 60%;
        height: 100%;
        background-color: white;
        float: left;
    }

    .shadow {

        box-shadow: 0px 0 30px rgb(1 41 112 / 8%);
    }

    .post-header {
        display: flex;

        justify-content: space-between;
    }

    .post-body {
        display: flex;
        padding: 12px;
    }

    .album-space {
        width: 50%;
        height: 420px;
        max-height: 50%;
    }

    .details-space {
        margin-left: 8px;
    }

    .line-detail {
        display: flex;
    }

    .album {
        display: flex;
        margin-top: 5px;
    }

    .main-pic {
        border: 1px solid black;
        height: 250px;
        min-width: 300px;
        width: 100%;
    }

    .sub-pic {
        height: 100px;
        border: 1px solid black;
        width: 100px;

    }

    .advertiser-space {
        height: 100%;
        width: 38%;
        background-color: white;
        float: right;
    }

    .block h1 {
        padding: 0px;
        margin: 0px;
        font-size: 33px;
    }

    .line-detail {
        display: flex;
    }

    .adv-btn-block {
        display:flex;
        justify-content: space-between;
        width: 400px;
        margin: 0 auto;
    }

    .adv-btn {
        cursor: pointer;
        display: flex;
        border: 1px solid black;
        width: 180px;
        height: 30px;
        padding: auto 0;
    }

    .adv-btn img {
        width: 20px;
        height: 20px;
        border: 1px solid black;
    }

    .block {
        border-bottom: 1px solid whitesmoke;
        margin-bottom: 5px;
    }

    .post-block {
        border-bottom: 1px solid black;
        height: 350px;
    }

    .post-content {
        height: 720px;
        padding: 0 20px;
    }

    .listings h1 {
        text-align: center;
        border: 1px solid red;
    }

    .post-utilities {
        display: flex;
        justify-content: space-evenly;
        width: 50px;
    }

    i {
        font-size: 22px;
    }

    .content {
        margin-top: 100px;
        background-color: white;
        padding-bottom: 1em;
    }



</style>
@livewireStyles
@endsection

@section('main')
    <div class="content">

        <ul class="breadcrumb">
            <li><a href="{{route('shop.index')}}">Shop</a></li>
            <li>{{ $post->post_title }}</li>
        </ul>
        <div>
            <div class="post-content ">
                <div class='advertisement shadow mr-3 rounded'>
                    <div class="post-header">
                        <div class="row w-100 p-0">
                            <h2 class="col-11 p-1 ml-3">{{ $post->post_title }}</h2>

                            <div class="group post-utilities m-auto col-1 justify-content-end p-0">
                                <i class="fas fa-ellipsis-v" class="dropdown-toggle" style="font-size: 14px; color: gray;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button" data-toggle="modal" data-target="#reportModal">Report</button>
                                    {{-- print == new tab and information(tbd) be shown --}}
                                    <a class="dropdown-item" href="{{ route('print_post', ['post_id' => $post->id]) }}">Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-body">
                        <div class="album-space">
                            <img src="{{ url('storage/'.$post->images[0]->image_location ) }}"  data-toggle="modal" data-target="#image-0"  alt="main pic" class="album main-pic">
                            <livewire:post-image :nthImage="0" :postImg="$post->images[0]" :post="$post" />

                            <div class="album">
                                @foreach ($post->images as $key => $image)
                                    @if ($key != 0)
                                        <img src="{{ url('storage/'.$image->image_location) }}" data-toggle="modal" data-target="#image-{{$key}}" alt="picture" class="album sub-pic mr-2" >
                                        <!-- Modal -->
                                        <livewire:post-image :nthImage="$key" :postImg="$post->images[$key]" />
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="details-space">
                            <div class="line-detail">
                                <p><b>Location: </b>{{ $user->address }}</p>
                            </div>
                            <div class="line-detail">
                                <p><b>Date Listed: </b> {{ $post->created_at }}</p>
                            </div>
                            <div class="line-detail">
                                <p><b>Price:</b> {{ $post->price }}</p>
                            </div>
                            <div class="line-detail">
                                <p><b>Description:</b> {{ $post->post_description }}</p>
                            </div>

                            <div class="line-detail">
                                <p><b>Dog Name:</b> {{$dog->first_name}} {{$dog->kennel_name}}</p>
                            </div>

                            <div class="line-detail">
                                <p><b>Age:</b> {{$dog->age}} Months</p>
                            </div>

                            <div class="line-detail">
                                <p><b>Gender:</b> {{$dog->gender}}</p>
                            </div>

                            <div class="line-detail">
                                <p><b>Status:</b> {{$post->status}}</p>
                            </div>

                            <div class="line-detail">
                                <p><b>{{$post->interests}} users</b> are interested. </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow h-100 ml-2">
                    <h3 class="p-1 ml-3">Advertiser Details</h3>
                    <div class="card-content p-3">
                        <div class="advertiser-details block">
                            <div class="line-detail">
                                <b><p>Name: </b>{{ $user->name }}</p>
                            </div>
                            <div class="line-detail">
                                <b><p>Account: </p></b> <p>User PCCI Member</p>
                            </div>
                        </div>
                        <div class="contact-information block">
                            <div class="line-detail">
                                <b><p>Contact Number: </p></b> <p>09777888777</p>
                            </div>
                            <div class="line-detail">
                                <b><p>Address: </b>{{ $user->address }}</p>
                            </div>
                            <div class="line-detail">
                                <b><p>Email: </b>{{ $user->email }}</p>
                            </div>

                            <div class="adv-btn-block">
                                <div class="btn btn-outline-dark w-50">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    Message
                                </div>

                                <div class="btn btn-outline-dark">
                                    <i class="fa fa-calendar-check" aria-hidden="true"></i>
                                    Send a Reservation
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade report-post-modal" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <textarea name="reason" cols="55" rows="10" placeholder="Reason for report"></textarea>
                        <input type="file" name="report_image" onchange="previewImage()">
                        <img class="img-thumbnail" id="preview">
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
            var previewBox = document.getElementById("preview");
            previewBox.src = URL.createObjectURL(event.target.files[0]);
            previewBox.style.className = "img-thumbnail d-block";
        }
    </script>
@livewireScripts
@endsection
