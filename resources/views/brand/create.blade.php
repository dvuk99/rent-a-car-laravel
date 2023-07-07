@extends('main-layout')
<h3 class="text-center mt-3">Unesite podatke o novom automobilu</h3>
<div class="row">
    <div class="col-8 offset-2">
    <form action="{{route('brand.save')}}" method = "POST">
        @csrf 
        <label for="brand">Proizvodjac:</label>
        <input type="text" class="form-control" id="brand" name="name">
        <label for="model">Model:</label>
        <input type="text" class="form-control" id="model" name="model_name">
        <button class="btn btn-success">Sacuvaj</button>
    </form>
    </div>
</div>