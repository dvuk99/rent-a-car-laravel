<?php
namespace App\Utilities\VehicleFilters;

use App\Utilities\FilterContract;

class Transmission implements FilterContract
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    public function handle($value): void
    {
        $this->query->where('transmission',$value);
    }
}