@extends('layouts.app')

@section('Titulo')
    Login for Devstagram
@endsection

@section('content')
    <div class="lg:flex lg:justify-center p-4 lg:gap-10 lg:items-center">
        <div class="lg:w-3/6 mb-2">
            <img src="{{ asset('img/login.jpg') }}" alt="login image">
        </div>
        <div class="lg:w-2/6 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if (session("mensaje"))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ session("mensaje") }}</p>
                @endif
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">E-mail</label>
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>
                    @enderror
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Your Personal E-mail"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}"
                        />
                </div>
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>
                    @enderror
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Your Password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                </div>
                <input 
                    type="submit" 
                    value="Log in"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase rounded-xl font-bold w-full p-3 text-white ">
            </form>
        </div>
    </div>
@endsection
