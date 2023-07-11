@extends('main-layout')
<h3 class="text-center mt-3">Izmjena klase</h3>
<div class="row">
    <div class="col-6 offset-3 mt-3">
        <form action="{{route('type.update',['id'=>$type->id])}}", method="POST">
            @csrf 
            @method('PUT')
            <label for="type">Izmijenite ime</label>
            <input type="text" id="type" class="form-control" name="name" value="{{$type->name}}">
            @error('name')
                <div class="alert alert-danger"> {{ $message }} </div>
            @enderror
            <button class="btn btn-success w-100">Sacuvaj</button>
        </form>   
    </div>
</div>