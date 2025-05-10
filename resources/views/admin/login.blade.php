<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f0f2f5;
            /* Light background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background-color: #ffffff;
            /* White card */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            /* Increased max-width for larger screens */
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
            /* Darker header color */
            margin-bottom: 1.5rem;
            text-align: center;
            /* Center the title */
            border-bottom: 1px solid #e0e0e0;
            /* Add a border */
            padding-bottom: 1rem;
        }

        .form-label {
            font-weight: 600;
            color: #34495e;
            /* Darker label color */
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            /* Slightly thicker border */
            border-radius: 6px;
            padding: 0.75rem;
            transition: border-color 0.2s ease;
            /* Smooth transition */
            width: calc(100% - 1.5rem);
            /* Adjusted width */
        }

        .form-control:focus {
            border-color: #4299e1;
            /* Highlight on focus */
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
            /* Add a focus shadow */
            outline: none;
            /* Remove default outline */
        }

        .invalid-feedback {
            color: #e53e3e;
            /* Red error message */
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .form-check-label {
            color: #4a5568;
            /* Darker label color */
        }

        .btn-primary {
            background-color: #4299e1;
            /* Blue button */
            border: none;
            border-radius: 6px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: #ffffff;
            transition: background-color 0.2s ease;
            /* Smooth transition */
            width: 100%;
            /* Full width button */
            display: block;
            text-align: center;
        }

        .btn-primary:hover {
            background-color: #3182ce;
            /* Darker blue on hover */
        }

        .btn-primary:focus {
            background-color: #2358a3;
            /* Even darker blue on focus */
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.3);
            /* Add focus shadow */
            outline: none;
        }

        .form-check-input {
            border-radius: 4px;
            /* Rounded checkbox */
            border-color: #e0e0e0;
            transition: border-color 0.2s ease;
        }

        .form-check-input:checked {
            background-color: #4299e1;
            /* Blue when checked */
            border-color: #4299e1;
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.3);
            /* Add focus shadow */
            outline: none;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                        <div class="mt-4 text-center">
                            <a href="#">Forgot Your Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>