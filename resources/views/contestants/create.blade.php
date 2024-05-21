@extends('layout')

@section('content')
    <div class="container mt-5 col-md-6">
        <h2 class="text-center">Upload Contestant</h2>
        <form action="{{route('store-contestants')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="president">President</option>
                    <option value="mp">Member of Parliament</option>
                    <option value="councilor">Councilor</option>
                </select>
            </div>
            <div class="form-group py-4">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <div class="row py-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
@endsection
