<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Transaction\AttendanceCodeController as AttendanceCodeController;

class TodayController extends Controller
{
    public function index(){
        $AttendanceCode = new AttendanceCodeController;
        $todays_attendance_code = $AttendanceCode->get_todays_code();
        
        return view('admin.transaction.today')
            ->with([
                'todays_code' => $todays_attendance_code
            ]);
    }
}
