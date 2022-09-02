<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Documents extends Controller
{
    public function view($pd_id){

        $doc_details = DB::table('patient_document')->where('pd_id',$pd_id)->first();

        if(str_contains($doc_details->file_name,'.pdf')){
            return view('ViewPDF', compact('doc_details'));
        }
        else{
            return view('ViewImage', compact('doc_details'));
        }
    }
}
