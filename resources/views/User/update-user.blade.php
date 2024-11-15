@extends('layouts.sub-app')

@section('contenido')
    <div class="">
        <button class="bg-blue-600 p-2 rounded text-white hover:bg-blue-700 transition-colors">
            <a href="/">Volver</a>
        </button>
    </div>

    <form action="{{ route('update_user', $user->id) }}" method="POST"
        class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg" autocomplete="off" novalidate>
        @csrf
        @method('PUT')
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Formulario de {{ $user->name }}</h2>

        <!-- Nombre -->
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="name" name="name"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Ingresa tu nombre" value="{{ $user->name }}">
            @error('name')
                <p class="text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input type="email" id="email" name="email"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Ingresa tu correo electrónico" value="{{ $user->email }}">
            @error('email')
                <p class="text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <!-- DNI -->
        <div class="mb-4">
            <label for="dni" class="block text-sm font-medium text-gray-700">DNI</label>
            <input type="text" id="dni" name="dni"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Ingresa tu DNI" value="{{ $user->dni }}">
            @error('dni')
                <p class="text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botón de enviar -->
        <div class="mb-4">
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Enviar
            </button>
        </div>
    </form>
@endsection
