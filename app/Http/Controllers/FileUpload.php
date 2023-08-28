<?php

namespace App\Http\Controllers;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\FileType;
use SebastianBergmann\Environment\Console;
 use App\Models\VerifiedFile;
 use App\Models\Admin;
 

use App\Models\AdminVerifyfile;
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
   
 
public function showVerifiedFiles()
{
     $userid = auth()->user()->id;

        $verifiedFiles = File::join('file_types', 'files.file_type_id', '=', 'file_types.id')
         ->where('files.verified', true)
         
        ->where('files.uploder_id', $userid)
        ->get(['files.*', 'file_types.file_type']);
 return view('userverified-files',compact('verifiedFiles', 'userid'));
}


////new

   public function sendforverification($id){
        $userData = File::find($id);
     
       
        $adminData = new  AdminVerifyfile();
      
        $adminData->name = $userData->name;
        $adminData->file_path = $userData->file_path;
        $adminData->uploder_id = $userData->id;
        $adminData->file_type_id = $userData->file_type_id;
        $adminData->verified = $userData->verified;
        $adminData->verified_by = $userData->verified_by;
        $adminData->created_at = $userData->created_at;
        $adminData->updated_at = $userData->updated_at;

        $adminData->save();

    
        return redirect()->back()->with('message','send for verification');
    }
    

}

   

 

    