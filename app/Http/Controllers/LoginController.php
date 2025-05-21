<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoodleUser;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('layouts.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Validar las credenciales del usuario
        $user = $this->validateUser($request->username, $request->password);

        if ($user) {
            // Verificar si la cuenta está suspendida
            if ($user->suspended) {
                return redirect()->back()->with('error', 'Tu cuenta está suspendida. Por favor, contacta al soporte técnico.');
            }

            // Iniciar sesión o marcar como autenticado
            session(['authenticated' => true]);
            return redirect('/home')->with('success', '¡Inicio de sesión exitoso!');
        }

        // Si las credenciales son incorrectas
        return redirect()->back()->with('error', 'Credenciales inválidas.');
    }

    /**
     * Valida las credenciales del usuario.
     *
     * @param string $username
     * @param string $password
     * @return MoodleUser|null
     */
    private function validateUser($username, $password)
    {
        // Buscar el usuario en la base de datos
        $user = MoodleUser::where('username', $username)->first();

        // Verificar si el usuario existe y la contraseña es válida
        if ($user && password_verify($password, $user->password)) {
            return $user; // Retornar el usuario si es válido
        }

        return null; // Retornar null si no es válido
    }
}