@extends('main-layout')
<h3 class="text-center mt-3 ">Klijenti</h3>
<div class="row">
<div class="col-8 offset-2 table-responsive">
<table class="table table-hover mt-3">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Document</th>
                    <th>Number od document</th>
                    <th>Country</th>
                    <th>Birthday</th>
                    <th>Izmjena</th>
                    <th>Brisanje</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->first_name }}</td>
                        <td>{{ $client->last_name }}</td>
                        <td>{{ $client->document->name }}</td>
                        <td>{{ $client->document_number }}</td>
                        <td>{{$client->country->name}}</td>
                        <td>{{$client->birthday}}</td>
                        <td>
                            <a href="{{route('client.edit',['id'=>$client->id])}}" class="btn btn-primary btn-sm">Izmjena</a>
                        </td>
                        <td>
                           <form action="{{ route('client.delete', ['client' => $client]) }}" method = "POST">
                               @method('DELETE')    
                               @csrf 
                              <button class="btn btn-sm btn-danger" onclick="return confirm('Da li ste sigurni da zelite da uklonite klijenta?')">Izbrisi</button>
                           </form>
                        </td>
                     </tr>
                     @endforeach
                </tbody>
            </table>
</div>
</div>