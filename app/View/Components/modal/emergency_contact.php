<?php

namespace App\View\Components\modal;

use Illuminate\View\Component;

class emergency_contact extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($patientDetails)
    {
        $this->patientDetails = $patientDetails;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal.emergency_contact');
    }
}
