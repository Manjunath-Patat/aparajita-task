<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TransactionController extends Controller
{
    public function index(): View
    {
        $transactions = Transaction::latest()->paginate(10);
        $totalExpense = Transaction::where('type', 'expense')->sum('amount');
        $totalIncome = Transaction::where('type', 'income')->sum('amount');

        return view('admin.transactions.index', compact('transactions', 'totalExpense', 'totalIncome'));
    }

    public function edit(Transaction $transaction): View
    {
        return view('admin.transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
            'amount' => 'required|numeric|min:0.01',
        ]);

        $transaction->update($request->all());

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction updated successfully!');
    }
    public function destroy(Transaction $transaction): RedirectResponse
    {
        $transaction->delete();

        return redirect()->route('admin.transactions.index')->with('success', 'Transaction deleted successfully!');
    }
}