<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index']);
Route::get('/registro', [RegistroController::class, 'index']);
Route::post('/registro', [RegistroController::class, 'store'])->name('registrar.usuario');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users/{id}/inactivate', [UserController::class, 'inactivate'])->name('users.inactivate');
Route::get('/users/{id}/suspend', [UserController::class, 'suspend'])->name('users.suspend');
Route::get('/users/{id}/toggle-suspend', [UserController::class, 'toggleSuspend'])->name('users.toggleSuspend');
Route::get('/profile/edit/{id}', [UserController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update/{id}', [UserController::class, 'updateProfile'])->name('profile.update');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/files', function () {
    return view('file', [
        'connectionStatus' => "Conexión exitosa a la base de datos de Moodle",
    ]);
});