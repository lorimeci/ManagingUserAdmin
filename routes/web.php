<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view ('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Auth::routes(); //its used in laravel/ui 
require __DIR__.'/auth.php';

// Route::get('admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('admin/dashboard');

// Route::get('guest/dashboard', function () {
//     return view('guest.dashboard');
// })->middleware(['auth', 'verified'])->name('guest.dashboard');

// Route::get('/users', function () {
//     return "users that the admin will crud";
// });
// Route::resource('/users', AdminController::class);
// Route::middleware('auth')->group(function () {
//     Route::get('/users', [AdminController::class, 'index'])->name('users');
//     Route::get('/users', [AdminController::class, 'edit'])->name('users.edit');
//     Route::patch('/users', [AdminController::class, 'update'])->name('users.update');
//     Route::delete('/users', [AdminController::class, 'destroy'])->name('users.destroy');
// });
Route::get('/users', [AdminController::class, 'index'])->name('users');
Route::patch('/users/{id}/update', [AdminController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('users.edit');
Route::get('/users/{id}/show', [AdminController::class, 'show'])->name('users.show');
 Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
 Route::get('/users/create', [AdminController::class, 'create'])->name('users.create');
 Route::post('/users/store', [AdminController::class, 'store'])->name('users.store');