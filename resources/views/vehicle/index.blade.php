@extends('main-layout')

<h3 class="text-center mt-3">Lista svih vozila</h3>
<div class="col-3 offset-9 mt-2">
    <form action="{{route('vehicle.create')}}" method="GET">
    <button class="btn btn-success w-50">+Dodaj

    </button>
    </form>
</div>
<div class="row">
    <div class="col-8 offset-2 mt-3">
        <div class="table-responsive">
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
</div>