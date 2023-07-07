<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function fetchInsert(){
        $response = Http::get('https://restcountries.com/v3.1/all');
        $response = json_decode($response->body(),true);
        $arrayCountries = array();
        foreach($response as $res){
            $arrayCountries[] = ['name' => $res['name']['common']];
        }

        foreach($arrayCountries as $country){
            
            Country::query()->create($country);
        }
        
        
    }

    public function index(){
        $countries = Country::all();
       
        return view('country.index',['countries'=>$countries]);
    }
}
