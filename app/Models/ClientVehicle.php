<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ClientVehicle extends Model
{
    use HasFactory;

    protected $table = 'client_vehicle';
    protected $fillable = ['vehicle_id','client_id','beginning','end'];

  
    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function getNameAttribute(){
        $brandName = $this->vehicle->brand->name;
        $modelName = $this->vehicle->cmodel->name;
        return $brandName." ".$modelName;
    }
    public static function search($searchTerm){
        $brand = Brand::search($searchTerm);
        if(isset($brand[0])){
        $vozilo = ClientVehicle::select('client_vehicle.*')->join('vehicles','vehicles.id','client_vehicle.vehicle_id')
                                             ->where('vehicles.brand_id','=',$brand[0]->id)->get();
                                             
                                             return $vozilo;
                            }
                            
       
      
        $model = Cmodel::search($searchTerm);
        
        if(isset($model[0])){
            $vozilo = ClientVehicle::select('client_vehicle.*')->join('vehicles','vehicles.id','client_vehicle.vehicle_id')
            ->where('vehicles.cmodel_id','=',$model[0]->id)->get();
            return $vozilo;
        }  
        $client = Client::search($searchTerm);
        $vozilo = ClientVehicle::select('client_vehicle.*')->join('clients','clients.id','client_vehicle.client_id')
                                                           ->where('clients.id','=',$client[0]->id)->get();
                                                           return $vozilo;
    

    }


}

/* 

(select * from vehicles
 left join client_vehicle
 on vehicles.id = client_vehicle.vehicle_id
 where client_vehicle.vehicle_id is  NULL
GROUP BY vehicles.id);

*/