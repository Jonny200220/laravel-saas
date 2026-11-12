@extends('layout.auth')
@section('title')
    Administra Tus Presupuestos
@endsection

@section('auth-contents')
    @if (session('success'))
    <p class="my-10 text-center border border-green-400 bg-green-100 text-green-700 py-2 rounded-md text-sm">
            {{ session('success') }}
    @endif
    <h1 class="text-2xl font-bold text-center">Administra Tus Presupuestos</h1>
    <p class="mt-5 text-center text-gray-600 text-lg">
        Bienvenido a tu dashboard. Aquí podrás administrar tus presupuestos.
    </p>
@endsection