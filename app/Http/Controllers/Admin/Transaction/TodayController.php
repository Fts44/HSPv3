<?php

namespace App\Http\Controllers\Admin\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Transaction\AttendanceCodeController as AttendanceCodeController;

class TodayController extends Controller
{
    public function index(){
        $AttendanceCode = new AttendanceCodeController;
        $todays_attendance_code = $AttendanceCode->get_todays_code();
        
        $todays_trans = DB::table('transaction')
            ->where('trans_date', date('Y-m-d'))
            ->orderBy('trans_time_in', 'DESC')
            ->get();

        return view('admin.transaction.today')
            ->with([
                'todays_code' => $todays_attendance_code,
                'today_trans' => $todays_trans
            ]);
    }
}
