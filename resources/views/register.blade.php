<!DOCTYPE html>
<html>
<head>
    <title>Voter Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5 col-md-5">
        <center>
            <h2>Voter Registration</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <br>

                <div class="form-group">
                    <label for="region">Region:</label><br>
                    <input type="text" id="region" name="region" class="form-control" required>
                </div>
                <br>

                <div class="form-group">
                    <label for="district">District:</label><br>
                    <input type="text" id="district" name="district" class="form-control" required>
                </div>
                <br>

                <div class="form-group">
                    <label for="ward">Ward:</label><br>
                    <input type="text" id="ward" name="ward" class="form-control" required>
                </div>
                <br>

                <div class="form-group">
                    <label for="dob">Date of birth:</label><br>
                    <input type="date" id="dob" name="dob" class="form-control" required>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        <a href="{{route('votes-display')}}" class="btn btn-secodary">VOTES</a>
            <div id="fingerprint-response" class="mt-4"></div>
        </center>
    </div>

    <script>
        function updateFingerprint(fingerprintId) {
            $.ajax({
                url: '/update-fingerprint',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    fingerprint_id: fingerprintId
                },
                success: function(response) {
                    if (response.success) {
                        $('#fingerprint-response').html('<div class="alert alert-success">' + response.message + '</div>');
                    } else {
                        $('#fingerprint-response').html('<div class="alert alert-danger">' + response.error + '</div>');
                    }
                },
                error: function() {
                    $('#fingerprint-response').html('<div class="alert alert-danger">Failed to update fingerprint. Please try again.</div>');
                }
            });
        }

        // Simulate fingerprint update for demonstration purposes
        // $(document).ready(function() {
        //     setTimeout(function() {
        //         updateFingerprint('sample-fingerprint-id'); // Replace with actual fingerprint ID
        //     }, 5000); 
        // });
    </script>
</body>
</html>
