<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request);
        // Modificar el request para que funcione la validacion
        $request->request->add(["username" => Str::slug($request->username)]);
        // Validacion
        $this->validate($request, [
            "name" => "required|max:25|min:2",
            "username" => "required|max:25|min:2|unique:users",
            "email" => "required|email|max:255|unique:users",
            "password" => "required|confirmed|min:6",
        ]);
        // Creamos el usuario usando el modelo User
        User::create([
            "name" => $request->name,
            "username" => Str::slug($request->username),
            "email" => $request->email,
            "password" => $request->password
        ]);

        // Autenticar al usuario
        auth()->attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        // Una vez creado redireccionamos al usuario
        return redirect()->route("post.index");
    }
}
