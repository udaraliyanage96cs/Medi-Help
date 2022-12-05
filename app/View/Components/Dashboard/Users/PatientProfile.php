<?php

namespace App\View\Components\Dashboard\Users;

use Illuminate\View\Component;
use App\Models\User;
use App\Models\Patient;
use App\Models\Ticket;
use Carbon\Carbon;
use App\Models\Report;

class PatientProfile extends Component
{
    public $patientId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($patientId)
    {
        $this->patientId = $patientId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $ticket = Ticket::join('channels','channels.id','=','tickets.channel_id')
        ->join('users','users.id','=','channels.doc_id')
        // ->join('recipts','recipts.ticket_id','=','tickets.id')
        ->where('tickets.patient_id', $this->patientId)->orderBy('channels.date', 'desc')->get(['tickets.*','channels.*','users.name as uname','tickets.id as tid']);


        $patient = Patient::join('users','users.id','=','patients.user_id')->where('patients.id',$this->patientId)
        ->get(['patients.id','patients.user_id','patients.puid','patients.propic','users.name','users.email','patients.dob','patients.phone','patients.bloodgroup','patients.address',]);

        $dateOfBirth = $patient[0]->dob;
        $years = Carbon::parse($dateOfBirth)->age;

        return view('components.dashboard.users.patient-profile')->with("Patient",$patient)->with("tickets",$ticket)->with("age",$years)
        ->with("reports",Report::where("patient_id",$this->patientId)->orderBy("created_at","DESC")->get());
    }
}
