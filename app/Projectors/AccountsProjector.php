<?php

namespace App\Projectors;

use App\Account;
use App\Events\AccountCreated;
use App\Events\AccountDeleted;
use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class AccountsProjector extends Projector
{
    public function onAccountCreated(AccountCreated $event)
    {
        Account::create($event->accountAttributes);
    }

    public function onMoneyAdded(MoneyAdded $event)
    {
        $account = Account::uuid($event->accountUuid);

        $account->balance += $event->amount;

        if ($account->balance >= 0) {
            $this->broke_mail_sent = false;
        }

        $account->save();
    }

    public function onMoneySubtracted(MoneySubtracted $event)
    {
        $account = Account::uuid($event->accountUuid);

        $account->balance -= $event->amount;

        $account->save();
    }

    public function onAccountDeleted(AccountDeleted $event)
    {
        $account = Account::uuid($event->accountUuid);

        $account->delete();
    }

    public function resetState()
    {
        Account::truncate();
    }
}
