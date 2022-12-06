<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\repuestos;

class RepuestosController extends Controller
{
    public function index()
    {
        $repuesto = repuestos::all();
        $array=array(
            'status'=>200,
            'msj'=>'consulta exitosa'
        );
        return [
        'data'=>$repuesto,
        'response'=>$array
        ];
    }

    public function getdata()
    {
        $repuesto = repuestos::select('id','repuesto')->get();
        return ['data'=>$repuesto];
    }

    public function store(Request $request)
    {
        $repuesto = new repuestos;

        $repuesto->rep_nom = $request->repuesto;
        $repuesto->rep_cant = $request->cantidad;
        $repuesto->rep_precio = $request->precio;
        $repuesto->id_cliente_k = $request->idcliente_foreign;
        $repuesto->id_emp_k = $request->idempresa_foreign;
        $repuesto->cod_fact_k = $request->idfactura_foreign;
        $repuesto->id_prov_k = $request->idproveedor_foreign;

        $repuesto->save();

        return[
        'msj'=>'guardado exitoso'
        ];
    }

    public function update(Request $request)
    {
        $repuesto = repuestos::find($request->id);

        $repuesto->rep_nom = $request->repuesto;
        $repuesto->rep_cant = $request->cantidad;
        $repuesto->rep_precio = $request->precio;
        $repuesto->id_cliente_k = $request->idcliente_foreign;
        $repuesto->id_emp_k = $request->idempresa_foreign;
        $repuesto->cod_fact_k = $request->idfactura_foreign;
        $repuesto->id_prov_k = $request->idproveedor_foreign;

        $repuesto->save();
    }

    public function destroy(Request $request)
    {
        $repuesto = repuestos::find($request->id);
        $repuesto->delete();
    }
}
