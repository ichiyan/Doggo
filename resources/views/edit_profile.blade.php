@extends('layouts.main')

@section('main')

@include('partials.shapes')

<section class="shop-form" style="margin-top: 10%">
    <livewire:edit-profile :user="$user"/>
</section>

@endsection
