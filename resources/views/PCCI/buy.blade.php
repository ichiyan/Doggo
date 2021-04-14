@extends('layouts.main')

@section('body')
    <search-post></search-post>

    <filter-post></filter-post>
    <div class="right" style="float: right; width: 78%; height: auto;border: 1px solid black; display: flex; justify-content: space-evenly; flex-wrap: wrap; y-overflow: auto;">
        <card-post link="{{ url('/') }}"></card-post>
        <card-post link="{{ url('/') }}"></card-post>
        <card-post link="{{ url('/') }}"></card-post>
        <card-post link="{{ url('/') }}"></card-post>
        <card-post link="{{ url('/') }}"></card-post>
        <card-post link="{{ url('/') }}"></card-post>
    </div>
@endsection
