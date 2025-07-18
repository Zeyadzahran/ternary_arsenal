<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class CheckoutEmail extends Mailable
{
    public $checkoutUrl, $qrPath;

    public function __construct($checkoutUrl, $qrPath)
    {
        $this->checkoutUrl = $checkoutUrl;
        $this->qrPath = $qrPath;
    }

    public function build()
    {
        return $this->subject('Confirm Your Checkout')
            ->view('emails.checkout')
            ->with([
            'checkoutUrl ' => $this->checkoutUrl,
            'qrImage' => $this->qrPath,
            ]);
          
    }
}
