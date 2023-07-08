@extends('main-layout')
<h3 class="text-center mt-3">Automobili</h3>
<div class="row">

    <div class="col-6 offset-3">
     <div class="table">
        <table class="table table-responsive">
            <thead>
                <tr>

                
                <th>Marka automobila</th>
                <th></th>
                <th></th>
                </tr>
            </thead>

            <tbody>
            @foreach($brands as $brand)   
            
               <tr>
                <td>{{$brand->name}}</td>
                <td><a href="{{route('brand.edit',['id'=>$brand->id])}}" class="btn btn-primary">izmjena</a></td>
                <td>
                    <form action="{{route('brand.delete',['brand'=>$brand])}}" method ="POST">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger">brisanje</button>
                    </form>
                </td>
               </tr>
                

                
            @endforeach
            </tbody>

        </table>
       
     </div>
    </div>

   
</div>
<div class="row">
<div class="col-8 offset-4">
        <a href="{{route('brand.create')}}" class=" btn btn-success form-control w-50">Dodajte novi automobil</a>
    </div>
</div>