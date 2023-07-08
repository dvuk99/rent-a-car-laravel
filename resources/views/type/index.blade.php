@extends('main-layout')
<h3 class="mt-3 text-center">Klasa vozila</h3>
<div class="row text-center">
    <div class="col-8 offset-4 mt-3 table-responsive">
        <div class="row">
            <div class="col-6">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>Naziv klase</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $type)
                <tr>
                     <td>{{$type->name}}</td>
                     <td><a href="{{route('type.edit',['id'=>$type->id])}}" class="btn btn-primary btn-sm">izmjena</a>
                     </td>
                     <td>
                        <form action="{{route('type.delete',['type'=>$type])}}" method="POST">
                           @csrf  
                           @method('DELETE')    
                           <button class="btn btn-danger btn-sm">brisanje</button>
                        </form>
                     </td>
                </tr>
                @endforeach
               
            </tbody>
            
        </table>
 
            </div>
            <div class="col-6">
                <form action="{{route('type.create')}}" method="GET">
                <button class="btn btn-success w-50">+Dodaj</button>
                </form>
            </div>
        </div>
       
    </div>
   
</div>