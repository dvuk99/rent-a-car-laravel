@extends('main-layout')

<h3 class="text-center mt-3">Izmjena modela</h3>
<div class="row">
    <div class="col-6 offset-3">
        <form action="{{route('cmodel.update',['cmodel'=>$cmodel])}}" method="POST">
            @csrf
            @method('PUT')

            <label for="nameModel"> Naziv modela </label>
            <input type="text" name="name" class="form-control" value="{{$cmodel->name}}">
            <button class="btn btn-success form-control mt-3">Sacuvaj</button>
        </form>
    </div>
</div>