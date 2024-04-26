<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empleados', [EmpleadoController::class,'index'])->name('empleados.index');
Route::post('/empleados', [EmpleadoController::class,'store'])->name('empleados.store');
Route::get('/empleados/create', [EmpleadoController::class,'create'])->name('empleados.create');
