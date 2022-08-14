<?php

namespace App\Http\Controllers\Patient\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\PopulateSelectController as PopulateSelect;
use App\Http\Controllers\OTPController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Rules\GsuiteRule;
use App\Rules\PasswordRule;

class ProfileController extends Controller
{
    public function index(){

        return view('patient.profile.profile');
    }
}
