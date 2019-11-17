<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        
        $productos = Producto::get();
        
        return view('productos', ['productos' => $productos]);
    }

    /**
     * Send a listing of the resource.
     */
     public function get(){
        
        return Producto::get();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $this->validate($request, $this->rules(), $this->messages());

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
    public function actualizar(Request $request, $id){
        
        $this->validate($request, $this->rules(), $this->messages());

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
    public function destroy($id){

        $producto = Producto::findOrFail($id)->delete(); //soft delete
        $productos = Producto::get();

        return $productos;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'nombre' => 'required|string|max:20',
            'descripcion' => 'nullable|string|max:50',
            'precio' => 'required|numeric',
            'unidad' => 'required|max:10'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(){
        return [
            'nombre.required' => 'Server: NOMBRE es campo obligatorio.',
            'nombre.string' => 'Server: NOMBRE, campo texto.',
            'nombre.min' => 'Server: NOMBRE, logitud máxima de 20 caracteres.',
            'descripcion.string' => 'Server: DESCRIPCION, campo texto.',
            'descripcion.min' => 'Server: DESCRIPCION, logitud máxima de 50 caracteres.',
            'precio.required' => 'Server: PRECIO es campo obligatorio.',
            'precio.numeric' => 'Server: PRECIO, campo numérico.',
            'unidad.required' => 'Server: UNIDAD es campo obligatorio.',
            'unidad.min' => 'Server: UNIDAD, longitud máxima de 10 caracteres.'
        ];
    }
}
