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
        <div>  </div>
    </div>

    <div class="right">
        <div class="card-post">
            <a href="">
                <div class="image-slot">
                    <img src="" alt="dog">
                </div>
                <div class="details-slot">
                    <h2>Title</h2>
                    <p>Description</p>
                    <div class="breed-price">
                        <div class="breed">
                            breed
                        </div>
                        <div class="price">
                             ₱ ????
                        </div>
                    </div>
                    <div>
                        Location:
                    </div>
                    <div> <!-- change to icon later??? -->
                        Interests
                    </div>
                </div>
            </a>
        </div>
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
