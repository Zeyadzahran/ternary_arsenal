<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StockReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public $filePath, $sender, $qrPath;

    public function __construct($filePath, $sender, $qrPath)
    {
        $this->filePath = $filePath;
        $this->sender = $sender;
        $this->qrPath = $qrPath;
    }

    public function build()
    {
        return $this->subject('Stockpile Report')
            ->from(env('MAIL_FROM_ADDRESS'), 'Ternary Arsenal')
            ->attach($this->filePath)
            ->view('emails.stock-report')
            ->with([
                'senderName' => $this->sender,
                'qrImage' => $this->qrPath,
            ]);
    }
}