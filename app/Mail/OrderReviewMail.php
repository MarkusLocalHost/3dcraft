<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReviewMail extends Mailable
{
    use Queueable, SerializesModels;

    public $uuids;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($uuids)
    {
        $this->uuids = $uuids;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')->view('mail.order_review');
    }
}
