<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacturaLinea;

class FacturaLineaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request) {
        // $this->validate($request, $this->rules(), $this->messages());
        $lineas = $request->all();
        foreach ($lineas['lineas'] as $value) {
            $value['producto_id'] = $value['producto']['id'];
            $value['producto_nombre'] = $value['producto']['nombre'];
            $value['producto_descripcion'] = $value['producto']['descripcion'];
            $value['producto_precio'] = $value['producto']['precio'];
            $value['producto_unidad'] = $value['producto']['unidad'];
            $value['producto_act_impto'] = $value['producto']['actividades_impuesto'];
            FacturaLinea::create($value);
        }
        
    }
}
