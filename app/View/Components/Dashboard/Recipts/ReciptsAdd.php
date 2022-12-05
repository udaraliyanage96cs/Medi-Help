<?php

namespace App\View\Components\Dashboard\Recipts;

use Illuminate\View\Component;
use App\Models\User;
use App\Models\Patient;
use App\Models\Ticket;
use App\Models\Recipt;
use App\Models\Report;
use Carbon\Carbon;


class ReciptsAdd extends Component
{
    public $ticketID;
    public $type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ticketID,$type)
    {
        $this->ticketID = $ticketID;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $thisTicket = Ticket::find($this->ticketID);

        $ticket = Ticket::join('channels','channels.id','=','tickets.channel_id')
        ->join('users','users.id','=','channels.doc_id')
        ->where('tickets.patient_id', $thisTicket->patient_id)->orderBy('date', 'desc')->get(['tickets.*','channels.*','users.name as uname','tickets.id as tid']);


        $patient = Patient::join('users','users.id','=','patients.user_id')->where('patients.id',$thisTicket->patient_id)
        ->get(['patients.id','patients.user_id','patients.puid','patients.propic','users.name','users.email','patients.dob','patients.phone','patients.bloodgroup','patients.address',]);

        $dateOfBirth = $patient[0]->dob;
        $years = Carbon::parse($dateOfBirth)->age;

        $reciptCH = Recipt::where('ticket_id',$this->ticketID)->first();

        return view('components.dashboard.recipts.recipts-add')->with("Patient",$patient)->with("tickets",$ticket)->with("age",$years)
        ->with("ticketID", $this->ticketID)->with("reciptCH",$reciptCH)->with("reports",Report::where("patient_id",$thisTicket->patient_id)->orderBy("created_at","DESC")->get());

        
    }
}
