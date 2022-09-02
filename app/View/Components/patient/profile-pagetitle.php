<?php

namespace App\View\Components\patient;

use Illuminate\View\Component;

class profile-pagetitle extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($activeTitle)
    {
        $this->activeTitle = $activeTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.patient.profile-pagetitle');
    }
}
