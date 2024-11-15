@extends('layouts.app')

@section('title')
    Pagina de usuarios
@endsection

@section('contenido')
    <x-title>Página de usuarios</x-title>

    <div class="flex justify-end my-9">
        <button class="bg-blue-600 p-2 rounded text-white hover:bg-blue-700 transition-colors">
            <a href="{{ route('register_user') }}">Agregar Usuario</a>
        </button>
    </div>

    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">#</th>
                <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">Nombre</th>
                <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">Correo</th>
                <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">Dni</th>
                <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">Acciones</th>
            </tr>
        </thead>
        <tbody
            @foreach ($users as $user)
            <tr class="border-b hover:bg-gray-50">
              <td class="py-2 px-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
              <td class="py-2 px-4 text-sm text-gray-700">{{ $user->name }}</td>
              <td class="py-2 px-4 text-sm text-gray-700">{{ $user->email }}</td>
              <td class="py-2 px-4 text-sm text-gray-700">{{ $user->dni }}</td>
              <td class="py-2 px-4 text-sm text-gray-700">
                  <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    <a href="{{ route('update_user', $user->id) }}">Editar</a>
                  </button>
                  <form action="{{ route('user_delete', $user->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Eliminar
                    </button>
                </form>
              </td>
            </tr> @endforeach
            </tbody>
    </table>
@endsection
