<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoodleUser;
use App\Models\MdlFile;

class UserController extends Controller
{
    public function index()
    {
        $users = MoodleUser::all();
        return view('user', compact('users'));
    }

    public function edit($id)
    {
        $user = MoodleUser::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => 'required|email|unique:mdl_user,email,' . $id,
        ]);

        $user = MoodleUser::findOrFail($id);
        $user->update($request->only(['firstname', 'lastname', 'email']));

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = MoodleUser::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function editProfile($id)
    {
        $user = MoodleUser::findOrFail($id);
        $curriculum = $user->curriculum()->first();
        $documentation = $user->documentation()->get();

        return view('profile.edit', compact('user', 'curriculum', 'documentation'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'curriculum' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'documentation.*' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        $user = MoodleUser::findOrFail($id);

        if ($request->hasFile('curriculum')) {
            $file = $request->file('curriculum');
            $path = $file->store('curriculum', 'public');

            MdlFile::updateOrCreate(
                ['userid' => $user->id, 'filearea' => 'files_1'],
                [
                    'filename' => $file->getClientOriginalName(),
                    'filepath' => '/',
                    'filesize' => $file->getSize(),
                    'mimetype' => $file->getMimeType(),
                    'contenthash' => sha1_file($file->getRealPath()),
                    'pathnamehash' => sha1('/' . $file->getClientOriginalName()),
                    'timecreated' => time(),
                    'timemodified' => time(),
                ]
            );
        }

        if ($request->hasFile('documentation')) {
            foreach ($request->file('documentation') as $file) {
                $path = $file->store('documentation', 'public');

                MdlFile::create([
                    'userid' => $user->id,
                    'filearea' => 'files_2',
                    'filename' => $file->getClientOriginalName(),
                    'filepath' => '/',
                    'filesize' => $file->getSize(),
                    'mimetype' => $file->getMimeType(),
                    'contenthash' => sha1_file($file->getRealPath()),
                    'pathnamehash' => sha1('/' . $file->getClientOriginalName()),
                    'timecreated' => time(),
                    'timemodified' => time(),
                ]);
            }
        }

        return redirect()->route('users.index')->with('success', 'Perfil actualizado correctamente.');
    }
}