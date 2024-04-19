<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('perfil.index');
    }
    public function store(Request $request)
    {
        // Módificamos el request para el username
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,editar-perfil'],
            'email' => ['required', 'unique:users,email,' . auth()->user()->id, 'email', 'max:60']
        ]);

        // Obtenemos el usuario
        $usuario = User::find(auth()->user()->id);

        if($request->imagen) {
            if($usuario->imagen) {
                // Si ya tenia imagen eliminar la anterior
                $imagen_path = public_path('perfiles/' . $usuario->imagen);
                if(File::exists($imagen_path)) {
                    unlink($imagen_path);
                }
            }
            // Subir la imagen al servidor
            $manager = new ImageManager(new Driver());
            $imagen = $manager->read($request->file('imagen'));
            $nombreImagen = Str::uuid() . "." . $request->file('imagen')->extension();
            $imagenPath = public_path('perfiles') . "/" . $nombreImagen;
            $imagen->cover(1000, 1000);
            $imagen->save($imagenPath);
        }

        // Guardar cambios
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();

        //Redireccionar
        return redirect()->route('post.index', $usuario->username);
    }
}
