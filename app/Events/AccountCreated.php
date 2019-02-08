<?php

namespace App\Events;

use Spatie\EventProjector\ShouldBeStored;

class AccountCreated implements ShouldBeStored
{
    /** @var string */
    public $accountUuid;

    /** @var array */
    public $accountAttributes;

    public function __construct(array $accountAttributes)
    {
        $this->accountUuid = $accountAttributes['uuid'];

        $this->accountAttributes = $accountAttributes;
    }
}
