<?php

use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('list_user');
Route::get('/create', [UserController::class, 'createUser'])->name('register_user');
Route::post('/create', [UserController::class, 'store']);
Route::get('/update/{id}', [UserController::class, 'edit'])->name('update_user');
Route::put('/update/{id}', [UserController::class, 'update']);
Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user_delete');

// TAsks
Route::prefix('tasks')->group(function () {
  Route::get('/', [TaskController::class, 'tasks'])->name('list_task');
  Route::get('/create', [TaskController::class, 'create'])->name('create_task');
  Route::post('/create', [TaskController::class, 'store']);
  Route::get('/create/{id}', [TaskController::class, 'update'])->name('update_task');
  Route::put('/create/{id}', [TaskController::class, 'edit']);
});
