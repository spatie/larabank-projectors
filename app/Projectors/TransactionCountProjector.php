<?php

namespace App\Projectors;

use App\Account;
use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use App\TransactionCount;
use Spatie\EventSourcing\EventHandlers\Projectors\Projector;

class TransactionCountProjector extends Projector
{
    public function onMoneyAdded(MoneyAdded $event)
    {
        $account = Account::uuid($event->accountUuid);

        TransactionCount::record($account);
    }

    public function onMoneySubtracted(MoneySubtracted $event)
    {
        $account = Account::uuid($event->accountUuid);

        TransactionCount::record($account);
    }

    public function resetState()
    {
        TransactionCount::truncate();
    }
}
