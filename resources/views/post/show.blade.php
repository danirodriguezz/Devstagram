@extends('layouts.app')

@section('title')
    {{ $post->titulo }}
@endsection

@section('content')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . "/" . $post->imagen }}" alt="{{ $post->titulo }}">
            <div class="p-3">
                <p>0 Likes</p>
            </div>
            <div>
                <p class="font-bold"> {{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                <p class="mt-5">{{ $post->descripcion }}</p>
            </div>
            @auth
                @if ($post->user_id == auth()->user()->id)    
                    <form action="{{ route("post.destroy", $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input
                            type="submit"
                            value="Eliminar publicación"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                @auth
                <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>
                @if (session('mensaje'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{ session('mensaje') }}
                    </div>
                @endif
                <form action="{{ route('comentario.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                    @csrf
                    {{-- Comentarios de los posts --}}
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Comentario</label>
                        <textarea 
                            id="comentario" 
                            name="comentario"
                            placeholder="Agrega un comentario"
                            class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"
                        ></textarea>
                        @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Comentar"
                    class="bg-sky-600 hover:bg-sky-700 tramsition-color cursor-pointer uppercase
                    font-bold w-full rounded-lg p-3 text-white">
                </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('post.index', $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay Comentarios Aún</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection