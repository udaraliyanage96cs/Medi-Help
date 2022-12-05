<?php

namespace App\View\Components\Dashboard\Reports;

use Illuminate\View\Component;
use App\Models\Report;

class ReportsAdd extends Component
{
    public $patientID;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($patientID)
    {
        $this->patientID = $patientID;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.reports.reports-add')->with("patientID",$this->patientID);
    }
}
