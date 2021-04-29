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
        border: 1px solid salmon;
        float: left;
    }

    .post-header {
        display: flex;
        border: 1px solid black;
        justify-content: space-between;
    }

    .post-body {
        display: flex;
    }

    .album-space {
        width: 50%;
        border: 1px solid black;
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
        justify-content: space-between;
        margin-top: 5px;
    }

    .main-pic {
        border: 1px solid black;
        height: 250px;
        min-width: 400px;
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
        border: 1px solid salmon;
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
        border: 1px solid red;
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
        border-bottom: 1px solid gray;
        margin-bottom: 5px;
    }

    .post-block {
        border-bottom: 1px solid black;
        height: 350px;
    }

    .post-content {
        height: 720px;
        border: 1px solid green;
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
    }

</style>
@endsection

@section('main')
    <div class="content">
        <div id="myModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Report: <b>{{$post->post_title}}</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="report" id="report-form" method="post" action="{{ route('shop.report') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="post_id" value={{$post->id}}>
                        <input type="hidden" name="user_profile_id" value={{$user->id}}>
                        <div class="form-row">
                            <div class="">
                                <label for="reason"></label>
                                <textarea name="reason" class="form-control" id="reason" cols="100" rows="5" placeholder="Reason for reporting..." maxlength="300"></textarea>
                                <br>
                                <input type="file" name="image">

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="report-submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>

        <ul class="breadcrumb">
            <li><a href="{{route('shop.index')}}">buy/sell</a></li>
            <li>{{ $post->post_title }}</li>
        </ul>
        <div>
            <div class="post-content">
                <div class='advertisement'>
                    <div class="post-header">
                        <h1>{{ $post->post_title }}</h1>

                        <div class="post-utilities">
                            <div class="report">
                                <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-flag" aria-hidden="true"></i></a>
                            </div>
                            <div class="print">
                                <a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-print" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="post-body">
                        <div class="album-space">
                            <img src="{{$post->image->image_location}}" alt="main pic" class="album main-pic">
                            <div class="album">
                                <img src="" alt="pic1" class="album sub-pic">
                                <img src="" alt="pic2" class="album sub-pic">
                                <img src="" alt="pic3" class="album sub-pic">
                                <img src="" alt="pic4" class="album sub-pic">
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

                <div class="advertiser-space">
                    <div class="advertiser-details block">
                        <h1>Advertiser Details</h1>
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
                            <div class="send-message-btn adv-btn">
                                <i class="fa fa-comments" aria-hidden="true"></i>
                                <p>Send a Message</p>
                            </div>

                            <div class="send-reserve-btn adv-btn">
                                <i class="fa fa-calendar-check" aria-hidden="true"></i>
                                <p>Send a Reservation</p>
                            </div>
                        </div>
                    </div>
                    {{-- NOTICE: Listings block not included(Related Post in individual post),
                        inefficient with the current db:
                        1. has to find dog/s with same owner where dog is not the same as the dog being posted
                        2. has to find a post that contains the dog in 1.
                            2.1 still has to access dog_litter_id
                            2.2 access post that contains the dog_litter_id
                            2.3 still have to consider if post doesn't contain dog_litter_id (because dog is not posted yet)
                            Conclusion: So much effort just to find post related to the owner of the post --}}
                    {{-- <div class="listings block">
                        <h1>Listings</h1>
                        <div class="post-block" style="border: 1px solid black; width: 400px; margin: 0 auto;">
                            <img src="" alt="dog" style="border: 1px solid red; height: 50%;">
                            <div class="details-slot" style="padding: 0 50px;">
                                <h2 style="text-align: center; margin-bottom: 10px;">TITLE</h2>
                                <p>description</p>
                                <div class="breed-price" style="display: flex; justify-content: space-between; margin: 0 auto;">
                                    <div class="breed">
                                        {{$post->category}}
                                    </div>
                                    <div class="price">
                                        ₱ {{$post->price}}
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
