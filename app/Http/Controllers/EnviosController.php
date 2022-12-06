<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\envios;

class EnviosController extends Controller
{
    public function index()
    {
        $envio = envios::all();
        $array=array(
            'status'=>200,
            'msj'=>'consulta exitosa'
        );
        return [
        'data'=>$envio,
        'response'=>$array
        ];
    }

    public function getdata()
    {
        $envio = envios::select('id','empresa')->get();
        return ['data'=>$envio];
    }

    public function store(Request $request)
    {
        $envio = new envios;

        $envio->emp_nom = $request->empresa;
        $envio->emp_tel = $request->telefono;
        $envio->emp_correo = $request->email;

        $envio->save();

        return[
        'msj'=>'guardado exitoso'
        ];
    }

    public function update(Request $request)
    {
        $envio = envios::find($request->id);

        $envio->emp_nom = $request->empresa;
        $envio->emp_tel = $request->telefono;
        $envio->emp_correo = $request->email;

        $envio->save();
    }

    public function destroy(Request $request)
    {
        $envio = envios::find($request->id);
        $envio->delete();
    }
}
