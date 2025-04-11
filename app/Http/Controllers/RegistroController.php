<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:100',
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:6',
        ]);

        $password = Hash::make($validatedData['password']);

        try {
            DB::connection('mysql')->table('mdl_user')->insert([
                'username' => $validatedData['username'],
                'firstname' => $validatedData['firstname'],
                'lastname' => $validatedData['lastname'],
                'email' => $validatedData['email'],
                'password' => $password,
                'confirmed' => 1,
                'mnethostid' => 1,
                'timecreated' => time(),
                'timemodified' => time(),
                'auth' => 'manual',
            ]);

            return redirect()->back()->with('success', 'Usuario registrado exitosamente en Moodle!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al registrar el usuario: ' . $e->getMessage());
        }
    }
}
