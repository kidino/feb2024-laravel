<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);

// note -- middleware for auth:sanctum has to occur before group().
Route::name('auth-sanctum.')->middleware(['auth:sanctum'])->group( function () {

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/users', function(){
        return response()->json( User::paginate(20), 200 );
    })->middleware('ability:view-users')->name('view-users');

    Route::get('/roles', function(){
        return response()->json( Role::all());  
    })->middleware(['ability:view-roles'])->name('view-roles');
    
});

// doesn't seem to work -- always return unauthorized
// created with Gate::define in AuthServiceProvider.php
// Route::get('/roles', function(){
//     return response()->json( Role::all());  
// })->middleware(['can:is-api']);

