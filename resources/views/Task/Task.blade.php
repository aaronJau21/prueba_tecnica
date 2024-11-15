@extends('layouts.app')

@section('title')
    Pagina de Tareas
@endsection

@section('contenido')
    <x-title>Página de tareas</x-title>

    <div class="flex justify-end my-9">
        <button class="bg-blue-600 p-2 rounded text-white hover:bg-blue-700 transition-colors">
            <a href="{{ route('create_task') }}">Agregar Tarea</a>
        </button>
    </div>
    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">#</th>
                <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">titulo</th>
                <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">fecha_vencimiento</th>
                <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">estado</th>
                <th class="py-2 px-4 text-left text-sm font-semibold text-gray-700">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700">{{ $task->titulo }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700">{{ $task->fecha_vencimiento }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700">{{ $task->estado }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700">
                        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            <a href="{{ route('update_task', $task->id) }}">Editar</a>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
