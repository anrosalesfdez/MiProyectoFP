<?php

namespace App\Http\Controllers;

use App\UsuarioFactura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsuarioFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(){

        // Get the currently authenticated user's ID... => dato válido pq tienen mismo id
        $id = Auth::id();
        // Retrieve a model by its primary key...
        $usuariofactbd = UsuarioFactura::find($id);
        // dd($usuariofactbd);
        
        return view('settingsfact', ['usuariofactbd' => $usuariofactbd]);
    }

    /**
     * Display emisor fra  of the resource.
     */
     public function get(){

        // Get the currently authenticated user's ID... => dato válido pq tienen mismo id
        $id = Auth::id();
        // Retrieve a model by its primary key...
        $emisor = UsuarioFactura::find($id);
        // dd($usuariofactbd);
        
        return $emisor;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        
        $this->validate($request, $this->rules(), $this->messages());

        $usuariofactbd = UsuarioFactura::findOrFail($id)->update(request()->all());

    }

    public function rules(){
        return [
            'email' => 'nullable|email:rfc,dns' //necesita la extensión de php
        ];
    }

    public function messages(){
        return [
            'email.rfc,dns' => 'Server: Email mal formado.'
        ];
    }
}
