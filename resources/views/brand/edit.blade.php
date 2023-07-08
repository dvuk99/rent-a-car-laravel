@extends('main-layout')
<h3 class="text-center mt-3">Unesite podatke o novom automobilu</h3>
<div class="row">
    <div class="col-8 offset-2">
    <form action="{{route('brand.update',['brand'=>$brand])}}" method = "POST">
        @csrf 
        @method('PUT')
        <label for="brand">Marka automobila:</label>
        <input type="text" class="form-control" id="brand" name="name" value="{{$brand->name}}">
        <button class="btn btn-success">Sacuvaj</button>
    </form>
    </div>
</div>