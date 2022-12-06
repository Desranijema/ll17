<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cotizaciones;

class CotizacionesController extends Controller
{
    public function index()
    {
        $cotizacion = cotizaciones::all();
        $array=array(
            'status'=>200,
            'msj'=>'consulta exitosa'
        );
        return [
        'data'=>$cotizacion,
        'response'=>$array
        ];
    }

    public function getdata()
    {
        $cotizacion = cotizaciones::select('id','repuesto_cotizado')->get();
        return ['data'=>$cotizacion];
    }

    public function store(Request $request)
    {
        $cotizacion = new cotizaciones;

        $cotizacion->cot_fecha = $request->fecha_cotizacion;
        $cotizacion->cot_precio_total = $request->precio_total;
        $cotizacion->cot_precio_indv = $request->precio_individual;
        $cotizacion->cot_rep = $request->repuesto_cotizado;
        $cotizacion->cot_cant = $request->cantidad_cotizada;

        $cotizacion->save();

        return[
        'msj'=>'guardado exitoso'
        ];
    }

    public function update(Request $request)
    {
        $cotizacion = cotizaciones::find($request->id);

        $cotizacion->cot_fecha = $request->fecha_cotizacion;
        $cotizacion->cot_precio_total = $request->precio_total;
        $cotizacion->cot_precio_indv = $request->precio_individual;
        $cotizacion->cot_rep = $request->repuesto_cotizado;
        $cotizacion->ccot_cant = $request->cantidad_cotizada;

        $cotizacion->save();
    }

    public function destroy(Request $request)
    {
        $cotizacion = cotizaciones::find($request->id);
        $cotizacion->delete();
    }
}
