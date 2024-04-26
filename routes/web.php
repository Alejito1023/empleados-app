<?php

use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\EmpleadoController;
use App\Models\Asistencia;
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
Route::post('/asistencias', [AsistenciaController::class,'store'])->name('asistencias.store');
Route::get('/asistencias/create', [AsistenciaController::class,'create'])->name('asistencias.create');
Route::delete('/asistencias/{asistencia}', [AsistenciaController::class,'destroy'])->name('asistencias.destroy');
Route::put('/asistencias/{asistencia}', [AsistenciaController::class,'update'])->name('asistencias.update');