<?php

namespace App\View\Components\Dashboard\Users;

use Illuminate\View\Component;
use App\Models\User;

class Staffadd extends Component
{
    public $type;
    public $userId;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$userId)
    {
        $this->type = $type;
        if($this->type != "add"){
            $this->userId = $userId;
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
            return view('components.dashboard.users.staff-add')->with("user",User::find($this->userId));
        }else{
            return view('components.dashboard.users.staff-add');
        }
    }
}
