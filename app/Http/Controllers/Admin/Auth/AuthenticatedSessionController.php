<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\File;
use App\Models\User;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(AdminLoginRequest $request): RedirectResponse
    {
       //dd($request->all());
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
public function verifyFiles()
{
    $unverifiedFiles = File::where('verified', false)->get();
    return view('admin.verify-files.index', compact('unverifiedFiles'));
}
public function showUserFiles($userId)
{
    $user = User::findOrFail($userId);
    return view('admin.user-files', compact('user'));
}




public function verifyFile(File $file)
{
    $file->update([
        'verified' => true,
        'verified_by' => auth('admin')->user()->id,
    ]);

    return redirect()->route('admin.verify.files')->with('success', 'File verified successfully.');
}

}
