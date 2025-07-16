<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GeneralReport extends Mailable
{
    use Queueable, SerializesModels;

    

    public $filePath;
    public $senderName;

    public function __construct($filePath, $senderName = 'Ternary Arsenal')
    {
        $this->filePath = $filePath;
        $this->senderName = $senderName;
    }

    public function build()
    {
        return $this->subject('Your Requested Report')
                    ->view('mail.general-report')
                    ->with(['senderName' => $this->senderName])
                    ->attach($this->filePath, [
                        'as' => basename($this->filePath),
                        'mime' => 'text/csv',
                    ]);
    }


}
