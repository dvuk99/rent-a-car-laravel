<?php
namespace App\Utilities\VehicleFilters;

use App\Utilities\FilterDate;

class End implements FilterDate
{
    protected $query;
    public static $forQueryValue;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value, $flag) : void
    {   if($flag!=1){
        
        self::$forQueryValue = $value;

        $this->query->where(function($query){
            $query->where('client_vehicle.end','<', Beginning::$valueBegin)
            ->orwhere('client_vehicle.beginning','>',End::$forQueryValue);
        });
        }
    }
}

