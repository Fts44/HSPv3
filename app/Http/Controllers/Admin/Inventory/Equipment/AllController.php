<?php

namespace App\Http\Controllers\Admin\Inventory\Equipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllController extends Controller
{
    public function index(){

        return view('admin.inventory.equipment.all');
    }
}
