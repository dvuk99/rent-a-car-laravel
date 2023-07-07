@extends('main-layout')

<div class="row">
    
    <div class="col-6 offset-3 mt-3">
        <h2 class="text-center">Izmijenite podatke o klijentu</h2>
        <form action="{{route('client.update', ['client' => $client ])}}" method="POST">
        @csrf
        @method('PUT')
            <label for="nameClient">Ime klijenta:</label>
            <input type="text" id="nameClient" name="first_name" class="form-control" value="{{$client->first_name}}">
            <label for="lastNameClient">Prezime klijenta:</label>
            <input type="text" id="lastNameClient" name="last_name" class="form-control" value="{{$client->last_name}}">
            <select name="document_id" class="form-control mt-3">
                <option value="">--odaberite dokument--</option>
                @foreach($documents as $document)
                   @if($document->id==$client->document_id)
                   <option value="{{$document->id}}" selected>{{$document->name}}</option>
                   @else 
                   <option value="{{$document->id}}">{{$document->name}}</option>
                   @endif
                @endforeach
            </select>
            <label for="documentNumber">Broj dokumenta:</label>
            <input type="text" id="documentNumber" name="document_number" class="form-control" value="{{$client->document_number}}">
            <label for="clientBirthday">Datum rodjenja</label>
            <input type="date" id="clientBirthday" name="birthday" class="form-control" value="{{$client->birthday}}">
            
            <select name="country_id" id="country" class="form-control mt-3">
            <option value="">--odaberite drzavu--</option>
            @foreach($countries as $country)
                @if($country->id == $client->country_id)
                   <option value="{{$country->id}}" selected>{{$country->name}}</option>
                @else 
                   <option value="{{$country->id}}">{{$country->name}}</option>
                    
               @endif   
            @endforeach
            </select>
            <button class="btn btn-success form-control mt-3">Sacuvajte podatke</button>
        </form>
    </div>
</div>