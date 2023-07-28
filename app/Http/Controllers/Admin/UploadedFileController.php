<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UploadedFile;

class UploadedFileController extends Controller
{


    public function index()
    {
    
        $uploadedFiles = UploadedFile::all();
        return view('admin.uploaded_files.index', ['uploadedFiles' => $uploadedFiles]);
    }

    public function show($id)
    {
        // Fetch the details of a specific uploaded file and pass it to the admin show view.
        $uploadedFile = UploadedFile::findOrFail($id);
        return view('admin.uploaded_files.show', ['uploadedFile' => $uploadedFile]);
    }

    // ... Other methods ...
}
