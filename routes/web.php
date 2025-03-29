<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [HomeController::class, 'index']);
Route::get('/registro', [RegistroController::class, 'index']);

Route::get('/files', function () {
    return view('file', [
        'connectionStatus' => "Conexión exitosa a la base de datos de Moodle",
    ]);
});