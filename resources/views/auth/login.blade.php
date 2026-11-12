@extends('layout.auth')
@section('title')
    Inicio de Sesión
@endsection
@section('auth-contents')
    <form class="mt-14 space-y-5" novalidate action="{{ route('login.store') }}" method="POST">
        <div class="flex flex-col gap-2">
            <label class="font-bold text-2xl" for="email">Email</label>

            <input
            id="email"
            type="email"
            placeholder="Email de Registro"
            name="email"
            value="{{ old('email') }}"
            class="w-full border border-gray-300 p-3 rounded-lg" tabindex="1" />
        </div>
        @error('email')
            <p class="text-red-600 text-md text-center">{{ $message }}</p>
        @enderror

        <div class="flex flex-col gap-2">
            <div class="flex  items-center justify-between">
                <label class="font-bold text-2xl">Password</label>
                <a href="#" class="text-indigo-950" tabindex="3">¿Olvidaste tu Contraseña?</a>
            </div>
            <input
            type="password"
            placeholder="Password de Registro"
            name="password"
            value="{{ old('password') }}"
            class="w-full border border-gray-300 p-3 rounded-lg"
            tabindex="2" />
        </div> 
        @error('password')
            <p class="text-red-600 text-md text-center">{{ $message }}</p>
        @enderror

        <input type="submit" value='Iniciar Sesión'
            class="bg-purple-950 hover:bg-purple-800 w-full p-3 rounded-lg text-white font-bold  text-xl cursor-pointer" />
    </form>
@endsection