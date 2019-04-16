<?php

namespace App\Reactors;

use App\Account;
use App\Events\MoneyAdded;
use App\Mail\BigAmountAddedMail;
use Illuminate\Support\Facades\Mail;
use Spatie\EventProjector\EventHandlers\EventHandler;
use Spatie\EventProjector\EventHandlers\HandlesEvents;

class BigAmountAddedReactor implements EventHandler
{
    use HandlesEvents;

    public function onMoneyAdded(MoneyAdded $event)
    {
        if ($event->amount < 5000) {
            return;
        }

        $account = Account::uuid($event->accountUuid);

        Mail::to('director@fbi.gov')->send(new BigAmountAddedMail($account, $event->amount));
    }
}
