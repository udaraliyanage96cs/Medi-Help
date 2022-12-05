<?php

namespace App\View\Components\Dashboard\Channel;

use Illuminate\View\Component;
use App\Models\Channel;

class ChannelAdd extends Component
{
    public $type;
    public $channelID;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct( $type,$channelID)
    {
        $this->type = $type;
        if($this->type != "add"){
            $this->channelID = $channelID;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->type == "add"){
            return view('components.dashboard.channel.channel-add');
        }else{
            $channel = Channel::find($this->channelID);
            return view('components.dashboard.channel.channel-add')->with("channel",$channel);
        }
    }
}
