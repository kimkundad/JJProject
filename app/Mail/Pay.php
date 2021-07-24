<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Pay extends Mailable
{
    use Queueable, SerializesModels;

    public $data_toview;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data_toview)
    {
        //
        $this->data_toview = $data_toview;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('คำสั่งซื้อสินค้า รอการยืนยันการชำระเงิน Teeneejj')
                    ->view('mail.payment');
    }
}
