<?php

namespace App\Events;

use Spatie\EventProjector\DomainEvent;

class AccountCreated implements DomainEvent
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
