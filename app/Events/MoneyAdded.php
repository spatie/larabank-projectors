<?php

namespace App\Events;

use Spatie\EventProjector\DomainEvent;

class MoneyAdded implements DomainEvent
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
