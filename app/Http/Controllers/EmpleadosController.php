<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empleados;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleado = empleados::all();
        $array=array(
            'status'=>200,
            'msj'=>'consulta exitosa'
        );
        return [
        'data'=>$empleado,
        'response'=>$array
        ];
    }

    public function getdata()
    {
        $empleado = empleados::select('id','empleado')->get();
        return ['data'=>$empleado];
    }

    public function store(Request $request)
    {
        $empleado = new empleados;

        $empleado->nom_empleado = $request->empleado;
        $empleado->ape_empleado = $request->apellido;
        $empleado->sexo_empleado = $request->genero;
        $empleado->tel_empleado = $request->telefono;
        $empleado->num_cedula = $request->cedula;
        $empleado->id_Usuario_k = $request->idusuario_foreign;

        $empleado->save();

        return[
        'msj'=>'guardado exitoso'
        ];
    }

    public function update(Request $request)
    {
        $empleado = empleados::find($request->id);

        $empleado->nom_empleado = $request->empleado;
        $empleado->ape_empleado = $request->apellido;
        $empleado->sexo_empleado = $request->genero;
        $empleado->tel_empleado = $request->telefono;
        $empleado->num_cedula = $request->cedula;
        $empleado->id_Usuario_k = $request->idusuario_foreign;

        $empleado->save();
    }

    public function destroy(Request $request)
    {
        $empleado = empleados::find($request->id);
        $empleado->delete();
    }
}
