<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('Transaction List')</title>
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

        .navbar-nav .nav-item {
            margin-left: 1rem;
        }

        .navbar-nav .nav-link {
            color: #f8f9fa;
            transition: color 0.15s ease-in-out;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-link:hover {
            color: #adb5bd;
        }

        .navbar-nav .nav-link i {
            margin-right: 0.5rem;
        }

        .logout-form {
            display: inline;
            /* To keep it in line with other navbar items */
        }

        .logout-button {
            background: none;
            border: none;
            color: #f8f9fa;
            padding: 0;
            font-size: inherit;
            cursor: pointer;
            transition: color 0.15s ease-in-out;
            display: flex;
            align-items: center;
            margin-left: 1rem;
        }

        .logout-button:hover {
            color: #adb5bd;
        }

        .logout-button i {
            margin-right: 0.5rem;
        }

        .table-container {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .search-container {
            background-color: #f8f9fa;
            padding: 1rem;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .search-input {
            flex-grow: 1;
        }

        .action-buttons a,
        .action-buttons form button {
            margin-right: 0.5rem;
        }

        .amount-cell {
            font-weight: bold;
            color: green;
            /* Or red for expense */
        }

        .type-badge {
            display: inline-block;
            padding: 0.25em 0.4em;
            font-size: 0.875em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.25rem;
        }

        .type-income {
            background-color: #198754;
            /* Green */
        }

        .type-expense {
            background-color: #dc3545;
            /* Red */
        }

        .container {
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand">@lang('Transaction Management')</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.transaction.create') }}"><i
                                class="fas fa-plus-circle me-1"></i> @lang('Add Transaction')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-arrow-left me-1"></i>
                            @lang('Back to Dashboard')</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('admin.logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="logout-button">
                                <i class="fas fa-sign-out-alt me-1"></i> @lang('Logout')
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="search-container rounded-top">
            <form action="{{ route('admin.transactions.index') }}" method="GET" class="d-flex align-items-center gap-2">
                <div class="input-group search-input">
                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM6.5 12a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z" />
                        </svg></span>
                    <input type="text" class="form-control" name="search" placeholder="@lang('Search transactions...')"
                        value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn btn-primary">@lang('Search')</button>
                <a href="{{ route('admin.transactions.index') }}" class="btn btn-outline-secondary">@lang('Reset')</a>
            </form>
        </div>

        <div class="table-container">
            @if ($transactions->isNotEmpty())
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr class="bg-light">
                            <th>@lang('SR.No')</th>
                            <th>@lang('Name')</th>
                            <th>@lang('Type')</th>
                            <th>@lang('Amount')</th>
                            <th>@lang('Created At')</th>
                            <th class="text-center">@lang('Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td><span
                                        class="fw-bold">{{ $loop->iteration + ($transactions->currentPage() - 1) * $transactions->perPage() }}</span>
                                </td>
                                <td><span>{{ $transaction->name }}</span></td>
                                <td>
                                    <span
                                        class="type-badge type-{{ $transaction->type }}">{{ ucfirst($transaction->type) }}</span>
                                </td>
                                <td class="amount-cell">₹ {{ number_format($transaction->amount, 2) }}</td>
                                <td><span class="text-muted">{{ $transaction->created_at }}</span></td>
                                <td class="text-center action-buttons">
                                    <a href="{{ route('admin.transactions.edit', $transaction->id) }}"
                                        class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip"
                                        title="@lang('Edit this transaction')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path
                                                d="M11.424 1.756l-.092.092a1 1 0 0 1-.707 0l-7.146-7.146a1 1 0 0 1 0-1.414l.092-.092a1 1 0 0 1 1.414 0l7.146 7.146a1 1 0 0 1 0 1.414z" />
                                            <path fill-rule="evenodd"
                                                d="M12.146 5.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 0-.708l10-10z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('@lang('Are you sure?')')" data-bs-toggle="tooltip"
                                            title="@lang('Delete this transaction')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd"
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H2a1 1 0 0 1 1-1H13a1 1 0 0 1 1 1v1zM4 4v10h8V4H4z" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $transactions->links() }}
                </div>
            @else
                <p class="mt-3">@lang('No transactions found.')</p>
            @endif
        </div>

        <div class="mt-4">
            <h3>@lang('Total Expense'): <span class="text-danger">₹ {{ number_format($totalExpense, 2) }}</span></h3>
            <h3>@lang('Total Income'): <span class="text-success">₹ {{ number_format($totalIncome, 2) }}</span></h3>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</body>

</html>