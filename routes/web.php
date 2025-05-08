<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\TransactionController as UserTransactionController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->group(function () {
    Route::get('/transaction/create', [UserTransactionController::class, 'create'])->name('user.transaction.create');
    Route::post('/transaction/store', [UserTransactionController::class, 'store'])->name('user.transaction.store');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('admin.transactions.index');
        Route::get('/transactions/{transaction}/edit', [AdminTransactionController::class, 'edit'])->name('admin.transactions.edit');
        Route::put('/transactions/{transaction}', [AdminTransactionController::class, 'update'])->name('admin.transactions.update');
        Route::delete('/transactions/{transaction}', [AdminTransactionController::class, 'destroy'])->name('admin.transactions.destroy');
    });
});
