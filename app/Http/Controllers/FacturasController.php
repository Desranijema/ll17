<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\facturas;

class FacturasController extends Controller
{
    public function index()
    {
        $factura = facturas::all();
        $array=array(
            'status'=>200,
            'msj'=>'consulta exitosa'
        );
        return [
        'data'=>$factura,
        'response'=>$array
        ];
    }

    public function getdata()
    {
        $factura = facturas::select('id','Repuesto_vendido')->get();
        return ['data'=>$factura];
    }

    public function store(Request $request)
    {
        $factura = new facturas;
        $factura->fac_fecha = $request->fecha_factura;
        $factura->rep_vend = $request->Repuesto_vendido;
        $factura->prec_indv = $request->precio_unidad;
        $factura->prec_total = $request->precio_total;
        $factura->cant_indv = $request->cantidad_vendida;
        $factura->cant_total = $request->cantidad_total;

        $factura->save();

        return[
        'msj'=>'guardado exitoso'
        ];
    }

    public function update(Request $request)
    {
        $factura = facturas::find($request->id);

        $factura->fac_fecha = $request->fecha_factura;
        $factura->rep_vend = $request->Repuesto_vendido;
        $factura->prec_indv = $request->precio_unidad;
        $factura->prec_total = $request->precio_total;
        $factura->cant_indv = $request->cantidad_vendida;
        $factura->cant_total = $request->cantidad_total;

        $factura->save();
    }

    public function destroy(Request $request)
    {
        $factura = facturas::find($request->id);
        $factura->delete();
    }
}
