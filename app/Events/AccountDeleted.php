<?php

namespace App\Events;

use Spatie\EventSourcing\ShouldBeStored;

class AccountDeleted implements ShouldBeStored
{
    /** @var string */
    public $accountUuid;

    public function __construct(string $accountUuid)
    {
        $this->accountUuid = $accountUuid;
    }
}
