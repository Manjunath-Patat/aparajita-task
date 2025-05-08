<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Transaction</h1>
        <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $transaction->name }}" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="expense" {{ $transaction->type === 'expense' ? 'selected' : '' }}>Expense</option>
                    <option value="income" {{ $transaction->type === 'income' ? 'selected' : '' }}>Income</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount"
                    value="{{ $transaction->amount }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Transaction</button>
            <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary mt-3">Back to List</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>