<?php

namespace App\Http\Controllers;

use App\UsuarioFactura;

use Illuminate\Http\Request;

class UsuarioFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(){
        
        $usuariofactbd = UsuarioFactura::get();
        
        return view('settingsfact', ['usuariofactbd' => $usuariofactbd]);
    }
}
