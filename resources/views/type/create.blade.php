@extends('main-layout')
<h3 class="text-center mt-3">Dodajte novu klasu</h3>
<div class="row">
    <div class="col-6 offset-3 mt-3">
        <form action="{{route('type.save')}}" method="POST">
            @csrf
            <label for="typeName">Ime klase</label>
            <input type="text" class="form-control" name="name" id="typeName">
            <button class="btn btn-success w-100 mt-3">Sacuvaj</button>
        </form>
    </div>
</div>