<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Vehicle;
use App\Models\Cmodel;
use App\Models\ClientVehicle;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    public function index(Request $request){
        
        $vehicles = Vehicle::all();
        if($request->has('searchTerm')){
            $searchTerm = $request->get('searchTerm');

            $brands = Brand::search($searchTerm);
            $cmodels = Cmodel::search($searchTerm);
            if(isset($brands[0])){
                  $vehicles = Vehicle::search($brands[0]->id); 
            }else if(isset($cmodels[0])){
                  $vehicles = Vehicle::search($cmodels[0]->id);
            }
            
        }
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

    public function testDoktor(){
        $vozilo=Brand::search("audi");
        //dd(isset($vozilo[0]->name));
        $model = Cmodel::search("clio");
        dd($model);
    }

    public function index_reservation(){
        $reservations = ClientVehicle::all();
        return view('reservation.index',compact('reservations'));
    }

    public function saveRes(Request $request){
        $details = $request->except('_token');
        ClientVehicle::query()->create($details);
    }
    public function indexRes(){
        return view('reservation.create');
    }

    public function search(){
        $arrayTransmission = array("Manual","Automatik");
        $arrayFuelType = array("Dizel","Benzin","Hibrid","Elektricno");
        $types = Type::all();
        return view('reservation.create',compact('arrayTransmission','arrayFuelType','types'));
    }

    public function reservation(Request $request){
    
        $dateFrom = $request->get('beginning');
        $dateEnd = $request->get('end');
       
        //$clientVehicles = ClientVehicle::allReserved($request,$dateFrom,$dateEnd); 
        $notReservedVehicles = ClientVehicle::allNotRes($request);
        
      
        return view('reservation.free-cars',['filterVehicles'=>$notReservedVehicles,'dateFrom'=>$dateFrom,'dateEnd'=>$dateEnd]);
    }

    public function allReservations(){
        $reservations = ClientVehicle::all();
        return view('reservation.index',compact('reservations'));
    }

    public function deleteReservation(ClientVehicle $reservation){
        $reservation->delete();
        return Redirect::route('vehicle.allReservations');
    }

    public function help(){
        $vehicles = ClientVehicle::newFilter();
        dd($vehicles);
    }

}
