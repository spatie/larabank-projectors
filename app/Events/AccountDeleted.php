<?php

namespace App\Events;

use Spatie\EventProjector\DomainEvent;

class AccountDeleted implements DomainEvent
{
    /** @var string */
    public $accountUuid;

    public function __construct(string $accountUuid)
    {
        $this->accountUuid = $accountUuid;
    }
}
