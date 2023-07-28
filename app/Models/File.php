<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table = 'files';
    protected $fillable = [
        'name',
        'file_path',
        'uploder_id',
        'file_type_id'
    ];

}
