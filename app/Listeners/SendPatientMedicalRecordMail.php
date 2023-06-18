<?php

namespace App\Listeners;

use App\Events\PatientMedicalRecordEvent;
use App\Mail\PatientMedicalRecordMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;

class SendPatientMedicalRecordMail implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PatientMedicalRecordEvent $event): void
    {
       Mail::to('peopleoperations@kompletecare.com')->send(new PatientMedicalRecordMail($event->patient_medical_record));
    }
}
