@extends('layouts.admin')

@section('style')
    <style>
        .report {
            border: 1px solid black;
            min-width: 500px;
            margin-bottom: 5px;
        }

        .no-p-m {
            padding: 0;
            margin: 0;
        }

        .b {
            border: 1px solid green;
        }

        .media {
            max-width: 350px;
        }

        .rounded-circle {
            height: 40px;
            width: 40px;
        }

        .report-link {
            color: black;
            font-style: none;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    {{-- view reports and listing logs --}}
    {{-- Have 2 different logs --}}
<div class="reports">

    @foreach ($reports as $report)
        <div class="container report">
            <div class="row">
                <div class="col-sm" style="max-width: 55px; border: 1px solid black; font-size: 24px;">
                    <i class="far fa-flag"></i>
                </div>

                <div class="col-11">
                    <div class="row">
                        {{-- page for the report or it can be modal --}}
                        <a href="">{{ $report->post->post_title}}</a>
                    </div>

                    <div class="row">
                        <div class="col">
                        reported by {{ $report->username }} on {{ $report->created_at->toFormattedDateString() }}.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

<br>
listings
<br>
<div class="listings">
    @foreach ($posts as $post)
        <div class="container report">
            <div class="row">
                <div class="col-sm" style="max-width: 55px; border: 1px solid black; font-size: 24px;">
                    <i class="fas fa-paw"></i>
                </div>

                <div class="col-11">
                    <div class="row">
                        {{-- page for the report or it can be modal --}}
                        <a href="">{{ $post->post_title}}</a>
                    </div>

                    <div class="row">
                        <div class="col">
                        posted by {{ $post->post_description }} on {{ $post->created_at->toFormattedDateString() }}.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
