@extends('main-layout')
@include('navbar')
<h3 class="text-center mt-3">Lista svih vozila</h3>
   
<div class="row">
    <div class="col-8 offset-2 table-responsive mt-3">
        <form action="{{route('vehicle.index')}}" method="GET">
        <div class="row">
           
           <div class="col-6">
               <input type="text" class="form-control" placeholder="Pretrazite vozilo" name="searchTerm">
           </div>
           <div class="col-3">
               <button class="btn btn-success">Pretrazi</button>
           </div>
           
           <div class="col-3">
               <a href="{{route('vehicle.create')}}" class="btn btn-success">+Dodaj</a>
           </div>
          
       </div>

        </form>
        
            <table class="table table-hover">
                 <thead>
                    <tr>
                        <th>Proizvodjac</th>
                        <th>Model</th>
                        <th>Godina proizvodnje</th>
                        <th>Registarske oznake</th>
                        <th>Tip mjenjaca</th>
                        <th>Tip goriva</th>
                        <th>Klasa vozila</th>
                        <th></th>
                        <th></th>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach($vehicles as $vehicle)
                    <tr>
                        <td>{{$vehicle->brand->name}}</td>
                        <td>{{$vehicle->cmodel->name}}</td>
                        <td>{{$vehicle->year_production}}</td>
                        <td>{{$vehicle->registration_plate}}</td>
                        <td>{{$vehicle->transmission}}</td>
                        <td>{{$vehicle->fuel_type}}</td>
                        <td>{{$vehicle->type->name}}</td>
                        <td><a href="{{route('vehicle.edit',['id'=>$vehicle->id])}}" class="btn btn-primary btn-sm">izmjena</a></td>
                        <td>
                            <form action="{{route('vehicle.delete',['vehicle'=>$vehicle])}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick = "return confirm('Da li ste sigurni da zelite da izbrisete vozilo')"> brisanje </button>
                            </form>
                        </td>
                    </tr>    
                       

                    @endforeach 
                 </tbody>
            </table>
        
    </div>
</div>