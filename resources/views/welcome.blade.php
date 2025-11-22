<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - OISSTI Hotel System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        /* Custom text colors */
        .text-main {
            color: #9FABF0; /* change to your preferred color */
        }
        .text-sub {
            color: #555555; /* change to your preferred secondary color */
        }

        /* Custom buttons */
        .btn-login {
            background-color: #9FABF0;
            color: #ffffff;
            border: none;
        }
        .btn-login:hover {
            background-color: #9FABF0;
        }

        .btn-dashboard {
            background-color: #28a745;
            color: #ffffff;
            border: none;
        }
        .btn-dashboard:hover {
            background-color: #218838;
        }

        .btn-logout {
            background-color: #dc3545;
            color: #ffffff;
            border: none;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="vh-100 d-flex align-items-center justify-content-center position-relative">

    <!-- Background image as img -->
    <img src="{{ asset('images/welcome_image.jpg') }}" 
         alt="Welcome" 
         class="position-absolute top-0 start-0 w-100 h-100" 
         style="object-fit: cover; z-index: -1;">

    <div class="card shadow-lg p-4 p-md-5 text-center" style="max-width: 500px; background: rgba(255,255,255,0.9);">
        <h1 class="card-title mb-3 display-5 fw-bold text-main">OISSTI Hotel System</h1>
        <p class="mb-4 text-sub">
            Manage guests, rooms, reservations, housekeeping, maintenance, folios, feedback, and users efficiently.
        </p>

        @guest
            <a href="{{ route('login') }}" class="btn btn-login btn-lg w-100 mb-2">
                <i class="bi bi-box-arrow-in-right me-2"></i> Login
            </a>
        @else
            <a href="{{ route('dashboard') }}" class="btn btn-dashboard btn-lg w-100 mb-2">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout btn-lg w-100">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        @endguest
    </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
