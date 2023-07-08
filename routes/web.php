<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CmodelController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clients',[ClientController::class,'index'])->name('contact.index');
Route::get('/countries',[CountryController::class,'index'])->name('country.index');
Route::get('/clients/create',[ClientController::class,'create'])->name('client.create');
Route::post('/clients',[ClientController::class,'save'])->name('client.save');
Route::get('/clients/{id}/edit',[ClientController::class,'edit'])->name('client.edit');
Route::put('/clients/{client}',[ClientController::class,'update'])->name('client.update');
Route::delete('/clients/{client}',[ClientController::class,'delete'])->name('client.delete');


Route::get('/brands',[BrandController::class,'index'])->name('brand.index');
Route::get('/brands/brand',[BrandController::class,'indexBrand'])->name('brand.indexBrand');
Route::get('/brands/create',[BrandController::class,'create'])->name('brand.create');
Route::post('/brands',[BrandController::class,'save'])->name('brand.save');
Route::get('/brand/{id}/edit',[BrandController::class,'edit'])->name('brand.edit');
Route::put('/brand/{brand}',[BrandController::class,'update'])->name('brand.update');
Route::delete('/brand/{brand}',[BrandController::class,'delete'])->name('brand.delete');


Route::get('/cmodels',[CmodelController::class,'index'])->name('cmodel.index');
Route::get('/cmodels/{id}/edit',[CmodelController::class,'edit'])->name('cmodel.edit');
Route::put('/cmodels/{cmodel}',[CmodelController::class,'update'])->name('cmodel.update');
Route::delete('/cmodels/{cmodel}',[CmodelController::class,'delete'])->name('cmodel.delete');



// Types 

Route::get('/types',[TypeController::class,'index'])->name('type.index');
Route::get('/types/create',[TypeController::class,'create'])->name('type.create');
Route::post('/types',[TypeController::class,'save'])->name('type.save');
Route::get('/types/{id}',[TypeController::class,'edit'])->name('type.edit');
Route::put('/types/{id}/update',[TypeController::class,'update'])->name('type.update');
Route::delete('/types/{type}',[TypeController::class,'delete'])->name('type.delete');

//

Route::get('/vehicles',[VehicleController::class,'index'])->name('vehicle.index');
Route::get('/vehicles/create',[VehicleController::class,'create'])->name('vehicle.create');
Route::get('/brands/cmodels/{selectedBrandId}',[BrandController::class,'fetchData']);
//Route::get('/countries',[CountryController::class,'fetchInsert'])->name('country.index');
