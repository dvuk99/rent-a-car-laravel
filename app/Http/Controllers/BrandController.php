<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Cmodel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\BrandRequest;
use DB;
class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('brand.index',compact('brands'));
    }

    public function create(){
        return view('brand.create');
    }

    public function save(BrandRequest $request){
        $carName = $request->get('name');
        $carModel = $request->get('model_name');
        $brands="";
        $brands = Brand::query()->where('name','=',$carName)->get();
        $error = Brand::check($brands,$carModel,$carName);
      
        if(!empty($error))
            return view('brand.create',['error'=>$error]);
                
        return Redirect::route('cmodel.index');
    
    }

    public function edit($id){
        $brand = Brand::find($id);
        return view('brand.edit',compact('brand'));
    }

    public function indexBrand(){
        $brands = Brand::all();
        return view('brand.index-brand',compact('brands'));
    }

    public function update(Brand $brand,Request $request){
         $name = $request->get('name');
         $brand->update(['name'=> $name]);
         $brands =  Brand::all();
         return Redirect::route('cmodel.index');
    }

    public function delete(Brand $brand){
        $brand->delete();
        $brands = Brand::all();
        return view('brand.index-brand',compact('brands'));
    }

    public function getBrandsForCreate($selectedBrandId){
        $brand = Brand::find($selectedBrandId);
        if(isset($brand)){
           
        return response()->json($brand->cmodels);
        }else{
            $obj = (object)[];
            return response()->json($obj);
        }
    }

    public function getBrandsForUpdate($getBrandId){
        $brand = Brand::find($getBrandId);
         return response()->json($brand->cmodels);      
    }
}
