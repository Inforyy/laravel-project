<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AccessTokenMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login']);


Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/task/{id}/edit',[TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');


// Route::middleware(['access.token'])->group(function () {
//     Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
//     Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
//     Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
//     Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
//     Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('tasks.show');
//     Route::get('/task/{id}/edit',[TaskController::class, 'edit'])->name('tasks.edit');
//     Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
// });