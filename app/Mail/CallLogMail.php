<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallLogMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $concentForm;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $concentForm)
    {
        $this->data = $data;
        $this->concentForm = $concentForm;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('New Call Log Entry')->view('admin.emails.call_log')->with('data', $this->data);
    }
}
