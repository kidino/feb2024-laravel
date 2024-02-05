<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HelloController;

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
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// to create page with contact and address
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact');
Route::post('/contact-us', [PageController::class, 'contact_submit'])->name('contact_submit');

Route::get('/team', [PageController::class, 'team'])->name('team');

Route::get('/hello/{name?}', [HelloController::class, 'index'])->name('hello');


