
@extends('layouts.main')

@section('main')

@include('partials.shapes')

<section id="seller-profile" class="seller-profile shop-posts" style="margin-top: 10%">
    <div class="container">
        <div class="user-info">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{asset('images/default-user.png')}}" alt="" class="rounded-circle" width="150">
                        <div class="mt-3">
                            <h4>{{ $user->name }}</h4>
                            <p class="text-secondary mb-1">{{ $user->username }}</p>
                            <p class="text-secondary mb-1">{{ $user->created_at }}</p>
                            <p class="text-muted font-size-sm">{{ $user->bio }}</p>
                            @if ( Auth::user()->id != $user->user_id )
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
                @if ( Auth::user()->id == $user->user_id )
                    <div class="d-flex justify-content-center">
                        <div class="btn cust-btn-outline-primary">
                            <i class="fa fa-edit" aria-hidden="true"></i>
                            Edit Profile
                        </div>
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
                                <button class="btn cust-btn-light" type="submit">
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
                        </div>
                    </div>
                </div>

                <div class="row gy-4">
                    <p style="padding: 0 0 0 15px; margin: 0; font-weight: 600">{{$count}} @if ($count == 1) post @else posts @endif</p>
                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                            <div class="post">
                                <div class="post-img">
                                    <img src="{{ asset('storage/'.$post->getImage()) }}" class="img-fluid" alt="" style="min-height: 240px; min-width: 300px">
                                    <div class="options">
                                        @if ( Auth::user()->id != $user->user_id )
                                            <a href=""><i class="icofont-heart heart"></i></a>
                                        @endif
                                            <a href="{{ route('shop.show',  $post->id) }}"><i class="icofont-info  more-info"></i></a>
                                        @if ( Auth::user()->id == $user->user_id )
                                            <a href="" data-toggle="modal" data-target="#deletePostModal"><i class="icofont-ui-delete delete"></i></a>
                                            <a href=""><i class="icofont-edit edit"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <div class="post-info">
                                    <h4>{{ $post->post_title }}<span class="price">&#8369  {{ number_format($post->price, 2, '.', ',') }}</span></h4>
                                    <span class="breed">
                                        {{ $post->dog->breed }} | {{ $post->dog->age }} |
                                    </span>
                                    <span class="badge badge-info">{{$post->interests}} Interested</span>
                                    <p>{{ $post->post_description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center pagination" style="margin-top: 5%">
                    {{ $posts->links() }}
                </div>

            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <a class="btn btn-primary" href="">Delete</a>
                <form id="logout-form" action="" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
