<?php

namespace App\Http\Controllers\Admin\Configuration\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class EquipmentController extends Controller
{
//item 
    public function index_item(){
        $ieid_details = DB::table('inventory_equipment_item_details as ieid')
            ->select('ieid.*', 'ien.*', 'iet.*', 'ieb.*')
            ->leftjoin('inventory_equipment_name as ien', 'ieid.ien_id', 'ien.ien_id')
            ->leftjoin('inventory_equipment_type as iet', 'ieid.iet_id', 'iet.iet_id')
            ->leftjoin('inventory_equipment_brand as ieb', 'ieid.ieb_id', 'ieb.ieb_id')
            ->get();
        $ien_names = DB::table('inventory_equipment_name')->orderBy('ien_name', 'ASC')->get();
        $iet_types = DB::table('inventory_equipment_type')->orderBy('iet_type', 'ASC')->get();
        $ieb_brands = DB::table('inventory_equipment_brand')->orderBy('ieb_brand', 'ASC')->get();
        $iep_places = DB::table('inventory_equipment_place')->orderBy('iep_place', 'ASC')->get();

        return view('admin.configuration.inventory.equipment.item')
            ->with([
                'ieid_details' => $ieid_details,
                'ien_names' => $ien_names,
                'iet_types' => $iet_types,
                'ieb_brands' => $ieb_brands,
                'iep_places' => $iep_places
            ]);
    }

