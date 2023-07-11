@extends('main-layout')
<h3 class="text-center mt-3">Unesite podatke o novom automobilu</h3>
<div class="row">
    <div class="col-8 offset-2">
    <form action="{{route('brand.save')}}" method = "POST">
        @csrf 
        <label for="brand">Proizvodjac:</label>
        <input type="text" class="form-control" id="brand" name="name" value="{{ old('name') }}">
        @error('name')
             <div class="alert alert-danger mt-2"> {{ $message }} </div>
        @enderror
        <label for="model">Model:</label>
        <input type="text" class="form-control" id="model" name="model_name" value="{{ old('model_name') }}">
        @error('model_name')
              <div class="alert alert-danger mt-2"> {{ $message }} </div>
        @enderror
        <p class="text-danger">
            @if(isset($error)) 
            {{$error}} 
            @else 
            @endif
        </p>
        <button class="btn btn-success">Sacuvaj</button>
    </form>
    </div>
</div>