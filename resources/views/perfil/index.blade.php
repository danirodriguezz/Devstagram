@extends('layouts.app')

@section('title')
    Editar perfil: {{ auth()->user()->username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0" method="POST" action="{{route('perfil.store')}}" enctype="multipart/form-data">
                @csrf
                {{-- Nombre del Usuario --}}
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario  "
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Email del Usuario --}}
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">E-mail</label>
                    <input id="email" name="email" type="email" placeholder="Tu email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ auth()->user()->email }}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Imagen perfil --}}
                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen</label>
                    <input
                        id="imagen" 
                        name="imagen" 
                        type="file" 
                        accept=".jpg, .jpeg, .png" 
                        class="border p-3 w-full rounded-lg">
                </div>
                {{-- Boton para Actualizar Perfil --}}
                <input 
                    type="submit" 
                    value="Actualizar perfil"
                    class="bg-sky-600 hover:bg-sky-700 tramsition-color cursor-pointer uppercase
                font-bold w-full rounded-lg p-3 text-white">
            </form>
        </div>
    </div>
@endsection
