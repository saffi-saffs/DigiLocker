<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class File extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'name',
        'file_path',
        'uploader_id',   // Corrected column name
        'file_type_id'
    ];

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploader_id');
    }
}
