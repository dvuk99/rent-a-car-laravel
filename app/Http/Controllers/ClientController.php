<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Country;
use App\Models\Document;
use App\Http\Requests\ClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request){
        $clients = Client::query()->get();
        if($request->has('searchTerm')){
            $searchTerm = $request->get('searchTerm');
            $clients = Client::search($searchTerm);
        }
        return view('client.index',['clients'=>$clients]);
    }
    public function create(Request $request){
        $clients = Client::all();
        $countries = Country::all();
        $documents = Document::all();
        $dateStart = $request->get('beginning');
        $dateEnd = $request->get('end');
        $vehicle_id = $request->get('vehicle_id');
        return view('client.create',compact('clients','countries','documents','dateStart','dateEnd','vehicle_id'));
    }

    public function save(ClientRequest $request){
           Client::query()->create($request->validated());
           Client::reserveForClient($request);
           $clients = Client::all();
           return view('client.index',compact('clients'));
    }

    public function edit($id){
        $client = Client::find($id);
        $documents = Document::all();
        $countries = Country::all();
        return view('client.edit',['client'=>$client,'countries'=>$countries,'documents'=>$documents]);
    }

    public function update(Client $client, ClientRequest $request){
        
            $client->update($request->validated());
            $clients = Client::all();
            return view('client.index',['clients'=>$clients]);
    }
    
    public function delete(Client $client){
        $client->delete();
        $clients = Client::all();
        return view('client.index',compact('clients'));
    }
}
