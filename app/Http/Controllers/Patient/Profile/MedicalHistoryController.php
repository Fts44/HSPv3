<?php

namespace App\Http\Controllers\Patient\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{
    public function index(){


        return view('patient.profile.medicalhistory');
    }
}