<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::all();
        return view('vehicle.index',compact('vehicles'));
    }

    public function create(){
        $types = Type::all();
        $brands = Brand::all();
    
        return view('vehicle.create',compact('types','brands'));
    }


}
