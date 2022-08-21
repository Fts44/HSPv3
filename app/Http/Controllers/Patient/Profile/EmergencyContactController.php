<?php

namespace App\Http\Controllers\Patient\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EmergencyContactController extends Controller
{
    public function index(){

        return view('patient.profile.emergencycontact');
    }

    public function update_emergency_contact(Request $request){

        $rules = [
            'Father_firstname' => ['required']
        ];

        $validator = validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
    }
}
