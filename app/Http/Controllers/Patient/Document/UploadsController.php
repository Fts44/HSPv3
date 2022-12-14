<?php

namespace App\Http\Controllers\Patient\Document;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UploadsController extends Controller
{
    public function index(){
        $document_type = DB::table('document_type')
            ->where('dt_id', '>', '2')
            ->get();
        $uploads = DB::table('patient_document as pd')
        ->leftjoin('document_type as dt', 'pd.dt_id', 'dt.dt_id')
        ->where('acc_id', Session::get('user_id'))
        ->where('dt.dt_id', '>', '2')
        ->get();
        // echo json_encode($document_type);
        return view('patient.documents.uploads')
            ->with([
                'document_type' => $document_type,
                'uploads' => $uploads
            ]);
    }

    public function upload(Request $request){

        $rules = [
            'document_type' => ['required'],
            'file' => ['required','max:5000','mimes:jpg,pdf']
        ];

        $message = [
            'document_type.required' => 'Document type is required.',
            'file.required' => 'File is required.'
        ];

        $validator = Validator::make( $request->all(), $rules);

        if($validator->fails()){
            $response = [
                'title' => 'Failed!',
                'message' => 'Invalid data, File not uploaded.',
                'icon' => 'error',
                'status' => 400
            ];
            return redirect()->back()->with('status',$response)->withErrors($validator)->withInput($request->all());
        }
        else{
            if($request->file('file')->isValid()){
                $id = Session::get('user_id');
                $path = '/public/documents/'.$request->document_type;
                $file = $request->file('file');
                $file_name = time().'_'.$request->document_type.'_'.$id.'.'.$file->extension();
                $upload = $file->storeAs($path, $file_name);

                DB::table('patient_document')->insert([
                    'dt_id' => $request->document_type,
                    'pd_filename' => $request->file('file')->getClientOriginalName(),
                    'pd_sys_filename' => $file_name,
                    'acc_id' => $id
                ]);

                $response = [
                    'title' => 'Succes!',
                    'message' => 'Document uploaded.',
                    'icon' => 'success',
                    'status' => 200
                ];
                $response = json_encode($response);
                return redirect()->back()->with('status',$response);
            }
        }    
    }
}
