@extends('layouts.main')

@section('asset')
<style>
    .card-post {
        max-width: 30%;
        min-width: 30%;
        width: 270px;
        min-height: 320px;
        height: 320px;
        border: 1px solid black;
        margin-bottom: 40px;
    }
    .image-slot {
        height: 50%;
        width: 100%;
    }
    img {
        height: 100%;
        width: 100%;
        border: 1px solid red;
    }
    .breed-price {
        display: flex;
        justify-content: space-evenly;
    }
    .right {
        float: right;
        width: 78%;
        min-height: 1024px;
        border: 1px solid black;
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
    }
    .pagination {
        padding-bottom: 1em;
        margin-top: auto;
    }
</style>
@endsection

@section('body')
    <form action="{{ route('shop.index') }}" method="get" role="search" class="form-inline my-2 my-lg-0 justify-content-center" style="margin: 0 auto;">
        @csrf
        <input class="form-control mr-sm-2" type="search" name="search-post" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        {{-- <a href="{{ route('shop.index') }}" class="btn btn-outline-success my-2 my-sm-0">Reset</a> --}}
    </form>

    <filter-post></filter-post>

    <div>
        <div> Activated filters </div>
        <div> </div>
    </div>

    <div class="right">
        @foreach ($posts as $post)
        <div class="list-group" style="width: 90%;">
            <a href="{{ route('shop.show',  $post->id) }}" class="list-group-item list-group-item-action">
                <header class="d-flex w-100 justify-content-between">
                    <span>{{ $post->post_title }}</span>
                    <span>₱ {{ $post->price }}</span>
                </header>
                <div class="list-content-box d-flex w-100 justify-content-between">
                    <div style="border: 1px solid black;">
                        <img src="{{ url('storage/'.$post->image) }}" alt="" style="width:300px; height: 250px;">
                    </div>
                    <div class="d-flex w-100 justify-content-between" style="border: 1px solid black;">
                        <ul class="features">
                            <li>Dog Name: ??</li>
                            <li>Age: ??</li>
                            <li>Breed:
                                @foreach($dogs as $dog)
                                    @if($post->dog_litter_id == $dog->dog_litter_id)
                                        {{$dog->breed}}
                                    @endif
                                @endforeach
                            </li>
                            <li>Registered</li>
                            <li>Users showing interests: {{$post->interests}}</li>
                            <li>{{ $post->post_description }}</li>
                        </ul>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    reserve button
                </div>
            </a>
        </div>
        @endforeach
        <div class="d-felx justify-content-center pagination">

            {{ $posts->links() }}

        </div>
    </div>
@endsection
