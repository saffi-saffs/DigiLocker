<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminVerifyfile extends Model
{
    use HasFactory;
    protected $fillable = [
    // other fillable properties
    'verified',
     'verified_by' ,
                'created_at',
                'updated_at'
];

}
