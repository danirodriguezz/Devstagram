<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        // Subir Imagen al servidor
        $manager = new ImageManager(new Driver());
        $imagen = $manager->read($request->file('file'));
        $nombreImagen = Str::uuid() . "." . $request->file('file')->extension();
        $imagenPath = public_path('uploads') . "/" . $nombreImagen;
        $imagen->cover(1000, 1000);
        $imagen->save($imagenPath);
        return response()->json([ 'imagen' => $nombreImagen ]);
    }
}
