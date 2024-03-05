@extends('layouts.app')

@section('title')
    @if (auth()->user()->username == $user->username)
        Tu cuenta
    @else
        Perfil:{{ $user->username }}
    @endif
@endsection

@section('content')
<div class="flex justify-center">
    <div class="flex flex-col items-center w-full md:w-8/12 lg:w-6/12 md:flex-row">
        <div class="w-8/12 lg:w-6/12 px-5">
            <img src="{{ asset('img/usuario.svg') }}" alt="Imagen usuario">
        </div>
        <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
            <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
            <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                0
                <span class="font-normal">Seguidores</span>
            </p>
            <p class="text-gray-800 text-sm mb-3 font-bold">
                0
                <span class="font-normal">Siguiendo</span>
            </p>
            <p class="text-gray-800 text-sm mb-3 font-bold">
                0
                <span class="font-normal">Publicaciones</span>
            </p>
        </div>
    </div>
</div>
@endsection