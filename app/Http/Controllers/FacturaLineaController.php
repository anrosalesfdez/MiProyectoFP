<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturaLineaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request) {
        dd($request);
        // $this->validate($request, $this->rules(), $this->messages());
        $linea = FacturaLinea::create($request->all());
        return redirect('/facturas/listar');

    }
}
