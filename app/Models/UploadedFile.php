<?php

namespace App\Models;


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadedFile extends Model
{
    protected $fillable = ['file_name', 'file_description', 'file_path'];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}

