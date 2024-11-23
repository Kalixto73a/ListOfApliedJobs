@extends('layouts.app')
@section('content')
<div class="tableJobs">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Company</th>
                <th scope="col">Offer</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>{{ $job->created_at}}</td>
                    <td>{{ $job->company}}</td>
                    <td>{{ $job->offer}}</td>
                    <td>{{ $job->status}}</td>
                </tr>
            @endforeach
        <tr>
    </table>
</div>
@endsection