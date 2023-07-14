<?php

namespace App\Models;

use App\Utilities\FilterBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['brand_id','cmodel_id','year_production','registration_plate','transmission','fuel_type','type_id'];
    public function cmodel(){
        return $this->belongsTo(Cmodel::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function clients(){
        return $this->hasMany(Client::class);
    }
    public static function search($searchTerm){
        return Vehicle::query()->where('cmodel_id','like',"%$searchTerm%")
                               ->orwhere('brand_id','like',"%$searchTerm%")->get();
    }

    public function scopeFilterBy($query, $filters,$flag)
    { 
        $namespace = 'App\Utilities\VehicleFilters';
        $filter = new FilterBuilder($query, $filters, $namespace, $flag);

        return $filter->apply();
    }

}
