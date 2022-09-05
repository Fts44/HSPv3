<?php

namespace App\Http\Controllers\Admin\Inventory\Equipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PerProductController extends Controller
{
    public function index(){
        $item_details = DB::table('inventory_equipment_item_details as ieid')
            ->select('ieid.*', 'ien.*', 'iet.*', 'ieb.*')
            ->leftjoin('inventory_equipment_name as ien', 'ieid.ien_id', 'ien.ien_id')
            ->leftjoin('inventory_equipment_type as iet', 'ieid.iet_id', 'iet.iet_id')
            ->leftjoin('inventory_equipment_brand as ieb', 'ieid.ieb_id', 'ieb.ieb_id')
            ->orderBy('ien.ien_name', 'ASC')
            ->get();
    
        $places = DB::table('inventory_equipment_place')
            ->orderBy('iep_place', 'ASC')
            ->where('iep_place','!=','none')
            ->get();

        $inventory_items = DB::table('inventory_equipment_item as iei')
            ->select('iei.*', 'ieid.*', 'ien.*', 'iet.*', 'ieb.*', 'iep.*')
            ->leftjoin('inventory_equipment_item_details as ieid', 'iei.ieid_id', 'ieid.ieid_id')
            ->leftjoin('inventory_equipment_name as ien', 'ieid.ien_id', 'ien.ien_id')
            ->leftjoin('inventory_equipment_type as iet', 'ieid.iet_id', 'iet.iet_id')
            ->leftjoin('inventory_equipment_brand as ieb', 'ieid.ieb_id', 'ieb.ieb_id')
            ->leftjoin('inventory_equipment_place as iep', 'iei.iep_id', 'iep.iep_id')
            ->get();
        // echo json_encode($inventory_items);
        return view('admin.inventory.equipment.perproduct')
            ->with([
                'inventory_items' => $inventory_items,
                'item_details' => $item_details,
                'places' => $places
            ]);
    }

    public function insert(Request $request){
        // echo json_encode($request->all());

        $rules = [
            'item' => ['required'],
            'quantity' => ['required', 'numeric'], 
            'date_added' => ['required'],
            'condition' => ['required'],
            'place' => ['required'],
        ];

        $validator = validator::make($request->all(), $rules);

        if($validator->fails()){
            $response = [
                'title' => 'Error!',
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
                DB::table('inventory_equipment_item')->insert([
                    'iei_qty' => $request->quantity,
                    'iei_condition' => $request->condition,
                    'iei_date_added' => $request->date_added,
                    'ieid_id' => $request->item,
                    'iep_id' => $request->place,
                ]);

                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment item added.',
                    'icon' => 'success',
                    'status' => 200
                ];    

                return redirect(route('AdminInventoryEquipmentPerProduct'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Error!',
                    'message' => 'Equipment item not added.'.$e,
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

    public function update(Request $request, $id){

        $rules = [
            'item' => ['required'],
            'quantity' => ['required', 'numeric'], 
            'date_added' => ['required'],
            'condition' => ['required'],
            'place' => ['required'],
        ];

        $validator = validator::make($request->all(), $rules);

        if($validator->fails()){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment item not updated.',
                'icon' => 'error',
                'status' => 400,
                'action' => 'Update',
                'iei_id' => $id
            ];    
            return redirect()->back()
                ->with('status', $response)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        else{
            try{
                DB::table('inventory_equipment_item')->where('iei_id', $id)->update([
                    'iei_qty' => $request->quantity,
                    'iei_condition' => $request->condition,
                    'iei_date_added' => $request->date_added,
                    'ieid_id' => $request->item,
                    'iep_id' => $request->place
                ]);
                
                $response = [
                    'title' => 'Success!',
                    'message' => 'Equipment item updtestated.',
                    'icon' => 'success',
                    'status' => 200
                ];    
                return redirect(route('AdminInventoryEquipmentPerProduct'))->with('status', $response);
            }
            catch(Exception $e){
                $response = [
                    'title' => 'Error!',
                    'message' => 'Equipment item not updated.'.$e,
                    'icon' => 'error',
                    'status' => 400,
                    'action' => 'Update'
                ];    
                return redirect()->back()
                    ->with('status', $response)
                    ->withErrors($validator)
                    ->withInput($request->all());
            }
        }
    }

    public function delete($id){
        try{
            DB::table('inventory_equipment_item')->where('iei_id', $id)->delete();

            $response = [
                'title' => 'Success!',
                'message' => 'Equipment item deleted',
                'icon' => 'success',
                'status' => 200
            ];

            return redirect(route('AdminInventoryEquipmentPerProduct'))->with('status', $response);
        }
        catch(Exception $e){
            $response = [
                'title' => 'Error!',
                'message' => 'Equipment item not deleted'.$e,
                'icon' => 'error',
                'status' => 400
            ];

            return redirect(route('AdminInventoryEquipmentPerProduct'))->with('status', $response);
        }
    }
}
