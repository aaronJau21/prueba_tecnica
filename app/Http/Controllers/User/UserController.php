<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\RegisterUserRequest;
use App\Http\Requests\user\updateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('User.user', [
      'users' => $users
    ]);
  }

  public function getAll()
  {
    $users = User::all();
    return response()->json(['user' => $users]);
  }

  public function createUser()
  {
    return view('User.createUser');
  }

  public function store(RegisterUserRequest $request)
  {
    $validatedData = $request->validated();
    User::create([
      'name' => $validatedData['name'],
      'email' => $validatedData['email'],
      'dni' => $validatedData['dni'],
    ]);

    return redirect()->route('list_user')->with('success', 'Usuario creado con éxito.');
  }

  public function edit(int $id)
  {
    $user = User::findOrFail($id);
    return view('User.update-user', compact('user'));
  }

  public function update(int $id, updateUserRequest $request)
  {
    $user = User::findOrFail($id);
    $user->update([
      'name' => $request->input('name', $user->name),
      'email' => $request->input('email', $user->email),
      'dni' => $request->input('dni', $user->dni)
    ]);
    return redirect()->route('list_user');
  }

  public function delete(int $id)
  {

    $user = User::find($id);

    $user->delete();
    return redirect()->route('list_user');
  }
}
