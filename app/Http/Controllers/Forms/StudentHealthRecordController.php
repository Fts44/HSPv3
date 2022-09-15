<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentHealthRecordController extends Controller
{
    public function insert(Request $request){

        return redirect()->back()
                ->withErrors([
                    'shr_srcode' => 'test'
                ])
                ->withInput($request->all());
    }
}
