<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeaponRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $filePath, $senderEmail,$qrPath;

    public function __construct($filePath, $senderEmail,$qrPath)
    {
        $this->filePath = $filePath;
        $this->senderEmail = $senderEmail;
        $this->qrPath = $qrPath;
    }

    public function build()
    {
        return $this->subject('Weapon Request')
            ->from(env('GENERAL_MAIL_USERNAME'), 'General User')
            ->replyTo($this->senderEmail)
            ->attach($this->filePath)
            ->view('emails.weapon-request')->with([
                'senderName' => $this->senderEmail,
                'qrImage' => $this->qrPath,
            ]);
    }


    
}
