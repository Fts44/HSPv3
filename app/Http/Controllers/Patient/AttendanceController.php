<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    public function index(){
        $all_attendance = DB::table('transaction')
            ->where('acc_id', Session::get('user_id'))
            ->orderBy('trans_date', 'DESC')
            ->orderBy('trans_time_in', 'DESC')
            ->get();

        return view('patient.attendance')->with([
            'all_attendance' => $all_attendance
        ]);
    }

    public function insert(Request $request){
        $rules = [
            'date' => ['required'],
            'code' => ['required'],
            'purpose' => ['required'],
            'specify_purpose' => ['required_if:purpose,==,Others']
        ];

        $messages = [
            'specify_purpose.required_if' => 'The purpose field is required.'
        ];

        $validator = validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{

            // check if code match the date and if the status is open
            $ac_details = DB::table('attendance_code')
                ->where('ac_date', date_format(date_create($request->date),'Y-m-d'))
                ->where('ac_code', $request->code)
                ->first();
            if(!$ac_details){
                return redirect()->back()
                ->withErrors([
                    'code' => 'The code is invalid.'
                ])
                ->withInput($request->all());
            }
            else{
                
                if(!$ac_details->ac_status){
                    $response = [
                        'title' => 'Failed!',
                        'message' => 'Attendance for the date you entered is close.',
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
                    $user_details = DB::table('accounts as acc')
                        ->select('acc.*', 'prog.*', 'dept.*')
                        ->leftjoin('program as prog', 'acc.prog_id', 'prog.prog_id')
                        ->leftjoin('department as dept', 'acc.dept_id', 'dept.dept_id')
                        ->where('acc_id', Session::get('user_id'))
                        ->first();
                    
                    if($user_details){
                        DB::table('transaction')->insert([
                            'trans_date' => $request->date,
                            'trans_patient_name' => $user_details->firstname." ".(($user_details->middlename) ? $user_details->middlename[0].". " : '').$user_details->lastname,
                            'trans_department' => (($user_details->dept_code) ? $user_details->dept_code : '' ),
                            'trans_srcode' => (($user_details->sr_code) ? $user_details->sr_code : '' ),
                            'trans_program' => (($user_details->prog_code) ? $user_details->prog_code : '' ),
                            'trans_classification' => $user_details->classification,
                            'trans_purpose' => $request->purpose,
                            'acc_id' => Session::get('user_id')
                        ]);
                    }
                    
                }

            }
        }
    }
}
