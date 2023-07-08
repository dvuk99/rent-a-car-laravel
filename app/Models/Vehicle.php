<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
     
    public function cmodel(){
        return $this->belongsTo(Cmodel::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
}
