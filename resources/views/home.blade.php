@extends('layouts.app')

@section('title')
    Página principal
@endsection

@section('content')

    <x-listar-post :posts="$posts"/>

@endsection