<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    //TODO: mensajes personalizados de error...

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
        //validador de LaRAVEL
        $this->validate($request, [
            'nombre' => 'required|string|max:20',
            'descripcion' => 'nullable|string|max:50',
            'precio' => 'required|numeric',
            'unidad' => 'required|max:10'
        ]);

        Producto::create($request->all());
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
        //validador de LaRAVEL
        $this->validate($request, [
            'nombre' => 'required|string|max:20',
            'descripcion' => 'nullable|string|max:50',
            'precio' => 'required|numeric',
            'unidad' => 'required|max:10'
        ]);

        $producto = Producto::findOrFail($id)->update(request()->all()); //ya hace findOrFail por detrás
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
        $producto = Producto::findOrFail($id)->delete(); //soft delete
        $productos = Producto::get();

        return $productos;
    }
}
