<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CmodelController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;


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
Route::get('/cmodels',[CmodelController::class,'create']);
Route::get('/vehicles',[VehicleController::class,'index'])->name('vehicle.index');
Route::get('/brands',[BrandController::class,'index'])->name('brand.index');
Route::get('/brands/create',[BrandController::class,'create'])->name('brand.create');
Route::post('/brands',[BrandController::class,'save'])->name('brand.save');
//Route::get('/countries',[CountryController::class,'fetchInsert'])->name('country.index');
