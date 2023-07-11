@extends('main-layout')
<h3 class="text-center mt-3">Izmjena vozila</h3>
<div class="row">
    <div class="col-4 offset-4 table-responsive mt-3">
        <form action="{{route('vehicle.update',['id'=>$vehicle->id])}}" method="POST">
            @csrf 
            @method('PUT')
            <label for="">Izaberite brand vozila</label>
            <select name="brand_id" id="brand" onchange="dynamicDropDown()" class="form-control mb-2">
                @foreach($brands as $brand)
                    @if($brand->name==$vehicle->brand->name)
                    <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                    @else 
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endif

                @endforeach
            </select>
            <label for="">Izaberite model auta</label>
            <select name="cmodel_id" id="cmodel" class="form-control mb-2">
                  @foreach($vehicle->brand->cmodels as $cmodel)
                       @if($cmodel->name == $vehicle->cmodel->name)
                           <option value="{{$cmodel->id}}" selected>{{$cmodel->name}}</option>
                       @else     
                           <option value="{{$cmodel->id}}">{{$cmodel->name}}</option>
                        @endif   
                  @endforeach
            </select>
            <label for="">Izaberite godinu proizvodnje</label>
            <select name="year_production" id="year" class="form-control mb-2">
                @for($year=1980; $year<=date("Y");$year++)
                      @if($year==$vehicle->year_production)
                          <option value="{{$year}}" selected>{{$year}}</option>
                      @else 
                          <option value="{{$year}}">{{$year}}</option>  
                      @endif           
                @endfor
            </select>

            <label for="registration">Registarske oznake</label>
            <input type="text" id="registration" name="registration_plate" value="{{$vehicle->registration_plate}}"  class="form-control mb-2">
            @error('registration_plate')
                  <div class="alert alert-danger"> {{$message}} </div>
            @enderror
            <label for="">Izaberite tip mjenjaca</label>
            <select name="transmission" class="form-control mb-2">
               @foreach($arrayTrans as $tran)
                   @if($tran == $vehicle->transmission)
                        <option value="{{$tran}}" selected> {{ $tran }} </option>
                   @else 
                        <option value="{{$tran}}"> {{ $tran }} </option>   
                    @endif      
               @endforeach
            </select>
            <label for="">Izaberite tip goriva</label>
            <select name="fuel_type" class="form-control mb-2">
                @foreach($arrayFuelType as $aft)
                     @if($aft == $vehicle->fuel_type)
                          <option value="{{ $aft }}" selected> {{ $aft }} </option>
                     @else
                          <option value="{{ $aft }}"> {{ $aft }} </option>     
                     @endif
                
                @endforeach
            </select>
            <label for="">Izaberite klasu auta</label>
            <select name="type_id" class="form-control mb-2">
                @foreach($types as $type)
                    @if($type->id == $vehicle->type_id)
                        <option value="{{ $type->id }}"> {{ $type->name }} </option>
                    @else 
                        <option value="{{ $type->id }}"> {{ $type->name }} </option>
                    @endif    
                @endforeach
            </select>
            <button class="btn btn-success w-100"> Sacuvaj </button>
        </form>
    </div>
</div>


<script>
    function dynamicDropDown(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){

            let arrayObj = JSON.parse(xhttp.responseText); 
            let forHtml="";
            for(let i=0; i<arrayObj.length; i++){
                forHtml+= `<option value="${arrayObj[i].id}"> ${arrayObj[i].name} </option>`;
           }
           
            document.getElementById("cmodel").innerHTML = forHtml;
                
        }
        let getBrandId = document.getElementById("brand").value;
        
        xhttp.open("GET","/brands/cmodels/update/" + getBrandId);
        xhttp.send();
   
    }
</script>