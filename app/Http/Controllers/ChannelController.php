<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
use App\Models\Recipt;
use App\Models\Ticket;
use Auth;

class ChannelController extends Controller
{
    public function channels(Request $req){
        return view("dashboard")->with("page","Channels");
    }
    public function channelAddView(Request $req){
        return view("dashboard")->with("page","channelAddView")->with("channelID",-1)->with("type","edit");
    }
    public function channelAdd(Request $req){
        $channel = new Channel;
        $channel->doc_id = Auth::user()->id;
        $channel->name = $req->name;
        $channel->note = $req->note;
        $channel->time = $req->time;
        $channel->date = $req->date;
        $channel->vanue = $req->vanue;
        $channel->save();
        return redirect()->back()->withErrors(["success"]);
    }
    public function channelSingleView(Request $req){
        return view("dashboard")->with("page","channelSingleView")->with("channelID",$req->id);
    }
    public function reciptsAddView(Request $req){
        $ticket = Ticket::find($req->id);
        if($ticket->status != 2){
            $ticket->update([
                'status'=> 1,
            ]);
        }
       
        return view("dashboard")->with("page","reciptsAddView")->with("ticketID",$req->id)->with("type","add");
    }
    public function reciptsAdd(Request $req){

        $ticket = Ticket::find($req->id);

        $recipt = new Recipt;
        $recipt->reason = $req->reason;
        $recipt->content = $req->editor1;
        $recipt->patient_id = $ticket->patient_id;
        $recipt->user_id = $ticket->user_id;
        $recipt->ticket_id = $req->id;
        $recipt->channel_id = $ticket->channel_id;
        $recipt->save();
        $ticket->update([
            'status'=> 2,
        ]);
        return redirect()->back()->withErrors(["success"]);
    }

    public function channelEditView(Request $req){
        return view("dashboard")->with("page","channelEditView")->with("channelID",$req->id)->with("type","edit");
    }
    public function channelEdit(Request $req){

        $channel = Channel::find($req->id);
        $channel->update([
            "name" => $req->name,
            "note" => $req->note,
            "time" => $req->time,
            "date" => $req->date,
            "vanue" => $req->vanue,
        ]);
        return redirect()->back()->withErrors(["updated"]);
    }
    public function recipts(Request $req){
        return view("dashboard")->with("page","Recipts");
    }
    public static function getPatientCount($channel_id){
        $todayTickets = Ticket::where('channel_id',$channel_id)->get();
        return $todayTickets;
    }
    public function reciptsView(Request $req){
        return view("dashboard")->with("page","reciptsView")->with("channelID",$req->id);
    }
    public function reciptsFilter(Request $req){
        $date = $req->date;
        if(Auth::user()->role == "doctor"){
            $channels = Channel::where('date',$date)->where('doc_id',Auth::user()->id)->get();
        }else{
            $channels = Channel::where('date',$date)->get();
        }
        return response()->json(['items'=>$channels]);
    }
    public function reciptsStaff(Request $req){
        return view("dashboard")->with("page","reciptsStaff")->with("reciptID",$req->id);
    }
    public function reciptsStaffAdd(Request $req){
        $recipt = Recipt::find($req->id);
        $recipt->update([
            "staff_note" => $req->note,
            "price" => $req->price,
            "status" => "Closed",
        ]);
        $url = '/'.Auth::user()->role.'/recipts/view/'.$recipt->channel_id;
        return redirect($url);
        //return redirect()->back()->withErrors(["success"]);
    }
    public function reciptsEditView(Request $req){
        return view("dashboard")->with("page","reciptsEditView")->with("ticketID",$req->id)->with("type","edit");
    }
    public function reciptsEdit(Request $req){
        $recipt = Recipt::find($req->id);
        $recipt->update([
            "reason" => $req->reason,
            "content" => $req->editor1,
        ]);
        return redirect()->back()->withErrors(["success"]);
    }
    
 
    
}
