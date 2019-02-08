<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\TransactionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('accounts', AccountsController::class);
    Route::get('transactions', [TransactionsController::class, 'index']);
});
