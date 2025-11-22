<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (optional) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        /* Background image */
        body {
            background-image: url("{{ asset('images/welcome_image.jpg') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Card styling */
        .card-login {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 2rem;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        /* Heading */
        .text-main {
            color: #9FABF0;
        }

        /* Login button */
        .btn-login {
            background-color: #9FABF0;
            color: #fff;
            border: none;
        }
        .btn-login:hover {
            background-color: #9FABF0;
        }
    </style>
</head>
<body>

    <div class="card card-login text-center">
        <h1 class="mb-4 fw-bold text-main">Login</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-4 text-start">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-login w-100 py-2">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
