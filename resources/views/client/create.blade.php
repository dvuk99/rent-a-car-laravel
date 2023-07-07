@extends('main-layout')

<div class="row">
    
    <div class="col-6 offset-3 mt-3">
        <h2 class="text-center">Unesite podatke o klijentu</h2>
        <form action="{{ route('client.save') }}" method="POST">
        @csrf
            <label for="nameClient">Ime klijenta:</label>
            <input type="text" id="nameClient" name="first_name" class="form-control">
            <label for="lastNameClient">Prezime klijenta:</label>
            <input type="text" id="lastNameClient" name="last_name" class="form-control">
            <select name="document_id" class="form-control mt-3">
                <option value="">--odaberite dokument--</option>
                @foreach($documents as $document)
                   <option value="{{$document->id}}">{{$document->name}}</option>
                @endforeach
            </select>
            <label for="documentNumber">Broj dokumenta:</label>
            <input type="text" id="documentNumber" name="document_number" class="form-control">
            <label for="clientBirthday">Datum rodjenja</label>
            <input type="date" id="clientBirthday" name="birthday" class="form-control">
            
            <select name="country_id" id="country" class="form-control mt-3">
            <option value="">--odaberite drzavu--</option>
            @foreach($countries as $country)
                 <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach
            </select>
            <button class="btn btn-success form-control">Sacuvaj podatke</button>
        </form>
        
        
        
    </div>
</div>