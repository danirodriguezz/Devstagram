@extends('layouts.app')

@section('title')
    Crea una nueva publicación
@endsection

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            Imagen aquí
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 mx-5 md:m-0">
            <form action="{{ route('crear-cuenta.store') }}" method="POST">
                @csrf
                {{-- Titulo de la publicación --}}
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">Título</label>
                    <input 
                        id="titulo" 
                        name="titulo" 
                        type="text" 
                        placeholder="Título de la publicación"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        value="{{ old('titulo') }}">
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Descripcion de la publicacion --}}
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">Descripción</label>
                    <textarea 
                        id="descripcion" 
                        name="descripcion"
                        placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror"
                    >{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Crear publicación"
                class="bg-sky-600 hover:bg-sky-700 tramsition-color cursor-pointer uppercase
                font-bold w-full rounded-lg p-3 text-white">
            </form>
        </div>
    </div>
@endsection