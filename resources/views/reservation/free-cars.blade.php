@extends('main-layout')
@include('navbar')

<h3 class="text-center mt-3">Rezervacije</h3>
<div class="row">
    <div class="col-8 offset-2 mt-2 table-responsive">
      
        <table class="table table-hover">
            <thead>
                <tr>
                   <th>Marka vozila</th>
                   <th>Model vozila</th>
                   <th>Godina proizvodnje</th>
                   <th>Registarske oznake</th>
                   <th>Tip mjenjaca</th>
                   <th>Tip goriva</th>
                   <th>Klasa vozila</th>
                   <th>Rezervacija</th>
                </tr>
            
            </thead>
            <tbody>
                @foreach($filterVehicles as $filterVehicle)
                    <tr>
                        <td>{{$filterVehicle->brand->name}}</td>
                        <td>{{$filterVehicle->cmodel->name}}</td>
                        <td>{{$filterVehicle->year_production}}</td>
                        <td>{{$filterVehicle->registration_plate}}</td>
                        <td>{{$filterVehicle->transmission}}</td>
                        <td>{{$filterVehicle->fuel_type}}</td>
                        <td>{{$filterVehicle->type->name}}</td>
                        
                        <td>
                            <form action="{{route('client.create')}}" method="POST">
                                @csrf
                                 <input type="hidden" name="vehicle_id" value="{{$filterVehicle->id}}">
                                 <input type="hidden" name="beginning" value="{{$dateFrom}}">
                                 <input type="hidden" name="end" value="{{$dateEnd}}">
                                 <button class="btn btn-primary">Rezervisi</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>