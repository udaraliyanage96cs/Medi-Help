<?php

namespace App\View\Components\Dashboard\Channel;

use Illuminate\View\Component;
use App\Models\Channel;
use App\Models\Ticket;
use Auth;

class ChannelView extends Component
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
        $channelwithPatients = Ticket::join('users','users.id','=','tickets.user_id')->where('channel_id',$this->channelID)->orderBy('tickets.status', 'ASC')->get(['users.*','tickets.*','tickets.id as tid']);
        return view('components.dashboard.channel.channel-view')->with("channel",Channel::find($this->channelID))->with("tickets",$channelwithPatients);
    }
}
