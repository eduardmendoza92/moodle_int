<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdlFile extends Model
{
    use HasFactory;

    protected $table = 'mdl_files';

    public $timestamps = false;

    protected $fillable = [
        'contenthash',
        'pathnamehash',
        'contextid',
        'component',
        'filearea',
        'itemid',
        'filepath',
        'filename',
        'userid',
        'filesize',
        'mimetype',
        'status',
        'source',
        'author',
        'license',
        'timecreated',
        'timemodified',
        'sortorder',
        'referencefileid',
    ];
}