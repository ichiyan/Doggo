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
<div class="reports">
    <table class="table">
        <thead class="table-dark">
          <th>Post</th>
          <th>Reporter</th>
          <th>Reason</th>
          <th>Reported at</th>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td><a href="#">{{ $report->post_title }}</a></td>
                    <td><a href="#">{{ $report->name }}</a></td>
                    <td>{{ $report->reason }}</td>
                    <td>{{ $report->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="card">hello</div>
    <div class="container report">
        <div class="row">
            <div class="col-sm">
                <i>ICON</i>
            </div>

            <div class="col-11">
                <div class="row">
                    Post Title
                </div>

                <div class="row">
                    <div class="col">
                    reported by _____ 2 hrs ago.
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
