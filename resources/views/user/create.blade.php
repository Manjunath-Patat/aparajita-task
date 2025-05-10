<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('Add New Transaction')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #343a40;
            color: #fff;
            padding: 1rem 2rem;
            margin-bottom: 2rem;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #f8f9fa;
            margin-left: 1rem;
            transition: color 0.15s ease-in-out;
        }

        .navbar-nav .nav-link:hover {
            color: #adb5bd;
        }

        .form-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            width: 450px;
            max-width: 95%;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 35px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .form-group {
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-size: 1.1rem;
            color: #343a40;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1rem;
            color: #495057;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .form-select {
            width: 100%;
            padding: 14px 18px;
            border: 1px solid #bdc3c7;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1rem;
            color: #495057;
            background-color: #fff;
            appearance: none;
            background-image: url('data:image/svg+xml,%3csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 16 16%27 fill=%27%23495057%27%3e%3cpath fill-rule=%27evenodd%27 d=%27M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z%27/%3e%3c/svg%3e');
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
        }

        .btn-primary {
            background-color: #27ae60;
            color: #fff;
            border: none;
            padding: 14px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background-color 0.15s ease-in-out, transform 0.1s ease-in-out;
            width: 100%;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(39, 174, 96, 0.3);
        }

        .btn-primary:hover {
            background-color: #1e8449;
            transform: translateY(-1px);
        }

        .mt-3 {
            margin-top: 2rem;
        }

        .alert-success {
            color: #27ae60;
            background-color: #f0fdfa;
            border: 1px solid #b8f2e5;
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 30px;
            font-weight: 500;
        }

        label i {
            margin-right: 8px;
            color: #7f8c8d;
        }

        .container {
            margin-top: 2rem;
            /* Add space below the navbar */
            display: flex;
            justify-content: center;
            /* Center the form */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">@lang('Add New Transaction')</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}"><i class="fas fa-sign-in-alt me-1"></i>
                            @lang('Login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url()->previous() }}"><i class="fas fa-arrow-left me-1"></i>
                            @lang('Back')</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="form-container">
            @if (session('success'))
                <div class="alert-success"><i class="fas fa-check-circle me-2"></i> {{ session('success') }}</div>
            @endif

            <form action="{{ route('user.transaction.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name"><i class="fas fa-file-signature"></i> @lang('Name'):</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="type"><i class="fas fa-list-ul"></i> @lang('Type'):</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="">@lang('Please Select Type')</option>
                        <option value="expense">@lang('Expense')</option>
                        <option value="income">@lang('Income')</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="amount"><i class="fas fa-coins"></i> @lang('Amount'):</label>
                    <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3"><i class="fas fa-save me-2"></i>
                    @lang('Save Transaction')</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>