<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\AdminVerifyfile;
use App\Models\UserVerifyfile;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function verifyFiles()
    {
        return view('admin.verifyfiles');
    }
    public function showUserFiles()
    {
        $userid = auth()->user()->id;
        $user = User::all();
        return view('admin.verifyfiles', compact('user'));
    }
    public function show()
    {
       
            //$userid = auth()->user()->id;
            $files = AdminVerifyfile::join('file_types', 'admin_verifyfiles.file_type_id', '=', 'file_types.id')
                ->where('admin_verifyfiles.verified', false)
                ->get(['admin_verifyfiles.*', 'file_types.file_type']);

            //dd($files);


            return view('admin.verifyfiles', compact('files'));
        }

    
    public function verified(Request $request)
    {


        $selectedFileIds = $request->input('selectedFiles');
if ($selectedFileIds) {


            foreach ($selectedFileIds as $fileId) {

                $file = File::findOrFail($fileId);
                $userfile = AdminVerifyfile::findOrFail($fileId);
              $file->verified = true;
$file->verified_by = auth('admin')->user()->id;
$file->save();

                $userfile->update([
                    'verified' => true,
                    'verified_by' => auth('admin')->user()->id,
                ]);


             DB::table('files')->where('id', $fileId)->update([
    'verified' => true,
    'verified_by' => auth('admin')->user()->id,
]);


                UserVerifyfile::insert([
                    'file_type_id' => $file->id,
                    'verified_by' => auth('admin')->user()->id,
                    'name' => $file->name,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'file_path' => $file->file_path,
                    'uploder_id' => $file->uploder_id,
                     'verified' => true,
                ]);
            }

            foreach ($selectedFileIds as $fileId) {
                AdminVerifyfile::where('file_type_id', $fileId)->delete();

            }
  return redirect()->route('admin.verified.files')
                     ->with('success', 'Selected files have been verified successfully.');


 } else {
        return back()->with('error', 'No files selected for verification.');
    }
        }
    
  

    




     public function verifiedFileShow()
{
    $adminUserId = auth('admin')->user()->id;
   
$verifiedFiles = File::join('file_types', 'files.file_type_id', '=', 'file_types.id')
    
    ->where('files.verified', true) // Add this line to filter verified files
    ->get(['files.*', 'file_types.file_type']);
       
return view('admin.verifiedfiles', compact('verifiedFiles', 'adminUserId'));



}


}

    
