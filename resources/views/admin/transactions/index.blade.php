<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Transaction List</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Back to Dashboard</a>

        @if ($transactions->isNotEmpty())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>@lang('ID')</th>
                        <th>@lang('Name')</th>
                        <th>@lang('Type')</th>
                        <th>@lang('Amount')</th>
                        <th>@lang('Created At')</th>
                        <th>@lang('Actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->name }}</td>
                            <td>{{ ucfirst($transaction->type) }}</td>
                            <td>₹ {{ number_format($transaction->amount, 2) }}</td>
                            <td>{{ $transaction->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.transactions.edit', $transaction->id) }}"
                                    class="btn btn-sm btn-primary me-2">@lang('Edit')</a>
                                <form action="{{ route('admin.transactions.destroy', $transaction->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('@lang('Are you sure?')')">@lang('Delete')</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $transactions->links() }}
        @else
            <p>@lang('No transactions found.')</p>
        @endif

        <div class="mt-4">
            <h3>@lang('Total Expense'): ₹ {{ number_format($totalExpense, 2) }}</h3>
            <h3>@lang('Total Income'): ₹ {{ number_format($totalIncome, 2) }}</h3>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>