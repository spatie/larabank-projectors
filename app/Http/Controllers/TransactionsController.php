<?php

namespace App\Http\Controllers;

use App\TransactionCount;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactionCounts = TransactionCount::orderByDesc('count')->get();

        return view('transactions.index', compact('transactionCounts'));
    }
}
