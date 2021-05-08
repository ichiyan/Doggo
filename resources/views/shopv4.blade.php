@extends('layouts.main')

@section('hero')

@endsection

@section('main')

{{-- Destroyed Styling of the shopping when using livewire components (change: web.php's PostController into PostController2) to see changes --}}
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
    {{-- Livewire Component; $post from PostController is passed to post attr. in app.Livewire.ListPost.php --}}
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                {{-- <a href="{{ route('shop.show',  $post->id) }}"> --}}
                @foreach ($posts as $post)
                    <livewire:listed-post class="post" :post="$post">
                @endforeach
                {{-- </a> --}}
            </div>
        </div>
    </div>

</section>


@endsection


