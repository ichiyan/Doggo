@extends('layouts.main')

@section('main')

    @include('partials.shapes')

    <section class="shop-form" style="margin-top: 10%">
        <livewire:shop-new-post-form/>
    </section>


@endsection
