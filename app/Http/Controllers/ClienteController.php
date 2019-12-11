<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\Auth;


class ClienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    
    // Recoge un cliente de la BD y lo envía a la vista
    public function getClientes(){

        $clientes = auth()->user()->clientes;

        return $clientes;
    } 


    //recoge todos los clientes no eliminados de la BD y los envía a la vista
    public function listarClientes(){
        
        $clientes = $this->getClientes(); 
        
        return view('clientes/listar', ['clientes'=> $clientes]); //el helper view() permite enviar variables a blade
    }    

    
    // Recoge un cliente de la BD y lo envía a la vista
    public function getCliente($id){
 
        $cliente = $this->getClientes()->find($id);


        return $cliente;
        
    }


    // Recoge un cliente de la BD y lo envía a la vista
    public function verCliente($id){

        $cliente = $this->getCliente($id);
        
        return view('clientes/ver', ['cliente'=> $cliente]);
    }


    // Validate and Store a newly created resource in storage
    public function store(Request $request) {
        
        $this->validate($request, $this->rules(), $this->messages());
        Cliente::create($request->all());

        return redirect('/clientes/listar');

    }


    // Muestra la vista para crear nuevo cliente.
    //Envía dato OLD a la vista en caso de que el envío del form hay dado error en el server.
    //Laravel will check for errors in the session data, and automatically bind them to the view
    public function create() {

        return view('clientes/crear', ['olds' => json_encode(old())]);
    }


    // Update the specified resource in storage.
    public function update(Cliente $cliente) {
        
        //reglas propias para la validación de uddate
        $rules = [
            //need to mark your "optional" request fields as nullable 
            'razon_social' => 'required|max:50', //bail = stop if first validation fails
            'ambito' => 'required',
            'tipo' => 'required',
            'email' => 'nullable|email:rfc,dns' //necesita la extensión de php
        ];
        $this->validate(request(), $rules, $this->messages());
        
        $cliente->update(request()->all()); //ya hace findOrFail por detrás

        return redirect('/clientes/listar');

    }


    // Muestra la vista para editar un cliente ya existente.
    //Envía dato OLD a la vista en caso de que el envío del form hay dado error en el server.
    //Laravel will check for errors in the session data, and automatically bind them to the view
    public function editar($id){ 

        $editadoCliente = $this->getCliente($id);
        // dd($editadoCliente->razon_social);

        return view('clientes/editar', ['editadocliente' => $editadoCliente, 'olds' => json_encode(old()), 'razonvieja' => json_encode($editadoCliente->razon_social)]);
    
    }


    // Remove the specified resource from storage.
    public function destroy($id) {

        $this->getCliente($id)->delete(); //soft delete
    }


    //Get the validation rules that apply to the request.
    public function rules(){
        return [
            //need to mark your "optional" request fields as nullable 
            'razon_social' => 'required|max:50', //bail = stop if first validation fails
            'nif' => 'required|unique:clientes',
            'ambito' => 'required',
            'tipo' => 'required',
            'email' => 'nullable|email:rfc,dns' //necesita la extensión de php
        ];
    }


    //Get the error messages for the defined validation rules.
    public function messages(){
        return [
            'razon_social.required' => 'Server: Es necesario introducir razón social.',
            'razon_social.max' => 'Server: La razon social no puede superar los 50 caracteres',
            'nif.required' => 'Server: Es necesario introducir NIF.',
            'nif.unique' => 'Server: Cliente ya existe.',
            'ambito_cl.required' => 'Server: Es necesario introducir un ámbito para el cliente.',
            'tipo_cl.required' => 'Server: Es necesario introducir un ámbito para el cliente.',
            'email.rfc,dns' => 'Server: Email mal formado.'
        ];
    }
}
