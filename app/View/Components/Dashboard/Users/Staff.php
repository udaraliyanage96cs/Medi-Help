<?php

namespace App\View\Components\Dashboard\Users;

use Illuminate\View\Component;
use App\Models\User;

class Staff extends Component
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
        return view('components.dashboard.users.staff')->with("users",User::where("role","!=","patient")->get());
    }
}
