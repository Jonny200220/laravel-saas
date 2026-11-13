@extends('layout.auth')
@section('title')
    Administra Tus Presupuestos
@endsection

@section('auth-contents')
    @if (session('success'))
    <x-alert type="success" :message="session('success')" />
    @endif
    
    <h1 class="text-2xl font-bold text-center">Administra Tus Presupuestos</h1>
    <p class="mt-5 text-center text-gray-600 text-lg">
        Bienvenido a tu dashboard. Aquí podrás administrar tus presupuestos.
    </p>
@endsection