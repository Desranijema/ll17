<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proveedores;

class ProveedoresController extends Controller
{
    public function index()
    {
        $proveedor = proveedores::all();
        $array=array(
            'status'=>200,
            'msj'=>'consulta exitosa'
        );
        return [
        'data'=>$proveedor,
        'response'=>$array
        ];
    }

    public function getdata()
    {
        $proveedor = proveedores::select('id','proveedor')->get();
        return ['data'=>$proveedor];
    }

    public function store(Request $request)
    {
        $proveedor = new proveedores;

        $proveedor->prov_nom = $request->proveedor;
        $proveedor->prov_tel = $request->telefono;
        $proveedor->prov_correo = $request->email;

        $proveedor->save();

        return[
        'msj'=>'guardado exitoso'
        ];
    }

    public function update(Request $request)
    {
        $proveedor = proveedores::find($request->id);

        $proveedor->prov_nom = $request->proveedor;
        $proveedor->prov_tel = $request->telefono;
        $proveedor->prov_correo = $request->email;

        $proveedor->save();
    }

    public function destroy(Request $request)
    {
        $proveedor = proveedores::find($request->id);
        $proveedor->delete();
    }
}
