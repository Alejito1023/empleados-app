<?php

namespace App\Http\Controllers;
use App\Models\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$empleados = Empleado::all();
        $empleados = DB::table("empleados")
        ->join("departamentos","empleados.departamento_id", "=" , "departamentos.id")
        ->select("empleados.*", "departamentos.dep_nomb")
        ->get();

        return view('empleado.index',['empleados'=>$empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $departamentos = DB::table('departamentos')
        ->orderBy('dep_nomb')
        ->get();

        return view ('empleado.new' , ['departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $empleado = new Empleado();
        // $empleado->comu_codi = $request->id;
        // El codigo de empleado es auto incremental
        $empleado->nombre = $request->name;
        $empleado->departamento_id = $request->code;
        $empleado->save();

        $empleados = DB::table('empleados')
        ->join('departamentos', 'empleados.departamento_id', '=' , 'departamentos.id')
        ->select('empleados.*', 'departamentos.dep_nomb')
        ->get();

        return view ('empleado.index' , ['empleados' => $empleados]);
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
    public function edit( $id)
    {
        //
        $empleado = Empleado::find($id);
        $departamentos = DB::table('departamentos')
    
        ->orderBy('dep_nomb')
        ->get();

        return view ('empleado.edit' , ['empleado' => $empleado,'departamentos' => $departamentos]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $empleado = Empleado::find($id);
        // $empleado->comu_codi = $request->id;
        // El codigo de empleado es auto incremental
        $empleado->nombre = $request->name;
        $empleado->departamento_id = $request->code;
        $empleado->save();

        $empleados = DB::table('empleados')
        ->join('departamentos', 'empleados.departamento_id', '=' , 'departamentos.id')
        ->select('empleados.*', 'departamentos.dep_nomb')
        ->get();

        return view ('empleado.index' , ['empleados' => $empleados]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $empleado = Empleado::find($id);
        $empleado->delete();

        $empleados = DB::table('empleados')
        ->join('departamentos', 'empleados.departamento_id', '=' , 'departamentos.id')
        ->select('empleados.*', 'departamentos.dep_nomb')
        ->get();

        return view ('empleado.index' , ['empleados' => $empleados]);
    }
}
