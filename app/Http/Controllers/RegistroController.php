<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class RegistroController extends Controller
{
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
            'curriculum' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'documentation.*' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $password = Hash::make($validatedData['password']);

        try {

            $userId = DB::connection('mysql')->table('mdl_user')->insertGetId([
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


            if ($request->hasFile('curriculum')) {
                $file = $request->file('curriculum');
                $path = $file->store('curriculum', 'public');

                DB::connection('mysql')->table('mdl_files')->insert([
                    'userid' => $userId,
                    'filearea' => 'files_1',
                    'filename' => $file->getClientOriginalName(),
                    'filepath' => '/',
                    'filesize' => $file->getSize(),
                    'mimetype' => $file->getMimeType(),
                    'contenthash' => sha1_file($file->getRealPath()),
                    'pathnamehash' => sha1('/' . $file->getClientOriginalName()),
                    'timecreated' => time(),
                    'timemodified' => time(),
                    'contextid' => 1,
                    'itemid' => 0,
                    'component' => 'user',
                ]);
            }


            if ($request->hasFile('documentation')) {
                foreach ($request->file('documentation') as $file) {
                    $path = $file->store('documentation', 'public');

                    DB::connection('mysql')->table('mdl_files')->insert([
                        'userid' => $userId,
                        'filearea' => 'files_2',
                        'filename' => $file->getClientOriginalName(),
                        'filepath' => '/',
                        'filesize' => $file->getSize(),
                        'mimetype' => $file->getMimeType(),
                        'contenthash' => sha1_file($file->getRealPath()),
                        'pathnamehash' => sha1('/' . $file->getClientOriginalName()),
                        'timecreated' => time(),
                        'timemodified' => time(),
                        'contextid' => 1,
                        'itemid' => 0,
                        'component' => 'user',
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Usuario registrado exitosamente en Moodle!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al registrar el usuario: ' . $e->getMessage());
        }
    }
}
