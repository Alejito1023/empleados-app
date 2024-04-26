<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empleados', [EmpleadoController::class,'index'])->name('empleados.index');
Route::post('/empleados', [EmpleadoController::class,'store'])->name('empleados.store');
Route::get('/empleados/create', [EmpleadoController::class,'create'])->name('empleados.create');
Route::delete('/empleados/{empleado}', [EmpleadoController::class,'destroy'])->name('empleados.destroy');
Route::put('/empleados/{empleado}', [EmpleadoController::class,'update'])->name('empleados.update');
Route::get('/empleados/{empleado}/edit', [EmpleadoController::class,'edit'])->name('empleados.edit');

Route::get('/asistencias', [AsistenciaController::class,'index'])->name('asistencias.index');
