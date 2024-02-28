<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        /* Envio de datos del formulario de crear cuenta */

        // Módificamos el request para el username
        $request->request->add(['username' => Str::slug($request->username)]);
        
        // Validacion del formulario
        $request->validate([
            'name' => 'required|max:30|alpha:ascii',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6'
        ]);

        // Crear el registro del usuario
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        // Redireccionando
        return redirect()->route('post.index');
    }
}
