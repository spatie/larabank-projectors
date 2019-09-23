<?php

use App\Account;
use App\Events\AccountDeleted;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\LazyCollection;
use Laravel\Telescope\Telescope;

class TransactionsSeeder extends Seeder
{
    public function run()
    {
        Telescope::stopRecording();

        $user = User::first();
        $account = Account::whereName('My account')->first();

        if (!$account) {
            $account = Account::createWithAttributes([
                'uuid' => faker()->uuid,
                'name' => 'My account',
                'user_id' => $user->id,
                'balance' => 0,
            ]);
        }

        $this->command->getOutput()->progressStart(50000);

        foreach (range(1, 50000) as $i) {
            $this->command->getOutput()->progressAdvance();
            $account->addMoney(faker()->numberBetween(1, 1000));
            $account->subtractMoney(faker()->numberBetween(1, 900));
            $account->addMoney(faker()->numberBetween(1, 1000));
            $account->subtractMoney(faker()->numberBetween(1, 900));
        }

        $this->command->getOutput()->progressFinish();
    }
}
