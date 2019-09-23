<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionCount extends Model
{
    public $guarded = [];

    public static function record(Account $account)
    {
        $user = User::where('id', $account->user_id)->first();

        $transactionCounter = self::firstOrCreate(['email' => $user->email]);

        $transactionCounter->count += 1;

        $transactionCounter->save();
    }
}
