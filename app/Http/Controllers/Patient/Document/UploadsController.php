<?php

namespace App\Http\Controllers\Patient\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
    public function index(){

        return view('patient.documents.uploads');
    }
}
