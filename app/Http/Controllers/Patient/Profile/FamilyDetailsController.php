<?php

namespace App\Http\Controllers\Patient\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\RequiredIf;

class FamilyDetailsController extends Controller
{

    public function get_user_details(){
        $user_details = DB::table('accounts')->where('acc_id', Session::get('user_id'))->first();
        $family_details = DB::table('family_details')->where('fd_id', $user_details->fd_id)->first();
        return $family_details;
    }

    public function index(){

        echo json_encode($this->get_user_details());
        // return view('patient.profile.familydetails');
    }

    public function update_family_details(Request $request){

        $rules = [
            'father_firstname' => ['required'],
            'father_middlename' => ['nullable'],
            'father_lastname' => ['required'],
            'father_suffixname' => ['nullable'],
            'father_occupation' => ['required'],
            'mother_firstname' => ['required'],
            'mother_middlename' => ['nullable'],
            'mother_lastname' => ['required'],
            'mother_suffixname' => ['nullable'],
            'mother_occupation' => ['required'],
            'marital_satus' => ['required', 'in:married,separated,divorced'],
            'family_illness_history_diabetes' => ['required'],
            'family_illness_history_heart_disease' => ['required'],
            'family_illness_history_mental' => ['required'],
            'family_illness_history_cancer' => ['required'],
            'family_illness_history_hypertension' => ['required'],
            'family_illness_history_kidney_disease' => ['required'],
            'family_illness_history_kidney_epilepsy' => ['required'],
            'family_illness_history_others' => ['required'],
        ];

        $validator = validator::make($request->all(), $rules);

        if($validator->fails()){
            $response = [
                'title' => 'Failed!',
                'message' => 'Family details not updated.',
                'icon' => 'error',
                'status' => 400
            ];

            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all())
                ->with([
                    'status' => $response
                ]);
        }
        else{
            $user_details = $this->get_user_details();

            if($user_details->fd_id){

            }
            else{
                // $user_details->fd_id = DB::table('family_details')->insertGetId([
                //     fd_father_firstname
                //     fd_father_middlename
                //     fd_father_lastname
                //     fd_father_suffixname
                //     fd_father_occupation
                //     fd_mother_firstname
                //     fd_mother_middlename
                //     fd_mother_lastname
                //     fd_mother_suffixname
                //     fd_mother_occupation
                //     fd_marital_status

                // ]);
            }
        }

    }
}
