<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WeaponRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $filePath, $senderEmail;

    public function __construct($filePath, $senderEmail)
    {
        $this->filePath = $filePath;
        $this->senderEmail = $senderEmail;
    }

    public function build()
    {
        return $this->subject('Weapon Request')
            ->from(env('GENERAL_MAIL_USERNAME'), 'General User')
            ->replyTo($this->senderEmail)
            ->attach($this->filePath)
            ->view('emails.weapon-request', ['senderEmail' => $this->senderEmail]);
    }


    
}
