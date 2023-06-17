<?php

namespace App\Mail;

use App\Models\PatientMedicalRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PatientMedicalRecordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $patient_medical_record;

    /**
     * Create a new message instance.
     */
    public function __construct(PatientMedicalRecord $patientMedicalRecord)
    {
        $this->patient_medical_record = $patientMedicalRecord;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->patient_medical_record->patient_name." Medical Data",
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.patient_medical_record',
            with: [
                'patientMedicalRecord' => $this->patient_medical_record,
            ],
        );
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
