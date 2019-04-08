<?php

namespace App\Events;

use Spatie\EventProjector\ShouldBeStored;

class AccountDeleted implements ShouldBeStored
{
    /** @var string */
    public $accountUuid;

    public function __construct(string $accountUuid)
    {
        $this->accountUuid = $accountUuid;
    }
}
