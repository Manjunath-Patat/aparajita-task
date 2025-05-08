<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:expense,income',
            'amount' => 'required|numeric|min:0.01',
        ]);

        Transaction::create($request->all());

        return Redirect::route('user.transaction.create')->with('success', 'Data saved successfully!');
    }
}