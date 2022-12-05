<?php

namespace App\View\Components\Dashboard\Recipts;

use Illuminate\View\Component;
use App\Models\Recipt;
use App\Models\Ticket;

class ReciptsView extends Component
{
    public $channelID;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($channelID)
    {
        $this->channelID = $channelID;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $recipts = Recipt::join('users','users.id','=','recipts.user_id')
        ->join('channels','channels.id','=','recipts.channel_id')
        ->where("channel_id",$this->channelID)->orderBy('recipts.status', 'DESC')->orderBy('recipts.ticket_id', 'ASC')->get(['users.*','recipts.*','recipts.id as rid','channels.name as cname']);
        return view('components.dashboard.recipts.recipts-view')->with("recipts",$recipts )->with("channelID",$this->channelID );
    }
}
