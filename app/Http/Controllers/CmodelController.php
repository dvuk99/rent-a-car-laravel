<?php

namespace App\Http\Controllers;
use App\Models\Cmodel;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class CmodelController extends Controller
{
    public function index(Request $request){
        $brands = Brand::all();
        if($request->has('searchTerm')){
            $searchTerm = $request->get('searchTerm');
            $brands = Cmodel::searchBrandAndModels($searchTerm);
              
        }
        return view('cmodel.index',compact('brands'));
    }

    public function edit($id){
        $cmodel = Cmodel::find($id);
        return view('cmodel.edit',compact('cmodel'));
    }

    public function update(Cmodel $cmodel,Request $request){
        $newModelName = ['name' => $request->get('name')];
        $cmodel->update($newModelName);
        $brands =  Brand::all();
        return view('cmodel.index',compact('brands'));
    }

    public function delete(Cmodel $cmodel){
         
        $brands = Brand::find($cmodel->brand_id);
        $cmodel->delete();
        if(!(isset($brands->cmodels[0]))){
            $brands->delete();
        }
        return Redirect::route('cmodel.index');
        
        
       
       
    }
}
