<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExcelUploadController;
use App\Http\Controllers\NewLoginController;
use App\Http\Controllers\NewPaswController;
use App\Http\Controllers\PasswordChangeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TrashedUsersController;
use App\Models\Country;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function(){
    Route::get('/newregister',[RegistrationController::class,'create'])->name('newregister');
    Route::post('/store-users',[RegistrationController::class,'store'])->name('store-users');

    Route::get('/newlogin',[NewLoginController::class,'create'])->name('newlogin');
    Route::post('/checklogin',[NewLoginController::class,'store'])->name('checklogin');

    Route::get('/password-change',[PasswordChangeController::class,'show'])->name('password.change');
    Route::post('/password-change',[PasswordChangeController::class,'store'])->name('password.change.email');

    Route::get('/new-password/{token}',[NewPaswController::class,'create'])->name('password.reset');
    Route::post('/new-password',[NewPaswController::class,'store'])->name('newpassword.store');

});

Route::middleware('auth')->group(function(){
    Route::post('/newlogout',[NewLoginController::class,'destroy'])->name('newlogout');

});


Route::get('/dashboard', function () {
    return view ('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','isUser')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::middleware('auth','isAdmin')->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('users');
    Route::patch('/users/{id}/update', [AdminController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::get('/users/{id}/show', [AdminController::class, 'show'])->name('users.show');
    Route::delete('/users/{id}/delete', [AdminController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
    Route::post('/users/store', [AdminController::class, 'store'])->name('users.store');

    Route::get('/users/trashed', [TrashedUsersController::class, 'trashed'])->name('users.trashed');
    Route::get('/users/{id}/restore', [TrashedUsersController::class, 'restore'])->name('users.restore');
    Route::delete('/users/{id}/forcedelete', [TrashedUsersController::class, 'forcedelete'])->name('users.forcedelete');

    Route::get('/users/importfile',[ExcelUploadController::class,'index'])->name('importfile');
    Route::post('/users/uploadfile',[ExcelUploadController::class,'uploadCountry'])->name('uploadfile');
    Route::get('/countries',[ExcelUploadController::class,'paginate'])->name('filepaginate');
    Route::get('/users/phone',[ExcelUploadController::class,'phone'])->name('phone');
   
});

