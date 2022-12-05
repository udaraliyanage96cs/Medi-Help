<?php

namespace App\View\Components\Dashboard\Navigation;

use Illuminate\View\Component;

class Sidebar extends Component
{
    public $page;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page)
    {
        $this->page =  $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.navigation.sidebar')->with("page",$this->page);
    }
}
