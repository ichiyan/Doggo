@extends('layouts.main')

@section('hero')

@endsection

@section('main')


<div class="container" style="margin-top: 10%">
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
</div>

<section id="shop-posts" class="shop-posts">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    {{-- <a href="{{ route('shop.show',  $post->id) }}"> --}}
                        <div class="post">
                            <div class="post-img">
                                <img src="{{asset('images/default-dog-pic.jpg')}}" class="img-fluid" alt="">
                                <div class="options">
                                <a href=""><i class="bx bxs-heart-circle  heart"></i></a>
                                <a href="{{ route('shop.show',  $post->id) }}"><i class="bx bxs-info-circle  more-info"></i></a>
                                </div>
                            </div>
                            <div class="post-info">
                                <h4>{{ $post->post_title }}<span class="price">&#8369  {{ number_format($post->price, 2, '.', ',') }}</span></h4>
                                <span class="breed">
                                    {{ $post->dog->breed }} | {{ $post->dog->age }} |
                                </span>
                                {{-- add location --}}
                                <span class="badge badge-primary">{{$post->interests}} Interested</span>
                                <p>{{ $post->post_description }}</p>
                            </div>
                        </div>
                    {{-- </a> --}}
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="d-felx justify-content-center pagination">

    {{ $posts->links() }}
</div>


@endsection


