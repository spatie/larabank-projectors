<?php

namespace App\Mail;

use App\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BigAmountAddedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Account $account,
        public int $amount
    ) {}

    public function build()
    {
        return $this
            ->subject('A big amount was added!')
            ->view('mails.bigAmountAdded');
    }
}
