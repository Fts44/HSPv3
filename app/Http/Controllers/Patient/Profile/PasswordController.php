<?php

namespace App\Http\Controllers\Patient\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function index(){


        return view('patient.profile.password');
    }
}
