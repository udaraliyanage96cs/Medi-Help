<?php

namespace App\View\Components\Dashboard\Navigation;

use Illuminate\View\Component;

class BreadcrumbsView extends Component
{
    public $page;
    public $type;
    public $channelID;
    public $reciptID;
    public $ticketID;
    public $patientId;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page,$type,$channelID,$reciptID,$ticketID,$patientId)
    {
        $this->page = $page;
        $this->type = $type;
        $this->channelID = $channelID;
        $this->reciptID = $reciptID;
        $this->ticketID = $ticketID;
        $this->patientId = $patientId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.navigation.breadcrumbs-view')->with("routeName",$this->page)
        ->with("type",$this->type)->with("channelID",$this->channelID)
        ->with("reciptID",$this->reciptID)->with("ticketID",$this->ticketID)->with("patientId",$this->patientId);
    }
}
