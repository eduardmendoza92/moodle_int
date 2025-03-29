<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoodleUser extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla
    protected $table = 'mdl_user';

    // Desactiva los timestamps (created_at y updated_at) si no existen en la tabla
    public $timestamps = false;

    // Define los campos que se pueden llenar masivamente (opcional)
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
    ];
}