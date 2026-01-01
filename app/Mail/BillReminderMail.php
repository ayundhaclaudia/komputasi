<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BillReminderMail extends Mailable
{
    public $bill;

    public function __construct($bill)
    {
        $this->bill = $bill;
    }

    public function build()
    {
        return $this->subject('⏰ Reminder Tagihan - BillRemind')
            ->view('emails.bill-reminder');
    }
}
