<?php

namespace App\Models;
use App\Models\Cmodel;
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
}
