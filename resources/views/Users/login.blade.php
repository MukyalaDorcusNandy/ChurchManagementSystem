<!-- resources/views/Users/login.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Login - Church Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 bg-white p-4 shadow rounded">
                <h2 class="mb-4 text-center">Login</h2>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email" required autofocus>
                    </div>

                    <div class="form-group mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-check mb-3">
                   <input type="checkbox" class="form-check-input" id="remember" name="remember">
                   <label class="form-check-label" for="remember">Remember Me</label>
                  </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <p class="mt-3 text-center">
                        Don't have an account? <a href="{{ route('Users.register') }}">Add Account</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
