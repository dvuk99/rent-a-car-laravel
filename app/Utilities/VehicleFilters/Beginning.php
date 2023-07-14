<?php
namespace App\Utilities\VehicleFilters;

use App\Utilities\FilterDate;

class Beginning implements FilterDate
{
    protected $query;
    public static  $valueBegin=1;
    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value, $flag) : void
    {   if($flag==1){ 
        $this->query->select('vehicles.*')
        ->leftJoin('client_vehicle','vehicles.id','=','client_vehicle.vehicle_id')
        ->whereNull('client_vehicle.vehicle_id')
        ->groupBy('vehicles.id');
    }else{
        self::$valueBegin = $value;
        
        $this->query->select('vehicles.*')
                    ->join('client_vehicle','vehicles.id','=','client_vehicle.vehicle_id');                
    }
}

}