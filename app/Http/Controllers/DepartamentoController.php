<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use Illuminate\Support\Facades\DB;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        //$departamentos = Departamento::all();
        $departamentos = DB::table('departamentos')
        ->join("empleados","departamentos.id", "=" , "empleados.departamento_id")
        ->select("departamentos.*", "empleados.emp_nomb")
        ->get();
        return view('departamento.index', ['departamentos' => $departamentos]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $empleados = DB::table('empleados')
        ->orderBy('emp_nomb')
        ->get();

        return view ('departamento.new' , ['empleados' => $empleados]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $departamento = new Departamento();
        
        
        $departamento->dep_nomb = $request->name;
        $departamento->ubicacion = $request->ubicacion;
        $departamento->numero_telefonico = $request->numero_telefonico;
        $departamento->save();

        $departamentos = DB::table('departamentos')
        ->join('empleados', 'departamentos.id', '=' , 'empleados.departamento_id')
        ->select('departamentos.*', 'empleados.emp_nomb')
        ->get();

        return view ('departamento.index' , ['departamentos' => $departamentos]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $departamento = Departamento::find($id);
        $empleados = DB::table('empleados')
    
        ->orderBy('emp_nomb')
        ->get();

        return view ('departamento.edit' , ['departamento' => $departamento,'empleados' => $empleados]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $departamento = Departamento::find($id);

        $departamento->id = $request->code;
        $departamento->dep_nomb = $request->name;
        $departamento->ubicacion = $request->ubicacion;
        $departamento->numero_telefonico = $request->numero_telefonico;
        $departamento->save();

        $departamentos = DB::table('departamentos')
        ->join('empleados', 'departamentos.empleado_id', '=' , 'empleados.id')
        ->select('departamentos.*', 'empleados.emp_nomb')
        ->get();

        return view ('departamento.index' , ['departamentos' => $departamentos]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $departamento = Departamento::find($id);
        $departamento->delete();

        $departamentos = DB::table('departamentos')
        ->join('empleados', 'departamentos.empleado_id', '=' , 'empleados.id')
        ->select('departamentos.*', 'empleados.emp_nomb')
        ->get();

        return view ('departamento.index' , ['departamentos' => $departamentos]);
    }
}
