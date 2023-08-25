<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
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
Route::get('/profile', [ProfileController::class, 'profileView']);

Route::get('/login', [LoginController::class, 'index']);
Route::get('/about', [AboutController::class, 'show']);
Route::get('/services', [ServicesController::class, 'show']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name("user.dashboard");


Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

Route::get('/files', [FileUpload::class, 'show']);
Route::get('/readfiles/{filename}', [FileUpload::class, 'show'])->name('readFiles');

    Route::get('/verified-files', [FileUpload::class, 'showVerifiedFiles'])->name('userverified-files');


Auth::routes();




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__.'/auth.php';

///admin starts

Route::
        namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
            Route::namespace('Auth')->middleware('guest:admin')->group(function () {
                //login route 
                Route::get('login', [AuthenticatedSessionController::class,'create'])->name('login');
                Route::post('login', [AuthenticatedSessionController::class,'store'])->name('adminlogin');
             




            });
            Route::middleware('admin')->group(function () {
                Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard'); });
                Route::get('verify-files', [HomeController::class, 'show'])
                         ->name('verifyfiles');
                    Route::post('verifieduserfiles', [HomeController::class,'verified'])->name('verifieduserfiles');
                   // Route::get('verifiedfileshow', [HomeController::class,'verifiedshow'])->name('verifiedfileshow');
//Route::get('admin/verified-files', [HomeController::class, 'verifiedFileShow'])->name('admin.verified.files');

Route::get('verified-files', [HomeController::class, 'verifiedFileShow'])->name('admin.verified.files');
Route::get('admin/verified-files', [HomeController::class, 'verifiedFileShow'])->name('admin.verified.files');

                
            Route::namespace('Auth')->group(function () {
            
             Route::post('logout', [AuthenticatedSessionController::class,'destroy'])->name('logout');
            });
           
        });