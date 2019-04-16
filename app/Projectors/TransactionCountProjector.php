<?php

namespace App\Projectors;

use App\Account;
use App\Events\MoneyAdded;
use App\Events\MoneySubtracted;
use App\TransactionCount;
use Spatie\EventProjector\Projectors\ProjectsEvents;
use Spatie\EventProjector\Projectors\QueuedProjector;

class TransactionCountProjector implements QueuedProjector
{
    use ProjectsEvents;

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
