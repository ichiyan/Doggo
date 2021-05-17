@extends('layouts.main')
@section('hero')
<style>
    * {
        box-sizing: border-box;
    }

    body {
        background: #f1f1f18c;
    }

    .column {
        float: left;
    }

    .column.side {
        width:48%;
        margin-left: 5px;
        /* border: 1px solid gray; */
    }

    .column.main {
        width: 50%;
    }

    @media screen and (max-width: 1000px) {
        .column.side, .column.main {
            width: 100%;
        }
    }

    .box {
        min-height: 50px;
        width: 100%;
        margin: 5px;
        background-color: white;
    }

    .box.large {
        height: 500px;
        max-height: auto;
    }

    .box.small {
        height: 100px;
    }

    .layout .box {
        border: 1px solid transparent;
    }

    .main-pic {
        height: 500px;
        width: 500px;
    }

    .sub-pic {
        max-width: 120px;
        margin-right: 5px;
    }

    .sub-pic > * {
        height: 110px;
        width: 100px;
    }

    .modal-dialog-centered {
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        position: absolute;
    }
</style>
@endsection

@section('main')

<div class="row layout">
    <div class="box small"></div>
</div>

<div class="row">
    <div class="column main">
        <div class="box large">
            <div class="album">
                <div class="sub-pic" style="width: 20%; float: left;">
                    @foreach ($post->images as $key => $image)
                        @if ($key != 0)
                            <img src="{{ url('storage/'.$image) }}" data-toggle="modal" data-target="#image-{{$key}}" alt="picture" class="album sub-pic" style="margin-bottom: 10px;">
                            <!-- Modal -->
                            <div class="modal fade" id="image-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 500px; width: 500px;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <img src="{{ url('storage/'.$image) }}" alt="dog image" style="height: 100%; width: 100%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="main-pic-space" style="float:left">
                    <img src="{{ url('storage/'.$post->images[0]) }}" data-toggle="modal" data-target="#image-0" alt="main pic" class="album main-pic">
                    <div class="modal fade" id="image-0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="height: 500px; width: 500px;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <img src="{{ url('storage/'.$post->images[0]) }}" alt="dog image" style="height: 100%; width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box large">
            <div class="advertiser-details block">
                <h1>Owner Details</h1>
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
            </div>
        </div>
    </div>
    <div class="column side">
        <div class="box large">
            <div class="row ml-1 justify-content-between mr-1">
                <p class="col" >{{$post->interests}} interested</p>
                <div class="group col-1">
                    <i class="fas fa-ellipsis-v" class="dropdown-toggle" style="font-size: 14px; color: gray;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#reportModal">Report</button>
                        {{-- print == new tab and information(tbd) be shown --}}
                        <a class="dropdown-item" href="{{ route('print_post', ['post_id' => $post->id]) }}">Print</a>
                    </div>
                </div>
            </div>
            <h3>{{$post->post_title}}</h3>
            <h6>&#8369  {{ number_format($post->price, 2, '.', ',') }}</h6>
            <div class="row ml-1">
                <button class="send-message-btn btn btn-secondary" style="width:180px;">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                    Message
                </button>
                &nbsp;&nbsp;
                <button class="reserve-btn btn btn-light" style="width:180px; border: 1px solid black">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    Reserve
                </button>
            </div>
        </div>

        <div class="box large">
            <div class="description box" style="height: 100%;">
                <h6>Description: </h6>
                {{$post->post_description}}
            </div>
        </div>
    </div>
</div>
@if (session()->has('message'))
<h1>{{$message}}</h1>

{{ $errors->image }}

@endif
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
                    <textarea name="reason" cols="55" rows="10" placeholder="Reason for report"></textarea>
                    <input type="file" name="report_image" >
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit Report</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
