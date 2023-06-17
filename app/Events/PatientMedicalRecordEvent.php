<?php

namespace App\Events;

use App\Models\PatientMedicalRecord;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PatientMedicalRecordEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $patient_medical_record;

    /**
     * Create a new event instance.
     */
    public function __construct(PatientMedicalRecord $patientMedicalRecord)
    {
        $this->patient_medical_record = $patientMedicalRecord;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
