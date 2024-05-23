@extends('layout')

@section('content')
    <div class="container-fluid align-items-center justify-content-center" style="height: 90vh;">
        <h1 class="text-center">ELECTORAL CONTESTANTS</h1>
        <div class="row px-5 py-3">
            <h2 class="text-center">President Contestants</h2>
            @foreach ($presidentContestants as $contestant)
                <div class="col-md-3 px-5 text-center">
                    <div class="card mb-3">
                        <img src="{{ asset('images/' . $contestant->image) }}" style="height: 150px;" class="card-img-top" alt="{{ $contestant->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $contestant->name }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row px-5 py-3">
            <h2 class="text-center">Member of Parliament Contestants</h2>
            @foreach ($mpContestants as $contestant)
                <div class="col-md-3 px-5">
                    <div class="row card mb-3">
                        <img src="{{ asset('images/' . $contestant->image) }}" class="card-img-top" style="height: 150px;" alt="{{ $contestant->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $contestant->name }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row px-5">
            <h2 class="text-center">Councilor Contestants</h2>
            @foreach ($councilorContestants as $contestant)
                <div class="col-md-3 px-5">
                    <div class="row card mb-3">
                        <img src="{{ asset('images/' . $contestant->image) }}" style="height: 200px;" class="card-img-top" alt="{{ $contestant->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $contestant->name }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
