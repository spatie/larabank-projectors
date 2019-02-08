<?php

namespace App\Http\Controllers;

use App\Account;
use App\Events\AccountDeleted;
use App\Http\Requests\CreateAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = Account::where('user_id', Auth::user()->id)->get();

        return view('accounts.index', compact('accounts'));
    }

    public function store(CreateAccountRequest $request)
    {
        $attributes = $request->validated();

        Account::createWithAttributes($attributes);

        return back();
    }

    public function update(Account $account, UpdateAccountRequest $request)
    {
        $request->adding()
            ? $account->addMoney($request->amount)
            : $account->subtractMoney($request->amount);

        return back();
    }

    public function destroy(Account $account)
    {
        event(new AccountDeleted($account->uuid));

        return back();
    }
}
