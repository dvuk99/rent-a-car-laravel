@extends('main-layout')
<table class="table table-hover mt-4">
                <thead>
                <tr>
                   <th>Naziv Drzave</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($countries as $country)
                     <tr>
                        <td>{{$country->name}}</td>
                     </tr>


                 @endforeach

                 
                </tbody>
            </table>