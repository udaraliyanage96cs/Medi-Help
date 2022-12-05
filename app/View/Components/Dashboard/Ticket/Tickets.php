<?php

namespace App\View\Components\Dashboard\Ticket;

use Illuminate\View\Component;
use App\Models\Patient;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Channel;
use Auth;

class Tickets extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $today = date('Y-m-d');
        if(Auth::user()->role == "doctor"){
            $ticket = Ticket::join('patients', 'patients.id', '=', 'tickets.patient_id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->join('channels', 'channels.id', '=', 'tickets.channel_id')
            ->where('tickets.bookindate',$today)
            ->where('channels.doc_id',Auth::user()->id)
            ->orderBy('tickets.position', 'ASC')
            ->get(['tickets.id as tid','tickets.position as position','tickets.status as status','patients.puid as puid','users.name as name','channels.name as cname']);
            $channels = Channel::where('date', $today )->where('doc_id', Auth::user()->id )->get();
        }else{
            $ticket = Ticket::join('patients', 'patients.id', '=', 'tickets.patient_id')
            ->join('users', 'users.id', '=', 'tickets.user_id')
            ->join('channels', 'channels.id', '=', 'tickets.channel_id')
            ->where('tickets.bookindate',$today)
            ->orderBy('tickets.position', 'ASC')
            ->get(['tickets.id as tid','tickets.position as position','tickets.status as status','patients.puid as puid','users.name as name','channels.name as cname']);
            $channels = Channel::where('date', $today )->get();

        }
        
        $Patients = Patient::join('users', 'users.id', '=', 'patients.user_id')->orderBy('patients.id', 'DESC')
        ->get(['users.id as uid', 'users.name as name','users.email as email','patients.dob as dob',
        'patients.phone as phone','patients.bloodgroup as bloodgroup','patients.puid as puid','patients.id as pid','patients.nic']);


        return view('components.dashboard.ticket.tickets')->with("Patients",$Patients)->with("tickets",$ticket)->with("channels",$channels);
    }
}
