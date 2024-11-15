<?php

use App\Http\Controllers\Tasks\TaskController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/create', [UserController::class, 'getAll']);
Route::post('/create', [UserController::class, 'store']);
Route::put('/update/{id}', [UserController::class, 'update']);
Route::delete('/delete/{id}', [UserController::class, 'delete']);

Route::prefix('tasks')->group(function () {
  Route::get('/create', [TaskController::class, 'getAll']);
  Route::post('/create', [TaskController::class, 'store']);
  Route::put('/create/{id}', [TaskController::class, 'edit']);
});
