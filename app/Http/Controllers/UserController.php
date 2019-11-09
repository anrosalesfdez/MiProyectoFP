<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(){
        
        $usuariobd = User::get();
        
        return view('settingsuser', ['usuariobd' => $usuariobd]);
    }
}
