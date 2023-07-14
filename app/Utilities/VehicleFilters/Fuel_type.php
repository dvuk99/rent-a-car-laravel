<?php
namespace App\Utilities\VehicleFilters;

use App\Utilities\FilterContract;

class Fuel_type implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->where('fuel_type',$value)->groupBy('vehicles.id');;
    }
}