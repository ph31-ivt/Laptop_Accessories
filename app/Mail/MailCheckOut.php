<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailCheckOut extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $orderdetail = [];
    public $product_od = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $orderdetail,$product_od)
    {
        $this->order = $order;
        $this->orderdetail = $orderdetail;
        $this->product_od = $product_od;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mailcheckout');
    }
}
