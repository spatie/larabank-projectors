<?php

namespace App\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;

class MoneySubtracted extends ShouldBeStored
{
    public function __construct(
        public string $accountUuid,
        public int $amount,
    ) {}
}
