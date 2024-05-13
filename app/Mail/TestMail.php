<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invoiceDetail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoiceDetail)
    {
        $this->invoiceDetail = $invoiceDetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject('Your Order')
            ->view('mail.test');
    }
}
