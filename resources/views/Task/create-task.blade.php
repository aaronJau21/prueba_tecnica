@extends('layouts.sub-app')

@section('contenido')
    <div class="mb-4">
        <button class="bg-blue-600 p-2 rounded text-white hover:bg-blue-700 transition-colors">
            <a href="{{ route('list_task') }}">Volver</a>
        </button>
    </div>

    <form action="{{ route('create_task') }}" method="POST" class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg"
        autocomplete="off" novalidate>
        @csrf
        <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Formulario de Registro</h2>

        <!-- Titulo -->
        <div class="mb-4">
            <label for="titulo" class="block text-sm font-medium text-gray-700">Titulo</label>
            <input type="text" id="titulo" name="titulo"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Ingresa Título" value="{{ old('titulo') }}">
            @error('titulo')
                <p class="text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <!-- Descripción -->
        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Ingresa Descripción">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <p class="text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <!-- Fecha de Vencimiento -->
        <div class="mb-4">
            <label for="fecha_vencimiento" class="block text-sm font-medium text-gray-700">Fecha de Vencimiento</label>
            <input type="date" id="fecha_vencimiento" name="fecha_vencimiento"
                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                value="{{ old('fecha_vencimiento') }}">
            @error('fecha_vencimiento')
                <p class="text-red-700">{{ $message }}</p>
            @enderror
        </div>

        <!-- Usuario -->
        <div class="mb-4">
            <label for="user_id" class="block text-sm font-medium text-gray-700">Usuario</label>
            {{-- {{ dd($users) }} --}}
            <select name="user_id" id="user_id"
                class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Seleccione un usuario</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} - {{ $user->dni }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
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
