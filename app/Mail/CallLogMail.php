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
        $spNumber = $this->data->building->sp_no ?? 'SPXXXXX';
        $buildingAddress = $this->data->building->address ?? 'Unknown Address';
        $siteHours = $this->data->building->site_hours ?? 'After Hours Call';
        $status = $this->data->status ?? 'No Status';

        $subject = "{$spNumber} – {$buildingAddress} – {$siteHours} – {$status}";
        return $this->subject($subject)->view('admin.emails.call_log')->with('data', $this->data);
    }
}
