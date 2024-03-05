<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validando los campos del login
        $this->validate($request, [
            "email" => "required|email|max:60",
            "password" => "required"
        ]);

        //Autenticando al usuario
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with("mensaje", "Credenciales Incorrectas");
        }

        // Redirecionamos al usuario
        return redirect()->route('post.index', [
            'user' => auth()->user()->username
        ]);
    }
}
