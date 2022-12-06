<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cargos;

class CargosController extends Controller
{
    public function index()
    {
        $cargos = cargos::all();
        $array=array(
            'status'=>200,
            'msj'=>'consulta exitosa'
        );
        return [
        'data'=>$cargos,
        'response'=>$array
        ];
    }

    public function getdata()
    {
        $cargos = cargos::select('id','nombre')->get();
        return ['data'=>$cargos];
    }

    public function store(Request $request)
    {
        $cargo = new cargos;

        $cargo->nombre = $request->nombre;
        $cargo->descripcion = $request->descripcion;

        $cargo->save();

        return[
        'msj'=>'guardado exitoso'
        ];
    }

    public function update(Request $request)
    {
        $cargo = cargos::find($request->id);

        $cargo->nombre = $request->nombre;
        $cargo->descripcion = $request->descripcion;

        $cargo->save();
    }

    public function destroy(Request $request)
    {
        $cargo = cargos::find($request->id);
        $cargo->delete();
    }
}
