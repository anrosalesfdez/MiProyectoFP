<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    //recoge todos los clientes no eliminados de la BD y los envía a la vista
    public function getClientesNonTrashed(){
        
        $clientes = Cliente::get();
        
        return view('clientes/listar', ['clientes'=> $clientes]);
    }    

    // Recoge un cliente de la BD y lo envía a la vista
    public function getCliente($id){

        $cliente = Cliente::findOrFail($id);
        
        return view('clientes/ver', ['cliente'=> $cliente]);
    } 

    // Show the form for creating a new resource
    public function create() {

        return view('clientes/crear', ['olds' => json_encode(old())]); //errors pasa directamente
    }

    // Store a newly created resource in storage
    public function store(Request $request) {
        
        $this->validate($request, $this->rules(), $this->messages());
        //Laravel will check for errors in the session data, and automatically bind them to the view
        // if they are available

        $nuevoCliente = Cliente::create($request->all());

        return redirect('/clientes/listar');

    }

    // Muestra vista de detalle
    public function vistaEditar($id){ //si le paso $id hay que hacer findOrFail
                                      //si le paso Cliente $cliente ya lo hace internamente
            $editadoCliente = Cliente::findOrFail($id);
            // dd($editadoCliente->razon_social);
            return view('clientes/editar', ['editadocliente' => $editadoCliente, 'olds' => json_encode(old()), 'razonvieja' => json_encode($editadoCliente->razon_social)]);
            //el helper view() permite enviar variables a blade. Aquí envía el objeto editadocliente
            //The old function retrieves an old input value flashed into the session
    }

    // Update the specified resource in storage.
    public function update(Cliente $cliente) {
        
        $this->validate(request(), $this->rules(), $this->messages());
        
        $cliente->update(request()->all()); //ya hace findOrFail por detrás

        return redirect('/clientes/listar');
    }

    // Remove the specified resource from storage.
    public function destroy($id) {

        $cliente = Cliente::findOrFail($id);

        $cliente->delete(); //soft delete
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            //need to mark your "optional" request fields as nullable 
            'razon_social' => 'required|max:50', //bail = stop if first validation fails
            'nif' => 'required|unique:clientes',
            'ambito_cl' => 'required',
            'tipo_cl' => 'required',
            'email' => 'nullable|email:rfc,dns' //necesita la extensión de php
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
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
