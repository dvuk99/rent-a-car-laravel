@extends('main-layout')
<h3 class="text-center mt-3">Dodajte novu klasu</h3>
<div class="row">
    <div class="col-6 offset-3 mt-3">
        <form action="{{route('vehicle.reservation')}}" method="POST">
            @csrf
            <label for="dateBeg" class="mt-2">Datum od:</label>
            <input type="date" id="dateBeg" class="form-control" name="beginning">

            <label for="dateEnd" class="mt-2">Datum do:</label>
            <input type="date" id="dateEnd" class="form-control" name="end">

            <select name="transmission" class="form-control mt-2">
                   <option value="">--odaberite tip mjenjaca--</option>
                @foreach($arrayTransmission as $tran)
                   <option value="{{$tran}}">{{$tran }}</option>
                @endforeach
            </select>
            <select name="fuel_type" id="" class="form-control mt-2">
                <option value="">--odaberite tip goriva--</option>
                @foreach($arrayFuelType as $fuelType)
                    <option value="{{$fuelType}}">{{ $fuelType }}</option>
                @endforeach
            </select>
            <select name="type_id" id="" class="form-control mt-2">
                <option value="">--odaberite klasu vozila--</option>
                @foreach($types as $type)
                <option value="{{$type->id}}">{{ $type->name }}</option>
                @endforeach
            </select>
            <select name="year_production" id="" class="form-control mt-2">
                <option value="">--odaberite godinu proizvodnje</option>
                @for($year=1980; $year<=date("Y"); $year++)
                    <option value="{{$year}}"> {{ $year }} </option>
                @endfor
            </select>
            <button class="btn btn-success w-100 mt-3">Pretrazi</button>
        </form>
    </div>
</div>