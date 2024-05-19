<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-nav {
            margin: auto;
        }
        .navbar-brand {
            margin-right: auto;
        }
        iframe {
            width: 100%;
            height: 500px;
            border: none; /* Remove border */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="#">Fingerprint Based Voting System</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('register')}}" target="iframe">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('contestants.index')}}" target="iframe">Contestants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('votes-display')}}" target="iframe">Results</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('')}}" target="iframe">Voters</a>
                </li> --}}
            </ul>
        </div>
    </nav>

    <!-- Iframe -->
    <iframe name="iframe"  frameborder="0" src="{{route('register')}}" style="height: 90vh"></iframe>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
