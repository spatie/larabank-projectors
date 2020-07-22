<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class MoneySubtracted extends ShouldBeStored
{
    /** @var string */
    public $accountUuid;

    /** @var int */
    public $amount;

    public function __construct(string $accountUuid, int $amount)
    {
        $this->accountUuid = $accountUuid;

        $this->amount = $amount;
    }
}
