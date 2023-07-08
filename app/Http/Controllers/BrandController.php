<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Cmodel;
use Illuminate\Http\Request;
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
        
        if(isset($brands[0]->name)){
            $models = Cmodel::query()->where('name','=',$carModel)->get();
            if(isset($models[0]->name)){
                return view('brand.create',['error'=>'Model automobila vec postoji u bazi']);
            }else{
                $nizModel = ['name' => $carModel,'brand_id'=>$brands[0]->id];
                Cmodel::create($nizModel);
            }
            
        }else{
            Brand::create(['name'=>$request->get('name')]);
            $idForCar=DB::table('brands')->latest()->first()->id;
            $modelName = $request->get('model_name');
            $modelOfBrand = ['name' => $modelName,'brand_id' => $idForCar];
            Cmodel::create($modelOfBrand);
            
        }
        $brands = Brand::all();
        return view('brand.index',compact('brands'));
    
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
         return view('brand.index-brand',compact('brands'));
    }

    public function delete(Brand $brand){
        $brand->delete();
        $brands = Brand::all();
        return view('brand.index-brand',compact('brands'));
    }

    public function fetchData($selectedBrandId){
        $brand = Brand::find($selectedBrandId);
        return response()->json($brand->cmodels);
    }
}
