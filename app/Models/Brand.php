<?php

namespace App\Models;
use App\Models\Cmodel;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

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
}
