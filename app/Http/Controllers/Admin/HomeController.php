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

        $files = File::join('file_types', 'files.file_type_id', '=', 'file_types.id')
        ->whereNull('files.delete')
        ->where('files.status', 'pending')
        ->get(['files.*', 'file_types.file_type']);
        
        return view('admin.verifyfiles', compact('files'));
        }

    
    public function verify($id)
    {

        

        $file = File::find($id);

        if($file == null) {
            return redirect()->back()->with('error','Failed to verify file! Please try again.');    
        }
        
        $file->status = "verified";
        $file->save();

    
        return redirect()->back()->with('success','File successfully verified.');


    }


    public function unverify($id)
    {

        

        $file = File::find($id);

        if($file == null) {
            return redirect()->back()->with('error','Failed to unverify file! Please try again.');    
        }
        
        $file->status = "pending";
        $file->save();

    
        return redirect()->back()->with('success','Successfully removed verification status from file.');


    }
    
  

    




     public function verifiedFileShow()
{
        $files = File::join('file_types', 'files.file_type_id', '=', 'file_types.id')
        ->whereNull('files.delete')
        ->where('files.status', 'verified')
        ->get(['files.*', 'file_types.file_type']);
        
        return view('admin.verifiedfiles', compact('files'));


}


}

    
