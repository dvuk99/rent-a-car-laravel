<?php

namespace App\Http\Controllers;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TypeRequest;

class TypeController extends Controller
{
    public function index(){
        $types = Type::all();
        return view('type.index',compact('types'));
    }

    public function create(){
        return view('type.create');
    }

    public function save(TypeRequest $request){
             Type::query()->create($request->validated());
             $types = Type::all();
             return view('type.index',compact('types'));
    }

    public function edit($id){
     $type = Type::find($id);
     return view('type.edit',compact('type'));
    }

    public function update($id,TypeRequest $request){
        $type=Type::find($id);
        $type->update($request->validated());
        return Redirect::route('type.index');
    }
    public function delete(Type $type){
             $type->delete();
             return Redirect::route('type.index');
    }
}
