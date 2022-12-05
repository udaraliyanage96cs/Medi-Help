<?php

namespace App\View\Components\Dashboard\Channel;

use Illuminate\View\Component;
use App\Models\Channel;
use App\Models\Ticket;
use Auth;

class Channeling extends Component
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
        $todayChannel = Channel::where('date',$today)->where('doc_id',Auth::user()->id)->get()->first();
        if( $todayChannel != null){
            $todayTickets = Ticket::where('channel_id',$todayChannel->id)->get();
            return view('components.dashboard.channel.channeling')
            ->with('todayChannel',$todayChannel)
            ->with('todayTickets',$todayTickets)
            ->with("channels",Channel::where('doc_id',Auth::user()->id)->orderBy('date', 'desc')->skip(1)->take(7)->get());
        }else{
            return view('components.dashboard.channel.channeling')->with("channels",Channel::where('doc_id',Auth::user()->id)->orderBy('date', 'desc')->skip(1)->take(7)->get());
        }
      
    }
}
