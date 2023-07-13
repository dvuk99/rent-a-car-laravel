<?php

namespace App\Models;
use App\Models\Brand;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cmodel extends Model
{
    use HasFactory;
    protected $table = 'cmodels';
    protected $fillable = ['name','brand_id'];

    public function brand(): BelongsTo{
        return $this->belongsTo(Brand::class);
    }
    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }

    public static function search($searchTerm){
        return Cmodel::query()->where('name','like',"%$searchTerm%")->get();
    }
    public static function searchBrandAndModels($searchTerm){
        $brand = Brand::query()->where('name','like',"%$searchTerm%")->get();
        $cmodel = Cmodel::query()->where('name','like',"%$searchTerm%")->get();
        if(isset($brand[0])) return $brand;

}

}