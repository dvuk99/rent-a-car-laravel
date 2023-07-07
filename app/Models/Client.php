<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','document_id','document_number','birthday','country_id'];
    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function document(){
        return $this->belongsTo(Document::class);
    }
}
