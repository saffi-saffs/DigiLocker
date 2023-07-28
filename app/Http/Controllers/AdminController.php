<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FileUpload;
class AdminController extends Controller
{


public function store(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:pdf,jpeg,png|max:2048', // Adjust the file types and size limit as needed
        'file_name' => 'required|string',
        'file_description' => 'required|string',
    ]);

    $file = $request->file('file');
    $user = Auth::user();

    $filePath = $file->store('uploads'); // Adjust the storage path as needed

    FileUpload::create([
        'file_name' => $request->input('file_name'),
        'file_description' => $request->input('file_description'),
        'file_path' => $filePath,
        'user_id' => $user->id,
    ]);

    return redirect()->back()->with('success', 'File uploaded successfully!');
}


// ...

public function index()
{
    $fileUploads = FileUpload::with('user')->get();
    return view('admin.index', compact('fileUploads'));
}


}
