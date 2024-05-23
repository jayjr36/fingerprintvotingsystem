<!-- resources/views/voters/edit.blade.php -->
@extends('layout')

@section('content')
    <div class="container col-md-5 mt-5">
        <h2 class="text-center">Edit Voter</h2>
        <form method="POST" action="{{ route('voters.update', $voter->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $voter->name }}" required>
            </div>
            <div class="form-group">
                <label for="card_no">Card Number</label>
                <input type="text" class="form-control" id="card_no" name="card_no" value="{{ $voter->card_no }}" required>
            </div>
            <div class="form-group">
                <label for="region">Region</label>
                <input type="text" class="form-control" id="region" name="region" value="{{ $voter->region }}" required>
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" id="district" name="district" value="{{ $voter->district }}" required>
            </div>
            <div class="form-group">
                <label for="ward">Ward</label>
                <input type="text" class="form-control" id="ward" name="ward" value="{{ $voter->ward }}" required>
            </div>
            <div class="form-group">
                <label for="fingerprint_id">Fingerprint ID</label>
                <input type="text" class="form-control" id="fingerprint_id" name="fingerprint_id" value="{{ $voter->fingerprint_id }}" required>
            </div>
            <div class="form-group">
                <label for="birth_date">Date of Birth</label>
                <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $voter->birth_date }}" required>
            </div>
            <button type="submit" class="btn btn-primary text-center">Update</button>
        </form>
    </div>
@endsection
