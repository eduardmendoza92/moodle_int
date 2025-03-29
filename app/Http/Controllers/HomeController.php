<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoodleUser;

class HomeController extends Controller
{
    /**
     * Display the home view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // Realiza una consulta a la tabla mdl_user
            $users = MoodleUser::select('id', 'username', 'firstname', 'lastname', 'email')
                ->limit(10) // Limita el resultado a 10 registros
                ->get();

            $connectionStatus = 'Conexión exitosa a la base de datos de Moodle';
        } catch (\Exception $e) {
            $connectionStatus = 'Error al conectar a la base de datos de Moodle: ' . $e->getMessage();
            $users = [];
        }

        return view('home', [
            'connectionStatus' => $connectionStatus,
            'users' => $users,
        ]);
    }
}
