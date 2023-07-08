@extends('main-layout')

<h3 class="text-center mt-3">Lista svih vozila</h3>
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
                    </tr>
                 </thead>
                 <tbody>
                    @foreach($vehicles as $vehicle)
                        <td>{{$vehicle->brand->name}}</td>
                        <td>{{$vehicle->cmodel->name}}</td>
                        <td>{{$vehicle->year_production}}</td>
                        <td>{{$vehicle->registration_plate}}</td>
                        <td>{{$vehicle->transmission}}</td>
                        <td>{{$vehicle->fuel_type}}</td>
                        <td>{{$vehicle->type->name}}</td>
                       

                    @endforeach 
                 </tbody>
            </table>
        </div>
    </div>
</div>