    public function insert_item(Request $request){
        $rules = [
            'name' => ['required'],
            'unit' => ['required'],
            'type' => ['required'],
            'brand' => ['required'],
            'category' => ['required'],
            'status' => ['required']
        ];

        $validator = validator::make($request->all(), $rules);

        if($validator->fails()){
            $response = [
                'title' => 'Success!',
                'message' => 'Equipment item not added.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Add'
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{

            try{    
                DB::table('inventory_equipment_item_details')->insert([
                    'ieid_unit' => $request->unit,
                    'ieid_category' => $request->category,
                    'ieid_status' => $request->status,
                    'ien_id' => $request->name,
                    'ieb_id' => $request->brand,
                    'iet_id' => $request->type
                ]);

                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment item details added.',
                    'icon' => 'success',
                    'status' => 200,
                    'action' => 'Add'
                ];    
                return redirect(route('AdminConfigurationEquipmentItem'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Error!',
                    'message' => 'Equipment item details not added.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'Add'
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function update_item(Request $request, $id){
        $rules = [
            'name' => ['required'],
            'unit' => ['required'],
            'type' => ['required'],
            'brand' => ['required'],
            'category' => ['required'],
            'status' => ['required']
        ];

        $validator = validator::make($request->all(), $rules);

        if($validator->fails()){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment item not updated.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Update',
                'ieid_id' => $id
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            try{
                DB::table('inventory_equipment_item_details')->where('ieid_id', $id)->update([
                    'ieid_unit' => $request->unit,
                    'ieid_category' => $request->category,
                    'ieid_status' => $request->status,
                    'ien_id' => $request->name,
                    'ieb_id' => $request->brand,
                    'iet_id' => $request->type
                ]);

                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment item details updated.',
                    'icon' => 'success',
                    'status' => 200,
                    'action' => 'Update'
                ];    
                return redirect(route('AdminConfigurationEquipmentItem'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Error!',
                    'message' => 'Equipment item details not updated.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'update',
                    'ieid_id' => $id
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }
//item
//Name
    public function index_name(){
        $ie_names = DB::table('inventory_equipment_name')->get();
        
        return view('admin.configuration.inventory.equipment.name')->with([
            'ie_names' => $ie_names
        ]);
    }

    public function insert_name(Request $request){

        // echo json_encode($request->all());

        $rules = [
            'name' => ['required', 'unique:inventory_equipment_name,ien_name'],
            'status' => ['required', 'in:0,1']
        ];
        
        $validator = validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $response = [
                'title' => 'Success!',
                'message' => 'Equipment name not added.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Add'
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            try{
                DB::table('inventory_equipment_name')->insert([
                    'ien_name' => $request->name,
                    'ien_status' => $request->status 
                ]);

                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment name added',
                    'icon' => 'success',
                    'status' => 200
                ];

                return redirect(route('AdminConfigurationEquipmentName'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment name not added.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'Add'
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function update_name(Request $request, $id){
        $rules = [
            'name' => ['required', 'unique:inventory_equipment_name,ien_name,'.$id.',ien_id'],
            'status' => ['required', 'in:0,1']
        ];
        
        $validator = validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment name not updated.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Update',
                'ien_id' => $id
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            try{
                DB::table('inventory_equipment_name')->where('ien_id', $id)->update([
                    'ien_name' => $request->name,
                    'ien_status' => $request->status 
                ]);
    
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment name updated',
                    'icon' => 'success',
                    'status' => 200
                ];
    
                return redirect(route('AdminConfigurationEquipmentName'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment name not updated.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'Add'
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function delete_name($id){
        try{
            DB::table('inventory_equipment_name')->where('ien_id', $id)->delete();

            $response = [
                'title' => 'Success!',
                'message' => 'Equipment name deleted',
                'icon' => 'success',
                'status' => 200
            ];

            return redirect(route('AdminConfigurationEquipmentName'))->with('status', $response);
        }
        catch(Exception $e){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment name not deleted'.$e,
                'icon' => 'error',
                'status' => 400
            ];

            return redirect(route('AdminConfigurationEquipmentName'))->with('status', $response);
        }
    }
//Name

//Brand
    public function index_brand(){
        $ie_brands = DB::table('inventory_equipment_brand')->get();

        return view('admin.configuration.inventory.equipment.brand')->with([
            'ie_brands' => $ie_brands
        ]);
    }

    public function insert_brand(Request $request){

        // echo json_encode($request->all());

        $rules = [
            'brand' => ['required', 'unique:inventory_equipment_brand,ieb_brand'],
            'status' => ['required', 'in:0,1']
        ];
        
        $validator = validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $response = [
                'title' => 'Success!',
                'message' => 'Equipment brand not added.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Add'
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            try{
                DB::table('inventory_equipment_brand')->insert([
                    'ieb_brand' => $request->brand,
                    'ieb_status' => $request->status 
                ]);

                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment brand added',
                    'icon' => 'success',
                    'status' => 200
                ];

                return redirect(route('AdminConfigurationEquipmentBrand'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment brand not added.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'Add'
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function update_brand(Request $request, $id){
        $rules = [
            'brand' => ['required', 'unique:inventory_equipment_brand,ieb_brand,'.$id.',ieb_id'],
            'status' => ['required', 'in:0,1']
        ];
        
        $validator = validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment name not updated.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Update',
                'ien_id' => $id
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            try{
                DB::table('inventory_equipment_brand')->where('ieb_id', $id)->update([
                    'ieb_brand' => $request->brand,
                    'ieb_status' => $request->status 
                ]);

                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment Brand updated',
                    'icon' => 'success',
                    'status' => 200
                ];

                return redirect(route('AdminConfigurationEquipmentBrand'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment brand not updated.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'Add'
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function delete_brand($id){
        try{
            DB::table('inventory_equipment_brand')->where('ieb_id', $id)->delete();

            $response = [
                'title' => 'Success!',
                'message' => 'Equipment brand deleted',
                'icon' => 'success',
                'status' => 200
            ];

            return redirect(route('AdminConfigurationEquipmentBrand'))->with('status', $response);
        }
        catch(Exception $e){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment brand not deleted'.$e,
                'icon' => 'error',
                'status' => 400
            ];

            return redirect(route('AdminConfigurationEquipmentBrand'))->with('status', $response);
        }
    }
//Brand

//Type
    public function index_type(){
        $ie_types = DB::table('inventory_equipment_type')->get();

        return view('admin.configuration.inventory.equipment.type')->with([
            'ie_types' => $ie_types
        ]);
    }

    public function insert_type(Request $request){

        // echo json_encode($request->all());

        $rules = [
            'type' => ['required', 'unique:inventory_equipment_type,iet_type'],
            'status' => ['required', 'in:0,1']
        ];
        
        $validator = validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $response = [
                'title' => 'Success!',
                'message' => 'Equipment type not added.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Add'
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            try{
                DB::table('inventory_equipment_type')->insert([
                    'iet_type' => $request->type,
                    'iet_status' => $request->status 
                ]);

                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment type added',
                    'icon' => 'success',
                    'status' => 200
                ];

                return redirect(route('AdminConfigurationEquipmentType'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment type not added.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'Add'
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function update_type(Request $request, $id){
        $rules = [
            'type' => ['required', 'unique:inventory_equipment_type,iet_type,'.$id.',iet_id'],
            'status' => ['required', 'in:0,1']
        ];
        
        $validator = validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment type not updated.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Update',
                'iet_id' => $id
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            try{
                DB::table('inventory_equipment_type')->where('iet_id', $id)->update([
                    'iet_type' => $request->type,
                    'iet_status' => $request->status 
                ]);
    
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment type updated',
                    'icon' => 'success',
                    'status' => 200
                ];
    
                return redirect(route('AdminConfigurationEquipmentType'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment type not updated.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'Add'
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function delete_type($id){
        try{
            DB::table('inventory_equipment_type')->where('iet_id', $id)->delete();

            $response = [
                'title' => 'Success!',
                'message' => 'Equipment type deleted',
                'icon' => 'success',
                'status' => 200
            ];

            return redirect(route('AdminConfigurationEquipmentType'))->with('status', $response);
        }
        catch(Exception $e){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment type not deleted'.$e,
                'icon' => 'error',
                'status' => 400
            ];

            return redirect(route('AdminConfigurationEquipmentType'))->with('status', $response);
        }
    }
//Type

//place
    public function index_place(){
        $ie_places = DB::table('inventory_equipment_place')->get();

        return view('admin.configuration.inventory.equipment.place')->with([
            'ie_places' => $ie_places
        ]);
    }

    public function insert_place(Request $request){

        // echo json_encode($request->all());

        $rules = [
            'place' => ['required', 'unique:inventory_equipment_place,iep_place'],
            'status' => ['required', 'in:0,1']
        ];
        
        $validator = validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $response = [
                'title' => 'Success!',
                'message' => 'Equipment place not added.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Add'
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            try{
                DB::table('inventory_equipment_place')->insert([
                    'iep_place' => $request->place,
                    'iep_status' => $request->status 
                ]);

                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment place added',
                    'icon' => 'success',
                    'status' => 200
                ];

                return redirect(route('AdminConfigurationEquipmentPlace'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment place not added.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'Add'
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function update_place(Request $request, $id){
        $rules = [
            'place' => ['required', 'unique:inventory_equipment_place,iep_place,'.$id.',iep_id'],
            'status' => ['required', 'in:0,1']
        ];
        
        $validator = validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment place not updated.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Update',
                'iep_id' => $id
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            try{
                DB::table('inventory_equipment_place')->where('iep_id', $id)->update([
                    'iep_place' => $request->place,
                    'iep_status' => $request->status 
                ]);
    
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment place updated',
                    'icon' => 'success',
                    'status' => 200
                ];
    
                return redirect(route('AdminConfigurationEquipmentPlace'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment place not updated.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'Add'
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function delete_place($id){
        try{
            DB::table('inventory_equipment_place')->where('iep_id', $id)->delete();

            $response = [
                'title' => 'Success!',
                'message' => 'Equipment place deleted',
                'icon' => 'success',
                'status' => 200
            ];

            return redirect(route('AdminConfigurationEquipmentPlace'))->with('status', $response);
        }
        catch(Exception $e){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment place not deleted'.$e,
                'icon' => 'error',
                'status' => 400
            ];

            return redirect(route('AdminConfigurationEquipmentPlace'))->with('status', $response);
        }
    }
//place
}
