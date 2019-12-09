<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
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


    /**
     * Get a listing of the resource.
     */
    public function getProductos(){
        
        $productos = Producto::where("users_id", "=", auth()->user()->id)->get();
        //si utilizase el belongsTo user, no necesita el get()
        //$productos = auth()->user()->productos();
        
        return $productos;
    }


    /**
     * Display a listing of the resource.
     */
     public function listarProductos(){
        
        $productos = $this->getProductos();
        
        return view('productos', ['productos' => $productos]);
    }


    /**
     * Get a listing of the resource.
     */
     public function getProducto($id){

        // $producto = Producto::where("users_id", "=", auth()->user()->id)
        //                         ->where("id", "=", $id)
        //                         ->first();
        $producto = auth()->user()->find($id);
        
        return $producto;
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
        
        $productos = $this->getProductos();

        return $productos;

    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $this->validate($request, $this->rules(), $this->messages());

        $producto = Producto::findOrFail($id)->update(request()->all());

        $productos = $this->getProductos();

        return $productos;
    }

    //recoge actividad del producto
    public function getCnae($idPto){
        $actividad = Producto::find($idPto)->actividad;

        return $actividad;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

        $producto = $this->getProducto($id)->delete(); //soft delete
        
        $productos = $this->getProductos();

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
