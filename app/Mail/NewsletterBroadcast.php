<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class NewsletterBroadcast extends Mailable
{
    public $subjectText;
    public $messageText;

    public function __construct($subject, $message)
    {
        $this->subjectText = $subject;
        $this->messageText = $message;
    }

    public function build()
    {
        return $this->subject($this->subjectText)
                    ->view('emails.newsletter')
                    ->with([
                        'content' => $this->messageText,
                    ]);
    }
}
