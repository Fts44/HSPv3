<?php

namespace App\View\Components;

use Illuminate\View\Component;

class student_health_record extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $patient_details;

    public function __construct($patient_details)
    {
        $this->patient_details = $patient_details;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.student_health_record');
    }
}
