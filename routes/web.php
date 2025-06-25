<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CatogotyController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\DashboardController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/Portfolio', [WelcomeController::class, 'create'])->name('Portfolio');
Route::get('/imgdetails/{id}', [WelcomeController::class, 'show'])->name('imgdetails');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/Users', [UsersController::class, 'index'])->name('Users');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('/Users/{id}', [UsersController::class, 'edit'])->name('Users.edit');
Route::put('/Users/{id}', [UsersController::class, 'update'])->name('Users.update');

Route::get('/Contact', [MessageController::class, 'index'])->name('contact');
Route::get('/Correspondence', [MessageController::class, 'create'])->name('create.contact');
Route::get('/Correspondence/{id}', [MessageController::class, 'edit'])->name('massagedetails');
Route::get('/Correspondence/{id}/{status}', [MessageController::class, 'updateStatus'])->name('updateStatus');
Route::post('/Contact', [MessageController::class, 'store'])->name('messages.store');

Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/aboutcontroller', [AboutController::class, 'create'])->name('aboutcontroller');
Route::Put('/aboutcontroller/{id}', [AboutController::class, 'update'])->name('aboutupdate');

Route::get('/catogory', [CatogotyController::class, 'index'])->name('catogory');
Route::post('/catogory', [CatogotyController::class, 'store'])->name('catogory.store');
Route::delete('/catogry/{id}', [CatogotyController::class, 'destroy'])->name('catogory.destroy');
Route::get('/catogry/{id}', [CatogotyController::class, 'edit'])->name('catogory.edit');
Route::PUT('/catogry/{id}', [CatogotyController::class, 'update'])->name('catogory.update');

Route::get('/artwork', [ArtworkController::class, 'index'])->name('artwork');
Route::get('/artworkedit', [ArtworkController::class, 'show'])->name('artwork.show');
Route::post('/artwork', [ArtworkController::class, 'store'])->name('artwork.store');
Route::get('/artworkedit/{id}', [ArtworkController::class, 'edit'])->name('artwork.edit');
Route::PUT('/artworkedit/{id}', [ArtworkController::class, 'update'])->name('artwork.update');
Route::delete('/artworkedit/{id}', [ArtworkController::class, 'destroy'])->name('artwork.destroy');



require __DIR__.'/auth.php';
