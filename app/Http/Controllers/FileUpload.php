<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\FileType;
use SebastianBergmann\Environment\Console;

class FileUpload extends Controller
{
    public function createForm()
    {
        $fileTypes = FileType::all();
        return view('file-upload', compact('fileTypes'));
    }
 
   public function fileUpload(Request $req)
    {
        // csv,txt,xls,xlsx,pdf
        $req->validate([
            'file' => 'required|mimes:png,jpg,jpeg|max:2048',
            'filename' => 'required',
            'documentType' => 'required|numeric'
        ],
        [
            'documentType.numeric' => 'Please choose one of the options for the Document Type!'
        ]);
        $userid = auth()->user()->id;
        $fileModel = new File;

        if ($req->file()) {
            $fileName = $userid.'_'.str_replace(' ', '_', $req->get('filename')).'.'.$req->file('file')->extension();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

            // Store the file path in the database using the correct storage path
            $fileModel->name = $fileName;
            $fileModel->file_path = $filePath;
            $fileModel->uploder_id = $userid;
            $fileModel->file_type_id = $req->get('documentType');
            $fileModel->save();
           
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
        $userid = auth()->user()->id;
        $files = File::join('file_types', 'files.file_type_id', '=', 'file_types.id')
        ->where('files.uploder_id', $userid)
        ->get(['files.*', 'file_types.file_type']);
        
        return view('file-list', compact('files'));
    }

}

   

 

    