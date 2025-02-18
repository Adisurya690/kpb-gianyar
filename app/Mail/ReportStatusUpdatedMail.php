<?php

namespace App\Mail;

use App\Models\Lapor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportStatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $report;
    /**
     * Create a new message instance.
     */
    public function __construct(Lapor $report)
    {
        $this->report = $report;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Report Status Updated Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'emails.report_status_updated',
    //     );
    // }

    public function build()
    {
        return $this->subject('Perubahan Status Laporan Anda')
                    ->view('emails.report_status_updated')
                    ->with(['report' => $this->report]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
