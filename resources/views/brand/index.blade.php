@extends('main-layout')
<h3 class="text-center mt-3">Automobili</h3>
<div class="row">

    <div class="col-6 offset-3">
     <div class="table">
        <table class="table table-responsive">
            <thead>
                <tr>

                
                <th>Proizvodjac automobila</th>
                <th>Model automobila</th>

                </tr>
            </thead>

            <tbody>
            @foreach($brands as $brand)   
            
                @foreach($brand->cmodels as $model)
                  <tr>
                    <td>{{$brand->name}}</td>
                    <td>{{$model->name}}</td>
                  </tr>
                @endforeach
                

                
            @endforeach
            </tbody>

        </table>
       
     </div>
    </div>

   
</div>
<div class="row">
<div class="col-8 offset-4">
        <a href="{{route('brand.create')}}" class=" btn btn-success form-control w-50">Dodajte novi automobil</a>
    </div>
</div>