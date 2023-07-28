<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\StoredFiles;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;

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
Route::get('/dashboard', [DashboardController::class, 'show']);
Route::get('/bank', [BankController::class, 'show']);
Route::get('/news', [NewsController::class, 'show']);
Route::get('/form', [FormController::class, 'form']);

Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');
Route::get('/files', [FileUpload::class, 'show']);
Route::get('/readfiles/{filename}', [FileUpload::class, 'show'])->name('readFiles');
Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index'])->name('HOME');




Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');






Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('upload-file');

Route::get('/photos', [FileUpload::class, 'showPhotos']);
  