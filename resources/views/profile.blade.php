
@extends('layouts.main')

@section('main')

@include('partials.shapes')

<section id="seller-profile" class="seller-profile shop-posts" style="margin-top: 10%">
    <div class="container">
        <div class="user-info">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ url($user->profile_pic) }}" alt="" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4>{{ $user->name }}</h4>
                            <p class="text-secondary mb-1">{{ $user->username }}</p>
                            <p class="text-secondary mb-1">{{ $user->created_at }}</p>
                            <p class="text-muted font-size-sm">{{ $user->bio }}</p>
                            @if ( !Auth::check() || Auth::user()->id != $user->user_id )
                                <div class="btn cust-btn-primary">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    Message
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
             </div>

             <div class="card mt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><i class="fas fa-location-arrow" style="padding-right: 5px"></i>Address</h6>
                        <br><br>
                        <span class="text-secondary">{{$user->address}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><i class="fas fa-envelope" style="padding-right: 5px"></i>Email</h6>
                        <br><br>
                        <span class="text-secondary">{{$user->email}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><i class="fas fa-phone" style="padding-right: 5px"></i> Number</h6>
                        <br><br>
                        <span class="text-secondary">{{$user->contact_number}}</span>
                    </li>
                </ul>
                @if ( Auth::check() && Auth::user()->id == $user->user_id )
                    <div class="d-flex justify-content-center">
                        <a class="btn cust-btn-outline-primary" href="{{ route('edit_profile', $user->user_id) }}">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                            Edit Profile
                        </a>
                    </div>
                @endif
            </div>
        </div>

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
                        <i class="bx bx-filter sort-icon"></i>
                        <span class="text sort-text">{{$filter}}</span>
                        <div class="menu">
                            <a class="item" href="{{ route('profile_all',  $user->id) }}">
                                All Posts
                            </a>
                            <a class="item" href="{{ route('profile_shop',  $user->id) }}">
                                Shop
                            </a>
                            <a class="item" href="{{ route('profile_stud',  $user->id) }}">
                                Stud Service
                            </a>
                            <a class="item" href="{{ route('profile_rehome',  $user->id) }}">
                                Rehome
                            </a>
                            <a class="item" href="{{ route('profile_bookmarked',  $user->id) }}">
                                Bookmarked
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row gy-4">
                    <p style="padding: 0 0 0 15px; margin: 0; font-weight: 600">{{$filter}} ({{$count}} @if ($count == 1) post @else posts @endif)</p>
                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="post">
                                <div class="post-img" style="background-image: url({{ asset('storage/posts/'.$post->img) }})">
                                    {{-- <img src="{{ asset('storage/posts/'.$post->img) }}" class="img-fluid" alt=""  style="min-height: 240px; min-width: 300px; max-height: 375px;"> --}}
                                    <div class="options profile">
                                        @if (!Auth::check())
                                            <span data-toggle="modal" data-target="#bookmarkModal">
                                                <a class="unbookmarked" data-toggle="tooltip" data-placement="right" title="bookmark post"><i class="icofont-heart heart"></i></a>
                                            </span>
                                        @elseif (Auth::check() && Auth::user()->id != $user->user_id)
                                            @if ( $post->bookmarked)
                                                <a class="bookmarked" id="bookmarked-post-{{$post->id}}" onclick="bookmark(event, {{$post->id}})" data-toggle="tooltip" data-placement="right" title="unbookmark post"><i class="icofont-heart heart"></i></a>
                                            @else
                                                <a class="unbookmarked" id="unbookmarked-post-{{$post->id}}" onclick="bookmark(event, {{$post->id}})" data-toggle="tooltip" data-placement="right" title="bookmark post"><i class="icofont-heart heart"></i></a>
                                            @endif
                                        @endif
                                        {{-- @if ( !Auth::check() || Auth::user()->id != $user->user_id )
                                            <a class="" href=""><i class="icofont-heart heart"></i></a>
                                        @endif --}}
                                            <a  class="unbookmarked"  href="{{ route('shop.show',  $post->id) }}" data-toggle="tooltip" data-placement="right" title="more info"><i class="icofont-info  more-info"></i></a>
                                        @if ( Auth::check() && Auth::user()->id == $user->user_id )
                                            {{-- <a href="{{ route('profile_delete', ['user_id' => Auth::id(), 'post_id' => $post->id]) }}"><i class="icofont-ui-delete delete"></i></a> --}}
                                            <span data-toggle="modal" data-target="#deletePostModal{{$post->id}}">
                                                <a  class="unbookmarked" data-toggle="tooltip" data-placement="right" title="delete post"><i class="icofont-ui-delete delete"></i></a>
                                            </span>
                                            <a  class="unbookmarked" href="{{ route('shop.edit',  $post->id) }}" data-toggle="tooltip" data-placement="right" title="edit post"><i class="icofont-edit edit"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="post-info">
                                    {{-- <h4>{{ $post->post_title }}<span class="price">&#8369  {{ number_format($post->price, 2, '.', ',') }}</span></h4> --}}
                                    <h4>{{ $post->post_title }}</h4>
                                    <h4><span class="price">&#8369  {{ number_format($post->price, 2, '.', ',') }}</span></h4>
                                    <span class="breed">
                                        {{ $post->dog->breed }} | {{ $post->dog->age }} |
                                    </span>
                                    <span class="badge badge-info">{{$post->interests}} Interested</span>
                                    <p>{{ $post->post_description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deletePostModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Post?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Select "Delete" below to delete post.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-danger" form="logout-form">Delete</button>
                                        @if(Auth::check())
                                            <form id="logout-form" action="{{ route('profile_delete', ['user_id' => Auth::id(), 'post_id' => $post->id]) }}" method="POST" class="d-none">
                                                @csrf
                                                @method('get')
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
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
                    <div class="d-flex justify-content-center pagination" style="margin-top: 5%">
                        {{ $posts->links() }}
                    </div>
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
