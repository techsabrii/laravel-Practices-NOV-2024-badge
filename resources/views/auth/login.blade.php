<!DOCTYPE html>
<html>

<head>
    <title>Login - TS Developers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card-header">
            <h5 class="mb-0">login</h5>

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
        <div class="card shadow p-4 col-md-6 offset-md-3">
            <h3 class="text-center">Login</h3>


            <form id="loginForm">
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button class="btn btn-primary w-100">Login</button>
            </form>

            <script>
                document.getElementById("loginForm").addEventListener("submit", async function(e) {
                    e.preventDefault();

                    let formData = {
                        email: this.email.value,
                        password: this.password.value
                    };

                    try {
                        let response = await fetch("{{ url('api/login') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json"
                            },
                            body: JSON.stringify(formData)
                        });

                        let data = await response.json();
                        console.log("API Response:", data);

                        if (data.status) {
                            // ✅ Save token and user data
                            localStorage.setItem("token", data.token); // token
                            localStorage.setItem("user", JSON.stringify(data.data)); // user info

                            // redirect
                            window.location.href = "{{ url('/hi') }}";
                        } else {
                            alert("❌ " + data.message);
                        }
                    } catch (err) {
                        console.error("Error:", err);
                        alert("⚠️ Something went wrong");
                    }
                });
            </script>





            <!-- <form method="POST" action="{{ route('login.store') }}">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button class="btn btn-primary w-100">Login</button>
            </form> -->
            <p class="mt-3 text-center">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
</body>

</html>
