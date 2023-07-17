@extends('main-layout')
@include('navbar')

<h3 class="text-center mt-3">Rezervacije</h3>
<div class="row">
    <div class="col-8 offset-2 mt-2 table-responsive">
       
        <form action="{{route('vehicle.allReservations')}}" method="GET">
            <div class="row">
                <div class="col-4">
                    <input type="text" class="form-control" name="searchTerm" placeholder="Pretrazite rezervaciju">
                </div>
                <div class="col-3">
                    <button class="btn btn-success">Pretrazi</button>
                </div>
            
            </div>
           
        </form>
        
        <table class="table table-hover">
            <thead>
                <tr>
                   <th>Klijent</th>
                   <th>Vozilo</th>
                   <th>Od</th>
                   <th>Do</th>
                   <th></th>
                </tr>
            
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->client->name }}</td>
                        <td>{{ $reservation->name }}</td>
                        <td>{{ $reservation->beginning }}</td>
                        <td>{{ $reservation->end }}</td>
                        <td>
                            <form action="{{route('reservation.delete',['reservation'=>$reservation])}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button class="btn btn-danger" onclick = "return confirm('Da li ste sigurni da zelite da izbrisete rezervaciju?')">brisanje</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>