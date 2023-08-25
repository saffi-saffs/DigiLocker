<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;

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
        $userid = auth()->user()->id;
         $files = File::join('file_types', 'files.file_type_id', '=', 'file_types.id')
    ->where('files.verified', false) // Exclude verified files
    ->get(['files.*', 'file_types.file_type']);
        //dd($files);
           

        return view('admin.verifyfiles', compact('files', 'userid'));
    }
    public function verified(Request $request)
    {
        //dd($request);
        $selectedFileIds = $request->input('selectedFiles');

        // Perform the verification action for each selected file
        foreach ($selectedFileIds as $fileId) {
            $file = File::findOrFail($fileId);
            $file->update([
                'verified' => true,
                'verified_by' => auth('admin')->user()->id,
            ]);
        }

        foreach ($selectedFileIds as $fileId) {
            $file = File::findOrFail($fileId);
            $file->update([
                'verified' => true,
                'verified_by' => auth('admin')->user()->id,
            ]);


            DB::table('verified_files')->insert([
                'file_id' => $file->id,
                'verified_by' => auth('admin')->user()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return back()->with('success', 'Selected files verified successfully.');
    }




    public function verifiedFileShow()
    {
        $userid = auth()->user()->id;

        $verifiedFiles = File::join('file_types', 'files.file_type_id', '=', 'file_types.id')
            ->join('verified_files', 'files.id', '=', 'verified_files.file_id')
            ->where('verified_files.verified_by', auth('admin')->user()->id)
            ->get(['files.*', 'file_types.file_type']);

        return view('admin.verifiedfiles', compact('verifiedFiles', 'userid'));
    }
}