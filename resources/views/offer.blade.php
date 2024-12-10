@extends('layouts.app')

@section('content')
<div class="tableJobs2">
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
            <tr>
                <td>{{ $job->id }}</td>       
                <td>
                    <div>
                    {{ $job->created_at->format('d/m/Y H:i:s') }}
                    </div>
                    <div>
                    {{ $job->updated_at->format('d/m/Y H:i:s') }}
                    </div>
                </td>
                <td>{{ $job->company }}</td>                
                <td class="OfferSecondTable">{{ $job->offer }}</td>               
                <td>{{ $job->status_text }}</td>        
            </tr>
        </tbody>
    </table>
</div>
<div>
    <div class="cards-container">
        @forelse ($job->follows as $follow)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-header-text">Created at: <br>{{ $follow->created_at->format('d/m/Y H:i:s') }}</h5>
                </div>
                <div class="card-body">
                    <p>{{ $follow->news }}</p>
                </div>
            </div>
        @empty
            <div class="card-NoNewInfo">
                <div class="card-body-NoNewInfo">
                    <p class="card-text-NoNewInfo">✖️Todavía no hay información✖️ </p>
                </div>
            </div>
        @endforelse
    </div>
</div>
<div class="ButtonHome">
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Volver a la Lista</a>
</div>
@endsection
