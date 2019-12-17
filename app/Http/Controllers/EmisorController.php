<?php

namespace App\Http\Controllers;

use App\Emisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EmisorController extends Controller
{
    /**
     * Recoge datos de emisor en BD
     */
     public function getEmisor(){
        // $emisor = Emisor::where('users_id', "=", auth()->user()->id)->get();
        $emisor = auth()->user()->emisor;
        return $emisor;
    }


    /**
     * Muestra vista con esos datos de emisor.
     */
     public function index(){
        $usuariofactbd = $this->getEmisor();
        return view('emisor', ['usuariofactbd' => $usuariofactbd]);

    }


    /**
     * BASE DATOS. Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $this->validate($request, $this->rules(), $this->messages());
        Emisor::findOrFail($id)->update(request()->all());
        
    }


    //REGLAS DE VALIDACIÓN Y MENSAJES PARA ERRORES EN UPDATE
    public function rules(){
        return [
            'nif' => 'required',
            'niva' => 'nullable', //si no emite facturas fuera de España no es obligatorio
            'nombre_fiscal' => 'required|max:50',
            'nombre_comercial' => 'nullable|max:50',
            'direccion_fiscal' => 'required|max:100',
            'direccion_comercial' => 'nullable|max:100',
            'cp_fiscal' => 'required',
            'provincia_fiscal' => 'required',
            'pais_fiscal' => 'required',
            'email' => 'nullable|email:rfc,dns', //necesita la extensión de php
            'telefono' => 'nullable|regex:/^[0-9]{7,15}$/',
        ];
    }

    public function messages(){
        return [
            'nif.required' => 'NIF es campo obligatorio',
            'nombre_fiscal.required' => 'Nombre fiscal es campo obligatorio',
            'direccion_fiscal.required' => 'Dirección fiscal  es campo obligatorio',
            'cp_fiscal.required' => 'Código postal  es campo obligatorio',
            'provincia_fiscal.required' => 'Ciudad es campo obligatorio',
            'pais_fiscal.required' => 'País es campo obligatorio',

            'nombre_fiscal.max' => 'Nombre fiscal máximo 50 caracteres',
            'nombre_comercial.max' => 'Nombre comercial máximo 50 caracteres',
            'direccion_fiscal.max' => 'Dirección fiscal máximo 100 caracteres',
            'direccion_comercial.max' => 'Dirección comercial máximo 100 caracteres',
            'telefono.max' => 'Teléfono mínimo 7 y máximo 15 caracteres',

            'email.rfc,dns' => 'Server: Email mal formado.'
            
        ];
    }
}
