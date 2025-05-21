<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodleUser extends Model
{
    use HasFactory;

    protected $table = 'mdl_user';

    public $timestamps = false;

    protected $fillable = [
        'auth',
        'confirmed',
        'policyagreed',
        'deleted',
        'suspended',
        'mnethostid',
        'username',
        'password',
        'idnumber',
        'firstname',
        'lastname',
        'email',
        'emailstop',
        'phone1',
        'phone2',
        'institution',
        'department',
        'address',
        'city',
        'country',
        'lang',
        'calendartype',
        'theme',
        'timezone',
        'firstaccess',
        'lastaccess',
        'lastlogin',
        'currentlogin',
        'lastip',
        'secret',
        'picture',
        'description',
        'descriptionformat',
        'mailformat',
        'maildigest',
        'maildisplay',
        'autosubscribe',
        'trackforums',
        'timecreated',
        'timemodified',
        'trustbitmask',
        'imagealt',
        'lastnamephonetic',
        'firstnamephonetic',
        'middlename',
        'alternatename',
        'moodlenetprofile',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'secret',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'confirmed' => 'boolean',
            'policyagreed' => 'boolean',
            'deleted' => 'boolean',
            'suspended' => 'boolean',
            'emailstop' => 'boolean',
            'descriptionformat' => 'integer',
            'mailformat' => 'boolean',
            'maildigest' => 'boolean',
            'maildisplay' => 'integer',
            'autosubscribe' => 'boolean',
            'trackforums' => 'boolean',
            'timecreated' => 'datetime',
            'timemodified' => 'datetime',
        ];
    }

    public function curriculum()
    {
        return $this->hasMany(MdlFile::class, 'userid', 'id')->where('filearea', 'files_1');
    }

    public function documentation()
    {
        return $this->hasMany(MdlFile::class, 'userid', 'id')->where('filearea', 'files_2');
    }

    public static function validateUser($username, $password)
    {
        // Buscar el usuario por nombre de usuario
        $user = self::where('username', $username)->first();

        // Verificar si el usuario existe y la contraseña es válida
        if ($user && password_verify($password, $user->password)) {
            return $user; // Retornar el usuario si es válido
        }

        return null; // Retornar null si no es válido
    }
}