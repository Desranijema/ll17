<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuario = usuarios::all();
        $array=array(
            'status'=>200,
            'msj'=>'consulta exitosa'
        );
        return [
        'data'=>$usuario,
        'response'=>$array
        ];
    }

    public function getdata()
    {
        $usuario = usuarios::select('id','usuario')->get();
        return ['data'=>$usuario];
    }

    public function store(Request $request)
    {
        $usuario = new usuarios;

        $usuario->nom_usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->cargo = $request->cargo;
        $usuario->id_Cargo_k = $request->idcargo_foreign;

        $usuario->save();

        return[
        'msj'=>'guardado exitoso'
        ];
    }

    public function update(Request $request)
    {
        $usuario = usuarios::find($request->id);

        $usuario->nom_usuario = $request->usuario;
        $usuario->clave = $request->clave;
        $usuario->cargo = $request->cargo;
        $usuario->id_Cargo_k = $request->idcargo_foreign;

        $usuario->save();
    }

    public function destroy(Request $request)
    {
        $usuario = usuarios::find($request->id);
        $usuario->delete();
    }
}
