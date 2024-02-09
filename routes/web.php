<?php

use App\Http\Controllers\cekController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin', function(){
    return '<h1>Halo Admin </h1>';
})->middleware(['auth', 'verified', 'role:admin']);

Route::get('penulis', function(){
    return '<h1>Halo Penulis </h1>';
})->middleware(['auth', 'verified', 'role:penulis|admin']);

Route::get('tulisan', function(){
    return view('tulisan');
})->middleware(['auth',  'role_or_permission:lihat-tulisan|admin']);

Route::get('/cek1', function(){
    return '<h1>Cek1</h1>';
})->middleware(['auth', 'verified', 'role:admin']);

Route::get('/cek2', [cekController::class, 'index']);

require __DIR__.'/auth.php';
