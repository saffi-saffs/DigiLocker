<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class FileController extends Controller
{
    public function show($filename)
    {
        $file = File::where('file_path', $filename)->firstOrFail();
        
        // Additional checks if needed, e.g., permissions
        
        $filePath = storage_path('uploads/' . $file->file_path);

        return response()->file($filePath);
    }



    public function showVerifiedFiles()
    {
        $userId = auth()->user()->id;
        $verifiedFiles = File::where('verified', true)
            ->where('uploader_id', $userId)
            ->get();

        return view('userverified-files', compact('verifiedFiles'));
    }
}

