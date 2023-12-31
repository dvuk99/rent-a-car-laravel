@extends('main-layout')
@include('navbar')

<h3 class="text-center mt-3">Marke automobila</h3>
<div class="row">
        <div class="col-6 offset-3 mt-3">
            <form action="{{route('cmodel.index')}}" method="GET">
                <div class="row">
                   <div class="col-6">
                        <input type="text" class="form-control" name="searchTerm">
                   </div> 
                   <div class="col-3">
                    <button class="btn btn-success">Pretrazi</button>
                   </div>
                   <div class="col-3">
                    <a href="{{route('brand.create')}}" class="btn btn-success w-50">+Dodaj</a>
                   </div>
                </div>
            </form>
             <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr><th>Marke i modeli</th>
                             <th></th>
                             <th></th>
                        </tr>
                    </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                      <th>{{$brand->name}}</th>
                                      <td><a href="{{route('brand.edit',['id'=>$brand->id])}}" class="btn btn-primary btn">izmjena</a></td>
                                      <td>
                                        <form action="{{route('brand.delete',['brand'=>$brand])}}" method="POST">
                                           @csrf 
                                           @method('DELETE')
                                           <button class="btn btn-danger" onclick="return confirm('Da li ste sigurni?')">brisanje</button>
                                        </form>
                                      </td>
                            </tr>
                           
                           @foreach($brand->cmodels as $model)
                               
                               <tr>
                                  
                                  <td>{{$model->name}}</td>
                                  <td> <a href="{{route('cmodel.edit',['id'=>$model->id])}}" class="btn btn-primary btn">izmjena</a> </td>
                                  <td>
                                      <form action="{{route('cmodel.delete',['cmodel'=>$model])}}" method="POST">
                                          @csrf 
                                          @method('DELETE')
                                          <button class="btn btn-danger btn" onclick="return confirm('Da li ste sigurni?')">brisanje</button>
                                      </form>
                                  </td>
                               </tr>
                           
                           @endforeach
                           
                      @endforeach
                        </tbody>
               </table>
            </div>                    
          
        </div>
    
</div>


<script>
    function myFun(){
        confirm("Da li ste sigurni da zelite da izbrisete?");
    }
</script>