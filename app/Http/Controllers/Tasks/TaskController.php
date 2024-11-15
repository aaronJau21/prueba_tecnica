<?php

namespace App\Http\Controllers\Tasks;

use App\Enum\Task\TaskEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\task\CreateTaskRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function tasks()
  {
    $tasks = Task::all();
    return view('Task.Task', [
      'tasks' => $tasks
    ]);
  }

  public function getAll()
  {
    $tasks = Task::all();
    return response()->json(['tasks' => $tasks]);
  }

  public function create()
  {
    $users = User::all();
    return view('Task.create-task', [
      'users' => $users
    ]);
  }

  public function store(Request $request)
  {
    $task = Task::create([
      'titulo' => $request->input('titulo'),
      'descripcion' => $request->input('descripcion'),
      'fecha_vencimiento' => $request->input('fecha_vencimiento'),
      'estado' => $request->input('estado') || TaskEnum::PENDIENTE,
      'user_id' => $request->input('user_id'),
    ]);
    // Redirección después de guardar la tarea
    return redirect()->route('list_task')->with('success', 'Tarea creada con éxito.');
  }

  public function update(int $id)
  {
    $task = Task::findOrFail($id);
    $users = User::all();

    return view('Task.update-task', compact('task', 'users'));
  }

  public function edit(int $id, Request $request)
  {
    $task = Task::findOrFail($id);
    $task->update([
      'titulo' => $request->input('titulo', $task->titulo),
      'descripcion' => $request->input('descripcion', $task->descripcion),
      'fecha_vencimiento' => $request->input('fecha_vencimiento', $task->fecha_vencimiento),
      'estado' => $request->input('estado', $task->estado),
      'user_id' => $request->input('user_id', $task->user_id),
    ]);
    return redirect()->route('list_task');
  }
}
