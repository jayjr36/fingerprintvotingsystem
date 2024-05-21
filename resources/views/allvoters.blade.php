@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Registered Voters</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Card Number</th>
                    <th>Region</th>
                    <th>District</th>
                    <th>Ward</th>
                    <th>Fingerprint ID</th>
                    <th>Date of Birth</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($voters as $voter)
                    <tr>
                        <td>{{ $voter->name }}</td>
                        <td>{{ $voter->card_no }}</td>
                        <td>{{ $voter->region }}</td>
                        <td>{{ $voter->district }}</td>
                        <td>{{ $voter->ward }}</td>
                        <td>{{ $voter->fingerprint_id }}</td>
                        <td>{{ $voter->birth_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
