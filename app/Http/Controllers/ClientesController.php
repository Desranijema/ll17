<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\clientes;

class ClientesController extends Controller
{
    public function index()
    {
        $cliente = clientes::all();
        $array=array(
            'status'=>200,
            'msj'=>'consulta exitosa'
        );
        return [
        'data'=>$cliente,
        'response'=>$array
        ];
    }

    public function getdata()
    {
        $cliente = clientes::select('id','nombre')->get();
        return ['data'=>$cliente];
    }

    public function store(Request $request)
    {
        $cliente = new clientes;

        $cliente->clie_nom = $request->nombre;
        $cliente->clie_ape = $request->apellido;
        $cliente->clie_tel = $request->telefono;
        $cliente->clie_dir = $request->direccion;
        $cliente->clie_correo = $request->email;
        $cliente->id_empleado_k = $request->idempleado_foreign;
        $cliente->id_cot_k = $request->idcotizacion_foreign;

        $cliente->save();

        return[
        'msj'=>'guardado exitoso'
        ];
    }

    public function update(Request $request)
    {
        $cliente = clientes::find($request->id);

        $cliente->clie_nom = $request->nombre;
        $cliente->clie_ape = $request->apellido;
        $cliente->clie_tel = $request->telefono;
        $cliente->clie_dir = $request->direccion;
        $cliente->clie_correo = $request->email;
        $cliente->id_empleado_k = $request->idempleado_foreign;
        $cliente->id_cot_k = $request->idcotizacion_foreign;

        $cliente->save();
    }

    public function destroy(Request $request)
    {
        $cliente = clientes::find($request->id);
        $cliente->delete();
    }
}
