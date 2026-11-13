@extends('layout.auth')
@section('title')
    Verificar Email
@endsection

@section('auth-contents')
    <p class="mt-5 text-center text-gray-600 text-lg">Tu cuenta ha sido creada correctamente. Por favor, verifica tu email para continuar.</p>

    <form method="POST" action="{{ route('verification.send') }}">
        <input
        type="submit"
        class="bg-amber-500 w-full text-center mt-5 px-5 py-2 rounded-md text-white cursor-pointer font-bold"
        value="Reenviar email de verificación"
        />
    </form>
@endsection