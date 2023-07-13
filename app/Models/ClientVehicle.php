<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public static function between($dateForCompareFrom,$dateForCompareEnd,$dateFromRequest,$dateEndRequest){
       if($dateForCompareFrom<=$dateFromRequest and $dateForCompareEnd>=$dateFromRequest) return true;
       else if($dateForCompareFrom>=$dateFromRequest and $dateForCompareFrom <= $dateEndRequest) return true;
       else if($dateForCompareFrom <= $dateFromRequest and ($dateForCompareEnd<=$dateEndRequest and $dateForCompareEnd>=$dateFromRequest)) return true;

        
    }

    public static function compare($dateFrom,$dateEnd){
        $allReservedVehicles = ClientVehicle::all();
        $allReservedVehiclesFilter = array();
        foreach($allReservedVehicles as $vehicle){
            if(!ClientVehicle::between($vehicle->beginning,$vehicle->end,$dateFrom,$dateEnd)){
                    $allReservedVehiclesFilter[] = $vehicle;
            }
        }
        return $allReservedVehiclesFilter;

    }

    public static function filter($freeVehicles,$request,$flag){
        $filterVehicles = [];
        $transmission = $request->get('transmission');
        $fuelType = $request->get('fuel_type');
        $type = $request->get('type_id');
        $year = $request->get('year_production');
        if($flag=="Reserved"){
        foreach($freeVehicles as $freeVehicle){
           if($freeVehicle->vehicle->transmission==$transmission and $freeVehicle->vehicle->fuel_type==$fuelType and 
              $freeVehicle->vehicle->type_id==$type and $freeVehicle->vehicle->year_production>=$year)
                $filterVehicles[] = $freeVehicle->vehicle;
        }
        return $filterVehicles;
    }else {
        foreach($freeVehicles as $freeVehicle){
            if($freeVehicle->transmission == $transmission and $freeVehicle->fuel_type==$fuelType and
               $freeVehicle->type_id == $type and $freeVehicle->year_production >= $year)
               $filterVehicles[] = $freeVehicle;
        }
        return $filterVehicles;
    }
    }

    public static function allNotReservedVehicles(){
        $cars = Vehicle::all();
        $reservedVehicles = ClientVehicle::all();
        $vehicles = [];
        foreach($cars as $car){
            $flag=0;
            foreach($reservedVehicles as $reservedVehicle){
                if($car->id == $reservedVehicle->vehicle_id) $flag=1;
           }
           if($flag==0) $vehicles[] = $car;
        }
        return $vehicles; 
    }
}
