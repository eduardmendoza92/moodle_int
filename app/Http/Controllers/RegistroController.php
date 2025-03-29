<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    //
    public function index()
    {
        $connectionStatus = 'Conexión exitosa a la base de datos de Moodle';
        return view('registro', [
            'connectionStatus' => $connectionStatus,
        ]);
    }
}
