<?php

namespace App\View\Components\Dashboard\Users;

use Illuminate\View\Component;
use App\Models\User;
use App\Models\Patient;

class Patients extends Component
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
        

        $patients = Patient::join('users','users.id','=','patients.user_id')
        ->get(['patients.id','patients.puid','users.name','users.email','patients.dob','patients.phone','patients.bloodgroup','patients.created_at','patients.nic']);
        return view('components.dashboard.users.patients')->with("patients",$patients);
    }
}
