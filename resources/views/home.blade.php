@extends('layouts.app')
@section('content')
<div class="tableJobs">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Date</th>
                <th scope="col">Company</th>
                <th scope="col">Offer</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td>{{ $job->id}}</td>
                    <td><div>{{ $job->created_at->format("d/m/Y/H:i:s")}}</div>
                        <div>{{$job->updated_at->format("d/m/Y/H:i:s")}}</div>
                    </td>
                    <td>{{ $job->company}}</td>
                    <td class="OfferFirstTable">
                        <a href="{{ route('show', ['id' => $job->id]) }}" class="offer-child">
                            {{ $job->offer }}
                        </a>
                    </td>
                    <td>{{ $job->status_text}}</td>
                </tr>
            @endforeach
        <tr>
    </table>
</div>
@endsection