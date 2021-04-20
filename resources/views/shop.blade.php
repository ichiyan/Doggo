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
    <search-post></search-post>

    <filter-post></filter-post>
    <div class="right">
        @foreach ($posts as $post)
            <div class="card-post">
                <a href="{{ route('shop.show',  $post->id) }}">
                    <div class="image-slot">
                        <img src="" alt="dog">
                    </div>
                    <div class="details-slot">
                        <h2>TITLE</h2>
                        <p>description</p>
                        <div class="breed-price">
                            <div class="breed">
                                breed
                            </div>
                            <div class="price">
                                 ₱ {{$post->price}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="d-felx justify-content-center pagination">

            {{ $posts->links() }}

        </div>
    </div>
@endsection
