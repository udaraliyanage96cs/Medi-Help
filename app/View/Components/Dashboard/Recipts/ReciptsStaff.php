<?php

namespace App\View\Components\Dashboard\Recipts;

use Illuminate\View\Component;
use App\Models\Recipt;


class ReciptsStaff extends Component
{
    public $reciptID;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($reciptID)
    {
        $this->reciptID = $reciptID;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $recipt = Recipt::join('users','users.id','=','recipts.user_id')
        ->join('patients','patients.id','=','recipts.patient_id')
        ->where("recipts.id",$this->reciptID)->get(['recipts.*','recipts.id as rid','users.name as uname','patients.*']);
        
        return view('components.dashboard.recipts.recipts-staff')->with("recipts",$recipt);
    }
}
