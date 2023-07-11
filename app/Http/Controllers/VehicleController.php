<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Vehicle;
use App\Models\Cmodel;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    public function index(){
        $vehicles = Vehicle::all();
        return view('vehicle.index',compact('vehicles'));
    }

    public function create(){
        $types = Type::all();
        $brands = Brand::all();
        $arrayTrans = array("Manual","Automatik");
        $arrayFuelType = array("Dizel","Benzin","Hibrid","Elektricno");
    
        return view('vehicle.create',compact('types','brands','arrayTrans','arrayFuelType'));
    }

    public function save(VehicleRequest $request){
        Vehicle::query()->create($request->validated());
        return Redirect::route('vehicle.index');
    }

    public function edit($id){
        $vehicle = Vehicle::find($id);
        $brands = Brand::all();
        $cmodels = Cmodel::all();
        $types = Type::all();
        $arrayTrans = array("Manual","Automatik");
        $arrayFuelType = array("Dizel","Benzin","Hibrid","Elektricno");
        return view('vehicle.edit',compact('vehicle','brands','cmodels','arrayTrans','arrayFuelType','types'));
    }
    
     
    public function update($id, VehicleRequest $request){
        $vehicle = Vehicle::find($id);
        $vehicle->update($request->validated());
        return Redirect::route('vehicle.index');
    }
    
    public function delete(Vehicle $vehicle){
        $vehicle->delete();
        return Redirect::route('vehicle.index');
    }

}
