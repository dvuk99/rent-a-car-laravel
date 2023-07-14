<?php
namespace App\Utilities\VehicleFilters;

use App\Utilities\FilterContract;

class Type_id implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->where('type_id',$value);
    }
}