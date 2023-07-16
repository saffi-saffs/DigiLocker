<?php

use App\Http\Controllers\AboutController;

use App\Http\Controllers\BankController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UploadFileController;

use Illuminate\Support\Facades\Route;

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

Route::get('/login', [LoginController::class, 'index']);
Route::get('/about', [AboutController::class, 'show']);
Route::get('/services', [ServicesController::class, 'show']);
Route::get('/dashboard', [DashboardController::class, 'show']);
Route::get('/bank', [BankController::class, 'show']);
Route::get('/news', [NewsController::class, 'show']);
Route::get('/form', [FormController::class, 'form']);

Route::get('/upload-file', [FileUpload::class, 'createForm']);
Route::post('/upload-file', [FileUpload::class, 'fileUpload'])->name('fileUpload');

Route::get('/readfiles/{filename}', [FileUpload::class, 'show'])->name('readFiles');