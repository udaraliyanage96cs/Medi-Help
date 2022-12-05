<?php

namespace App\View\Components\Dashboard\Users;

use Illuminate\View\Component;
use App\Models\Patient;

class Patientadd extends Component
{
    public $type;
    public $patientId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$patientId)
    {
        $this->type = $type;
        if($this->type != "add"){
            $this->patientId = $patientId;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if($this->type != "add"){
            $patients = Patient::join('users','users.id','=','patients.user_id')
            ->where('patients.id',$this->patientId)
            ->get(['patients.id','patients.puid','users.name','users.email','patients.address','patients.dob','patients.phone','patients.bloodgroup',
            'patients.created_at','patients.propic','patients.user_id','patients.nic']);
            return view('components.dashboard.users.patient-add')->with("user",$patients);
        }else{
            $lastPatient = Patient::latest()->first();
            $newPUID = 100000;
            if($lastPatient){
                $newPUID += $lastPatient->id;
            }
            return view('components.dashboard.users.patient-add')->with("newPUID", $newPUID);
        }
    }
}
