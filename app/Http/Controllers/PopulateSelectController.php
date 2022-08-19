<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PopulateSelectController extends Controller
{
    public function province(){
        $provinces = DB::table('province')
        ->orderBy('prov_name','ASC')
        ->get();
        return $provinces;
    }

    public function municipality($prov_code){     
        if($prov_code == 'all'){
            $municipalities = DB::table('municipality')
            ->orderBy('mun_name','ASC')
            ->get();
        }
        else{
            $municipalities = DB::table('municipality')
            ->where('prov_code','=',$prov_code)
            ->orderBy('mun_name','ASC')
            ->get();
        }
        return $municipalities;
    }

    public function barangay($mun_code){
        if($mun_code == 'all'){
            $barangays = DB::table('barangay')
            ->orderBy('brgy_name','ASC')
            ->get();
        }
        else{
            $barangays = DB::table('barangay')
            ->where('mun_code','=',$mun_code)
            ->orderBy('brgy_name','ASC')
            ->get();
        }
        return $barangays;
    }

    public function grade_level(){
        $grade_levels = DB::table('grade_level')
        ->get();

        return $grade_levels;
    }

    public function department($gl_id){
        $departments = DB::table('department')
        ->where('gl_id', $gl_id)
        ->orderBy('dept_code','ASC')
        ->get();

        return $departments;
    }

    public function program($dept_id){
        $programs = DB::table('program')
        ->orderBy('prog_code','ASC')
        ->where('dept_id', $dept_id)->get();

        return $programs;
    }

    // public function medicine_category(){
    //     $medicine_category = DB::table('medicine_category')
    //     ->orderBy('mc_name','ASC')
    //     ->get();

    //     return $medicine_category;
    // }

    // public function medicine_types(){
    //     $medicine_types = DB::table('medicine_types')
    //     ->orderBy('mt_name','ASC')
    //     ->get();

    //     return $medicine_types;
    // }

    // public function medicine_info(){
    //     $medicine_infos = DB::table('medicine_info as mi')
    //     ->select('mi.*', 'mc.mc_name', 'mt.mt_name')
    //     ->leftjoin('medicine_category as mc', 'mi.mc_id', 'mc.mc_id')
    //     ->leftjoin('medicine_types as mt', 'mi.mt_id', 'mt.mt_id')
    //     ->orderBy('mi.mi_name', 'ASC')
    //     ->get();

    //     return $medicine_infos;
    // }
}
