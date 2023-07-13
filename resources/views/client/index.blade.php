@extends('main-layout')
@include('navbar')
<h3 class="text-center my-2 ">Klijenti</h3>
<div class="row">
<div class="col-8 offset-2 table-responsive mt-3">
    <form action="" method="GET">
        <div class="row">
            <div class="col-5">
                  <input type="text" class="form-control" name="searchTerm" placeholder="Pretrazite klijenta">            
            </div>
            <div class="col-3">
                  <button class="btn btn-success w-50">Pretrazi</button>
            </div>
            <div class="col-3">
                <a href="{{route('client.create')}}" class="btn btn-primary btn-success w-50">+Dodaj</a>
            </div>
        </div>
    </form>
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
                              <button class="btn btn-sm btn-danger" onclick="return confirm('Da li ste sigurni da zelite da uklonite klijenta?')">brisanje</button>
                           </form>
                        </td>
                     </tr>
                     @endforeach
                </tbody>
            </table>
</div>
</div>