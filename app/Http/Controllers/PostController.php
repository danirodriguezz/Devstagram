<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public  function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user)
    {
        /* 
            En este modelo obtemos lso posts y devolvemos la vista del muro
            de cada usuario.
        */
        // Una forma de obtener los post asociados a cada usuario
        $posts = Post::where('user_id', $user->id)->paginate(20);
        // Devolvemos la vista con los usuarios y los posts
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create()
    {
        /* 
            En este modelo devolvemos la vista de formulario para
            crear un post
        */
        return view('post.create');
    }

    public function store(Request $request)
    {
        /* 
            En este modelo de store verificamos y validamos el formulario
            de subida de posts y los guardamos en la base de datos
        */
        // Validamos el formulario que se envía
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        // Una forma de crear Post
        /*
        Post::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
        */

        // Esta es otra forma
        /* 
        $post = new Post;
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id;
        $post->save();
        */

        // Esta sería otra forma
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('post.index', auth()->user()->username);
    }

    public function show(User $user, Post $post)
    {
        return view('post.show', [
            'post' => $post,
            'user' => $user
        ]);
    }
}
