<?php
namespace App\Models;




use Illuminate\Database\Eloquent\Model;

class VerifiedFile extends Model
{protected $fillable = ['file_id', 'verified_by', 'created_at', 'updated_at'];

    protected $table = 'verified_files';
    
}
