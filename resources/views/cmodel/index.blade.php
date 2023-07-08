@extends('main-layout')


<h3 class="text-center mt-3">Marke automobila</h3>
<div class="row">
    
        <div class="col-8 offset-2 mt-3 table-responsive">
        <table class="table table-hover">
                            <tbody>
                            @foreach($brands as $brand)
                           <tr>
                                      <th>{{$brand->name}}</th>
                                      <th></th>
                                      <th></th>
                                 </tr>
                          
    
                           @foreach($brand->cmodels as $model)
                           
                               <tr>
                                  <td>{{$model->name}}</td>
                              
                                  <td> <a href="{{route('cmodel.edit',['id'=>$model->id])}}" class="btn btn-primary btn-sm">izmjena</a> </td>
                                  <td>
                                      <form action="{{route('cmodel.delete',['cmodel'=>$model])}}" method="POST">
                                          @csrf 
                                          @method('DELETE')
                                          <button class="btn btn-danger btn-sm">izbirsi</button>
                                      </form>
                                  </td>
                               </tr>
                           
                           @endforeach
                           
                      @endforeach
                            </tbody>
        </table>
                                 
          
        </div>
    
</div>