<div>
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
            {{-- {{ $post->dog->breed }} | {{ $post->dog->age }} | --}} breed
        </span>
        {{-- add location --}}
        <span class="badge badge-primary">{{$post->interests}} Interested</span>
        <p>{{ $post->post_description }}</p>
    </div>
</div>
