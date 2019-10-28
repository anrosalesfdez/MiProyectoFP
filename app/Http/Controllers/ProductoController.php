<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::get();
        return view('productos', ['productos' => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar 
        $messages = [
            'nombre.required' => 'Es necesario introducirun nombre.',
            'descripcion.max:50' => 'Descripcion, máximo 50 caracteres',
            'precio.required' => 'Es necesario introducir un precio.',
        ];
        $rules = [
            'nombre' => 'required',
            'descripcion' => 'max:50',
            'precio' => 'required',
        ];
        $this->validate($request, $rules, $messages);
        //Laravel will check for errors in the session data, and automatically bind them to the view
        // if they are available
        $nuevoProducto = Producto::create($request->all());
        $productos = Producto::get();

        return $productos;
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        //validar 
        $messages = [
            'nombre.required' => 'Es necesario introducirun nombre.',
            'descripcion.max:50' => 'Descripcion, máximo 50 caracteres',
            'precio.required' => 'Es necesario introducir un precio.',
        ];
        $rules = [
            'nombre' => 'required',
            'descripcion' => 'max:50',
            'precio' => 'required',
        ];
        $this->validate($request, $rules, $messages);

        $producto = Producto::find($id);
        $producto->update(request()->all()); //ya hace findOrFail por detrás

        $productos = Producto::get();

        return $productos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->delete(); //soft delete

        $productos = Producto::get();

        return $productos;
    }
}
