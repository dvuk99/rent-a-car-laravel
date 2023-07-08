<?php

namespace App\Models;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];
    use HasFactory;

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }
}
