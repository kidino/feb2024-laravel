<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProfileController;

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

Route::get('/about', function () {
    return view('about');
})->name('about');

// to create page with contact and address
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact');
Route::post('/contact-us', [PageController::class, 'contact_submit'])->name('contact_submit');

Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/hello/{name?}', [HelloController::class, 'index'])->name('hello');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('roles', RoleController::class)->middleware(['auth', 'verified']);
Route::resource('users', UserController::class)->middleware(['auth', 'verified']);


// testing URL routing rules with custom parameters
Route::get('/profile/{id}/ubahsuai/{location}/{tahun}', [ProfileController::class, 'special'])->name('profile.special');


require __DIR__.'/auth.php';
