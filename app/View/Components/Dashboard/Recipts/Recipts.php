<?php

namespace App\View\Components\Dashboard\Recipts;

use Illuminate\View\Component;
use App\Models\Channel;
use App\Models\Ticket;
use Auth;


class Recipts extends Component
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
            $channels = Channel::where('date',$today)->where('doc_id',Auth::user()->id)->get();
        }else{
            $channels = Channel::where('date',$today)->get();
        }
        return view('components.dashboard.recipts.recipts')->with("channels",$channels);
    }
}
