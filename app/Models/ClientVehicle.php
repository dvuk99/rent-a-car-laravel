<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ClientVehicle extends Model
{
    use HasFactory;

    protected $table = 'client_vehicle';
    protected $fillable = ['vehicle_id','client_id','beginning','end'];

  
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function getNameAttribute(){
        $brandName = $this->vehicle->brand->name;
        $modelName = $this->vehicle->cmodel->name;
        return $brandName." ".$modelName;
    }


   
    public static function allReserved($request,$dateStartRequest,$dateEndRequest){
        $transmission = $request->get('transmission');
        $fuelType = $request->get('fuel_type');
        $year = $request->get('year_production');
        $type = $request->get('type_id');

       $vehicles = Vehicle::select('vehicles.*','client_vehicle.*')
                            ->join('client_vehicle','vehicles.id','=','client_vehicle.vehicle_id')
                            ->where([
                                ['vehicles.transmission','=',$transmission],
                                ['vehicles.fuel_type','=',$fuelType],
                                ['vehicles.year_production','>=',$year],
                                ['vehicles.type_id','=',$type]
                            ])
                            ->where('client_vehicle.end','<',$dateStartRequest)
                            ->orwhere('client_vehicle.beginning','>',$dateEndRequest)
                            ->groupBy('vehicles.id')
                            ->get();
                            
                            return $vehicles;
    } 

    public static function allNotRes($request){
        $transmission = $request->get('transmission');
        $fuelType = $request->get('fuel_type');
        $year = $request->get('year_production');
        $type = $request->get('type_id');

        $cars = Vehicle::select('vehicles.*')
                         ->leftJoin('client_vehicle','vehicles.id','=','client_vehicle.vehicle_id')
                         ->whereNull('client_vehicle.vehicle_id')
                         ->groupBy('vehicles.id')->get();
                            return $cars;
    }

}

/* 

(select * from vehicles
 left join client_vehicle
 on vehicles.id = client_vehicle.vehicle_id
 where client_vehicle.vehicle_id is  NULL
GROUP BY vehicles.id);

*/