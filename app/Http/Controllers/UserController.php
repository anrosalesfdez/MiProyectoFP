<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rules\PasswordOld;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(){

        // Get the currently authenticated user's ID...
        $id = Auth::id();
        // Retrieve a model by its primary key...
        $usuariobd = User::find($id);
        // dd($usuariobd);
        
        return view('settingsuser', ['usuariobd' => $usuariobd]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        
        if($request->input('passwordCurrent')){
            $this->validate($request, $this->rules(), $this->messages());
            return User::findOrFail($id)->update(request()->all()); //ya hace findOrFail por detrás
    }


    }

    public function rules(){
        return [
            'passwordCurrent' => [new PasswordOld],
            'passwordNew' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/', 
        ];
    }

    public function messages(){
        return [
            'passwordNew.required' => 'Server: Nueva contraseña es obligatorio.',
            'passwordNew.confirmed' => 'Server: Nueva y repetición no coinciden.',
            'passwordNew.regex' => 'Server: No cumple reglas la nueva contraseña.',
        ];
    }

    public function prueba(){
        $id = Auth::id();
        // $rstdo = User::where('id', $id)->where('password', Hash::make('Alfa123*'))->first();
        $vieja = User::find($id)->password;
        $rstdo = Hash::check('Alfa123*', $vieja);
        dd($rstdo); // != null;
    }

}
