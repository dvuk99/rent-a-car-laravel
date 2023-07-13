@extends('main-layout')

<div class="row">
    
    <div class="col-6 offset-3 mt-3">
        <h2 class="text-center">Unesite podatke o klijentu</h2>
        <form action="{{ route('client.save') }}" method="POST">
        @csrf
            <label for="nameClient">Ime klijenta:</label>
            <input type="text" id="nameClient" name="first_name" class="form-control" value="{{old('first_name')}}">
            @error('first_name')
                <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
            <label for="lastNameClient">Prezime klijenta:</label>
            <input type="text" id="lastNameClient" name="last_name" class="form-control" value="{{old('last_name')}}">
            @error('last_name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <select name="document_id" class="form-control mt-3">
                <option value="">--odaberite dokument--</option>
                @foreach($documents as $document)
                   <option value="{{$document->id}}" @if(old('document_id')==$document->id) selected @endif>{{$document->name}}</option>
                @endforeach
            </select>
            @error('document_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="documentNumber">Broj dokumenta:</label>
            <input type="text" id="documentNumber" name="document_number" class="form-control" value="{{old('document_number')}}">
            @error('document_number')
                 <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <label for="clientBirthday">Datum rodjenja</label>
            <input type="date" id="clientBirthday" name="birthday" class="form-control" value="{{old('birthday')}}">
            @error('birthday')
                 <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <select name="country_id" id="country" class="form-control mt-3">
            <option value="">--odaberite drzavu--</option>
            @foreach($countries as $country)
                 <option value="{{$country->id}}" @if(old('country_id')==$country->id) selected @endif>{{$country->name}}</option>
            @endforeach
            </select>
            @error('country_id')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            
            <input type="hidden" name="vehicle_id" value="{{$vehicle_id}}">
            <input type="hidden" name="beginning" value="{{$dateStart}}">
            <input type="hidden" name="end" value="{{$dateEnd}}">

            <button class="btn btn-success form-control">Sacuvaj podatke</button>
        </form>
        
        
        
    </div>
</div>