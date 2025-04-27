<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
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
Route::get('/profile/edit/{id}', [UserController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update/{id}', [UserController::class, 'updateProfile'])->name('profile.update');

Route::get('/files', function () {
    return view('file', [
        'connectionStatus' => "Conexión exitosa a la base de datos de Moodle",
    ]);
});