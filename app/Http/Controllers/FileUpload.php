<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Http\Request;
use App\Models\File;

class FileUpload extends Controller
{
    public function createForm()
    {
        return view('file-upload');
    }
 
   public function fileUpload(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:csv,txt,xls,xlsx,pdf|max:2048'
        ]);

        $fileModel = new File;

        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            // Store the file path in the database using the correct storage path
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = $filePath;
            $fileModel->save();
   File::create([
            'name' => $fileName,
            'file_path' => $filePath,
        ]);
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
    }

public function showPhotos()
{
    $photos = Photo::all();

    return view('photo-list', compact('photos'));
}
    public function displayFiles(File $file)
    {
         $file =File::all();
      
        return view('show', compact('file'));
    }
    
    public function show()
    {
        $files = File::all(); // Retrieve all files from the database

        return view('file-list', compact('files'));
    }
    

}

   

 

    