<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CallLogConsentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        return $this->subject($subject)->view('admin.emails.call_log_concent_email')->with('data', $this->data);
    }
}
