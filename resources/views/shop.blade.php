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

    <div>
        <div> Activated filters </div>
        <div>  </div>
    </div>

    <div class="right">
        @foreach ($posts as $post)
            <div class="card-post">
                <a href="{{ route('shop.show',  $post->id) }}">
                    <div class="image-slot">
                        <img src="{{ url('storage/'.$post->image) }}" alt="dog">
                    </div>
                    <div class="details-slot">
                        <h2>{{ $post->post_title }}</h2>
                        <p>{{ $post->post_description }}</p>
                        <div class="breed-price">
                            <div class="breed">
                                @foreach($dogs as $dog)
                                    @if($post->dog_litter_id == $dog->dog_litter_id)
                                        {{$dog->breed}}
                                    @endif
                                @endforeach
                            </div>
                            <div class="price">
                                 ₱ {{$post->price}}
                            </div>
                        </div>
                        <div>
                            Location: {{$post->interests}}
                        </div>
                        <div> <!-- change to icon later??? -->
                            People Interested: {{$post->interests}}
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
