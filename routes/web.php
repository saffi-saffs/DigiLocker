<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\StoredFiles;
use App\Http\Controllers\FormController;


use App\Http\Controllers\NewsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UploadFileController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']
);
Route::get('/home', [HomeController::class, 'index']);


Route::get('/files', [FileUpload::class, 'showFiles']);


Route::get('/login', [LoginController::class, 'index']);
Route::get('/about', [AboutController::class, 'show']);
Route::get('/services', [ServicesController::class, 'show']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name("user.dashboard");


Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

Route::get('/files', [FileUpload::class, 'show']);
Route::get('/readfiles/{filename}', [FileUpload::class, 'show'])->name('readFiles');

    Route::get('/verified-files', [FileUpload::class, 'showVerifiedFiles'])->name('userverified-files');

Route::get('/sendforverification/{id}' , [FileUpload::class, 'sendforverification']);
Route::get('/revokeverification/{id}' , [FileUpload::class, 'revokeverification']);
Route::get('/deletefile/{id}' , [FileUpload::class, 'deletefile']);

Auth::routes();




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';

///admin starts


// Admin routes
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    // Authentication routes
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');
    });

    // Authenticated admin routes
    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::get('verify-files', [HomeController::class, 'show'])->name('verifyfiles');
        Route::post('verifieduserfiles', [HomeController::class, 'verified'])->name('verifieduserfiles');
        Route::get('verified-files', [HomeController::class, 'verifiedFileShow'])->name('verified.files');

        Route::get('verifyfiles', [HomeController::class, 'show'])->name('verifyfiles');
        Route::post('verified', [HomeController::class, 'verified'])->name('admin.verified');
        Route::get('/verify/{id}' , [HomeController::class, 'verify']);
        Route::get('/unverify/{id}' , [HomeController::class, 'unverify']);
        // Logout route
        Route::namespace('Auth')->group(function () {
            Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        });
    }); // <-- Missing closing parenthesis for the outer 'group' function
});
        Route::post('/admin/verified', [HomeController::class, 'verified'])->name('admin.verified');
