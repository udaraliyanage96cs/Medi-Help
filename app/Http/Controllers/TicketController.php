<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Ticket;
use App\Models\Channel;
use App\Models\Recipt;

class TicketController extends Controller
{
    public function ticket(Request $req){
        return view("dashboard")->with("page","Ticket");
    }
    public function ticketAdd(Request $req){
       
        // $patient = Patient::find($req->id);
        // $today = date('Y-m-d');

        // if (Ticket::where('bookindate', '=', $today)->exists()) {
        //     $oldticket = Ticket::all()->where("bookindate",$today)->sortDesc()->first();
        //     $current_position = $oldticket->position;
        //     $new_position = $current_position+1;

        //     if (Ticket::where('patient_id', '=', $req->id)->where('bookindate', '=', $today)->exists() ) {
        //         return redirect()->back()->withErrors(["0"]);
        //     }else{
        //         $ticket = new Ticket;
        //         $ticket->position = $new_position;
        //         $ticket->bookindate = $today;
        //         $ticket->user_id = $patient->user_id;
        //         $ticket->patient_id = $req->id;
        //         $ticket->save();
        //         return redirect()->back()->withErrors(["1"]);
        //     }
        // }else{
        //     $ticket = new Ticket;
        //     $ticket->position = 1;
        //     $ticket->bookindate = $today;
        //     $ticket->user_id = $patient->user_id;
        //     $ticket->patient_id = $req->id;
        //     $ticket->save();
        //     return redirect()->back()->withErrors(["1"]);
        // }
    }
    public function channels(Request $req){
        $channels = Channel::where('date',$req->date)->get();
        return response()->json(['item'=>$channels]);
    }
    public function ticketAddAJAX(Request $req){

        $patient = Patient::where("puid",$req->puid)->first();
        $today = $req->selectDate;
        $channel_id = $req->channel;
        //return response()->json(['item'=>$patient]);
        if (Ticket::where('bookindate', '=', $today)->where('channel_id', '=', $channel_id)->exists()) {
            $oldticket = Ticket::all()->where("bookindate",$today)->where('channel_id', '=', $channel_id)->sortDesc()->first();
            $current_position = $oldticket->position;
            $new_position = $current_position+1;
            
            if (Ticket::where('patient_id', '=', $patient->id)->where('bookindate', '=', $today)->where('channel_id', '=', $channel_id)->exists() ) {
                return response()->json(['item'=>-1]);
            }else{
                $ticket = new Ticket;
                $ticket->position = $new_position;
                $ticket->bookindate = $today;
                $ticket->user_id = $patient->user_id;
                $ticket->patient_id = $patient->id;
                $ticket->channel_id = $channel_id;
                $ticket->save();
                return response()->json(['item'=>"Succesfully Booked A"]);
            }
        }else{
            $ticket = new Ticket;
            $ticket->position = 1;
            $ticket->bookindate = $today;
            $ticket->user_id = $patient->user_id;
            $ticket->patient_id = $patient->id;
            $ticket->channel_id = $channel_id;
            $ticket->save();
            return response()->json(['item'=>"Succesfully Booked"]);
        }
    }
    public function getspecific(Request $req){
        $tickets = Ticket::join('patients', 'patients.id', '=', 'tickets.patient_id')
        ->join('channels', 'channels.id', '=', 'tickets.channel_id')
        ->join('users', 'users.id', '=', 'tickets.user_id')->where('tickets.bookindate',$req->date)->orderBy('tickets.position', 'ASC')
        ->get(['tickets.id as tid','tickets.position as position','tickets.status as status','patients.puid as puid','users.name as name','channels.name as cname']);
        return response()->json(['item'=>$tickets]);
    }
    
    public static function getRecipt($ticket_id){
        $recipt = Recipt::where('ticket_id',$ticket_id)->first();
        return $recipt;
    }
    
    
}
