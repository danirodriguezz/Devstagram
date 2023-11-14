@extends('layouts.app')

@section('Titulo')
    Sign up for Devstagram
@endsection

@section('content')
    <div class="lg:flex lg:justify-center p-4 lg:gap-10 lg:items-center">
        <div class="lg:w-3/6 mb-2">
            <img src="{{ asset('img/registrar.jpg') }}" alt="register image">
        </div>
        <div class="lg:w-2/6 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Full Name</label>
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>
                    @enderror
                    <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            placeholder="Your Name"
                            class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                            value="{{ old('name') }}" 
                            />
                </div>
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }}</p>
                    @enderror
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Your Username"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}"
                        />
                </div>
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
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repeat
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        placeholder="Repeat your password" class="border p-3 w-full rounded-lg">
                </div>
                <input 
                    type="submit" 
                    value="Create Account"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase rounded-xl font-bold w-full p-3 text-white ">
            </form>
        </div>
    </div>
@endsection
