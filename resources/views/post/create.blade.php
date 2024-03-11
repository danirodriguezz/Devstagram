@extends('layouts.app')

@section('title')
    Crea una nueva publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            {{-- Formulario donde subir la imagen --}}
            <form 
            action="{{ route('imagenes.store') }}" 
            method="POST"
            enctype="multipart/form-data"
            id="dropzone" 
            class="dropzone border-dashed border-2 w-full h-96 flex flex-col justify-center items-center">
            @csrf
            </form>
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 mx-5 md:m-0">
            <form action="{{ route('post.store') }}" method="POST">
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
                {{-- apartado oculto de la imagen --}}
                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{ old('imagen') }}">
                    @error('imagen')
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