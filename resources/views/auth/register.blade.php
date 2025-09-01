<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - TS Developers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #0062E6, #33AEFF);
        }

        .card {
            border-radius: 20px;
            border: none;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0062E6;
        }

        .btn-custom {
            background-color: #0062E6;
            color: #fff;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #004bb5;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4 col-md-6">
            <div class="text-center mb-4">
                <img src="{{ asset('img/icon/logo.png') }}" alt="TS Developers Logo" width="80" class="mb-2">
                <h3 class="fw-bold text-primary">Create Your Account</h3>
                <p class="text-muted">Join TS Developers and start your journey today</p>
            </div>
            <div class="card-header">


                {{-- Success Message --}}
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                {{-- Error Message --}}
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <form method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Full Name</label>
                    <input type="text" name="full_name" class="form-control" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Contact</label>
                    <input type="text" name="contact" class="form-control" placeholder="Enter your contact number" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Create a password" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter password" required>
                </div>
                <button class="btn btn-custom w-100 py-2 fw-semibold">Register</button>
            </form>

            <p class="mt-3 text-center">
                Already have an account?
                <a href="{{ route('login') }}" class="text-decoration-none fw-bold text-primary">Login</a>
            </p>
        </div>
    </div>
</body>

</html>
