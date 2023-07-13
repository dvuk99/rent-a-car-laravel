<?php

namespace App\Models;
use App\Models\Cmodel;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use DB;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function cmodels(): HasMany{
        return $this->hasMany(Cmodel::class);
    }
    public function vehicles(): HasMany{
        return $this->hasMany(Vehicle::class);
    }
    public static function search($searchTerm){
        return Brand::query()->where('name','like',"%$searchTerm%")->get();
    }
    public static function check($brands,$carModel,$carName){
        if(isset($brands[0]->name)){
            $models = Cmodel::query()->where('name','=',$carModel)->get();
            if(isset($models[0]->name)){
                $temp = "Model automobila vec postoji u bazi";
                return $temp;
            }else{
                $nizModel = ['name' => $carModel,'brand_id'=>$brands[0]->id];
                Cmodel::create($nizModel);
            }
            
        }else{
            Brand::create(['name'=>$carName]);
            $idForCar=DB::table('brands')->latest()->first()->id;
            $modelOfBrand = ['name' => $carModel,'brand_id' => $idForCar];
            Cmodel::create($modelOfBrand);
            
        }
        
    }
}
