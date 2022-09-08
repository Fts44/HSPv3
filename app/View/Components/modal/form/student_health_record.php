<?php

namespace App\View\Components\modal\form;

use Illuminate\View\Component;

class student_health_record extends Component
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
        return view('components.modal.form.student_health_record');
    }
}
