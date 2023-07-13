@extends('main-layout')

<h3 class="text-center mt-3">Rezervacije</h3>
<div class="row">
    <div class="col-8 offset-2 mt-2 table-responsive">
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
                                <button class="btn btn-danger">brisanje</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>