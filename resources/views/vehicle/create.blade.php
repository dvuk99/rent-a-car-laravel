@extends('main-layout')

<h3 class="text-center mt-3">Dodajte novo vozilo</h3>
<div class="row">
    <div class="col-4 offset-4 mt-3">
        <form action="{{route('vehicle.save')}}" method="POST">
            @csrf
            <select name="brand_id" id="brand" class="form-control" onchange="brandAndModels()">
                   <option value="0">--odaberite marku auta--</option>
                   @foreach($brands as $brand)
                         <option value="{{$brand->id}}">{{$brand->name}}</option>
                   @endforeach
            </select>
            @error('brand_id')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <select name="cmodel_id" id="cmodel" class="form-control mt-3">
                
            </select>
            @error('cmodel_id')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <select name="year_production" class="form-control mt-3">
                <option value="0">--izaberite godinu--</option>
                @for($year=1980; $year<=date("Y"); $year++)
                    <option value="{{$year}}" @if(old('year_production')==$year) selected @endif> {{$year}} </option>
                @endfor 
               
            </select>
            @error('year_production')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <label for="register" class="mt-2">Registarske oznake</label>
            <input type="text" id="register" class="form-control" name="registration_plate"  value="{{ old('registration_plate') }}">
            @error('registration_plate')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <select name="transmission" id="trans" class="form-control mt-2">
                <option value="0">--Tip mjenjaca--</option>
                @foreach($arrayTrans as $tran)
                        <option value="{{$tran}}" @if(old('transmission')==$tran) selected @endif>{{$tran}}</option>
                @endforeach
                
            </select>
            @error('transmission')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            <select name="fuel_type" id="fType" class="form-control mt-2">
                <option value="0">--Tip goriva--</option>
                @foreach($arrayFuelType as $aft)
                    <option value="{{$aft}}" @if(old('fuel_type')==$aft) selected @endif >{{$aft}}</option>
                @endforeach    
            </select>
            @error('fuel_type')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
            
            <select name="type_id" id="type" class="form-control mt-2">
                <option value="0">--izaberite klasu vozila--</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}" @if(old('type_id')==$type->id) selected @endif>{{$type->name}}</option>
                @endforeach
            </select>
            @error('type_id')
                      <div class="alert alert-danger mt-2">{{ $message }}</div>
             @enderror
            <button class="btn btn-success w-100 mt-2">Sacuvaj</button>
        </form>
    </div>
    <script>
        function brandAndModels(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            let nizObj = JSON.parse(xhttp.responseText);
            
            let emptyObj = JSON.stringify(nizObj);
            if(emptyObj=="{}"){
                 document.getElementById("cmodel").innerHTML = "";
            }else{

           
           let displayOption="<option> --odaberite model auta--  </option> ";
           for(let i=0;i<nizObj.length;i++){
                   displayOption +=`<option value="${nizObj[i].id}"> ${nizObj[i].name} </option>`;
                   
           }
           document.getElementById("cmodel").innerHTML = displayOption;
           
        }
        
        }
        let selectedBrandId = document.getElementById("brand").value;
        
        xhttp.open("GET","/brands/cmodels/"+selectedBrandId);
        xhttp.send();
    }
    </script>
</div>