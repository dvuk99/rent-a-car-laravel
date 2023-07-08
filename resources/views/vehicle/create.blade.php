@extends('main-layout')

<h3 class="text-center mt-3">Dodajte novo vozilo</h3>
<div class="row">
    <div class="col-4 offset-4 mt-3">
        <form action="" method="POST">
            <select name="brand_id" id="brand" class="form-control" onchange="brandAndModels()">
                   <option value="0">--odaberite marku auta--</option>
                   @foreach($brands as $brand)
                         <option value="{{$brand->id}}">{{$brand->name}}</option>
                   @endforeach
            </select>
            <select name="cmodel_id" id="cmodel" class="form-control mt-3">
                
            </select>
            <select name="year_production" class="form-control mt-3">
                <option value="0">--izaberite godinu--</option>
                @for($year=1980; $year<=date("Y"); $year++)
                    <option value="{{$year}}"> {{$year}} </option>
                @endfor 
            </select>
            <label for="register" class="mt-2">Registarske oznake</label>
            <input type="text" id="register" class="form-control" name="registration_plate">
            <select name="transmission" id="trans" class="form-control mt-2">
                <option value="0">--Tip mjenjaca--</option>
                <option value="1">Manual</option>
                <option value="2">Automatik</option>
            </select>
            <select name="fuel_type" id="fType" class="form-control mt-2">
                <option value="0">--Tip goriva--</option>
                <option value="1">Dizel</option>
                <option value="2">Benzin</option>
                <option value="3">Hibrid</option>
                <option value="4">Elektricno</option>
            </select>
            
            <select name="type_id" id="type" class="form-control mt-2">
                <option value="0">--izaberite klasu vozila--</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-success w-100 mt-2">Sacuvaj</button>
        </form>
    </div>
    <script>
        function brandAndModels(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            let nizObj = JSON.parse(xhttp.responseText);
            let displayOption="<option> --odaberite model auta--  </option> ";
           for(let i=0;i<nizObj.length;i++){
                   displayOption +=`<option value="${nizObj[i].id}"> ${nizObj[i].name} </option>`;
                   
           }
           document.getElementById("cmodel").innerHTML = displayOption;
        }
        let selectedBrandId = document.getElementById("brand").value;
        
        xhttp.open("GET","/brands/cmodels/"+selectedBrandId);
        xhttp.send();
    }
    </script>
</div>