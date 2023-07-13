<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

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

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }

    public function getNameAttribute(){
        return $this->first_name." ".$this->last_name;
    }

    public static function search($searchTerm){
        return Client::query()->where('first_name','like',"%$searchTerm%")
                              ->orwhere('last_name','like',"%$searchTerm%")->get();
    }
    public static function reserveForClient($request){
        $reservation = $request->except('_token','first_name','last_name','document_id','document_namber','birthday','country_id');
        $client_id=DB::table('clients')->latest()->first()->id;
        $reservationMerge = array_merge($reservation,['client_id'=>$client_id]);
        ClientVehicle::query()->create($reservationMerge);
        return;
    }
}
