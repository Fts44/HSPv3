<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $registered_patient = DB::table('accounts')->where('position','patient')->count();
        $registered_employee = DB::table('accounts')->where('position','employee')->count();

        $total_equipments = DB::table('inventory_equipment_item')->count();

        return view('admin.dashboard')
            ->with([
                'registered_patient' => $registered_patient,
                'registered_employee' => $registered_employee,
                'total_equipments' => $total_equipments
            ]);
    }
}
