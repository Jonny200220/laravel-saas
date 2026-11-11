@extends('layout.base')

@section('title', 'Página no encontrada')

@section('contents')
    <main class="mx-auto flex min-h-screen max-w-2xl items-center justify-center p-6">
        <div class="flex w-full flex-col items-center gap-8 bg-white p-10 text-center shadow-lg">
            <div class="flex flex-col items-center gap-4">
                <p class="text-8xl font-bold text-purple-950">404</p>
                <h1 class="text-4xl font-bold">Página no encontrada</h1>
                <p class="max-w-md text-lg text-gray-600">Esta dirección no existe.</p>
            </div>

            <a href="{{ url('/') }}"
                class=" inline-block rounded-lg bg-purple-950 px-12 py-4 text-2xl font-bold text-white hover:bg-purple-800 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-950">
                Ir al inicio
            </a>
        </div>
    </main>
@endsection
