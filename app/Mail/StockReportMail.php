<?php

namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StockReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $filePath, $sender;

    public function __construct($filePath, $sender)
    {
        $this->filePath = $filePath;
        $this->sender = $sender;
    }

    public function build()
    {
        return $this->subject('Stockpile Report')
                    ->from(env('MAIL_FROM_ADDRESS'), 'Ternary Arsenal')
                    ->attach($this->filePath)
                    ->view('emails.stock-report', ['senderName' => $this->sender]);
    }
}
