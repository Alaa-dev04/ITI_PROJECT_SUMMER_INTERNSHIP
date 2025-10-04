<?php
   
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
Route::get('/', function () {
    return view('welcome');
});
  
Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class,'login']);
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function(){
        return view('thefront.dashboard');
    })->name('thefront.dashboard');
    Route::resource('userprofile', App\Http\Controllers\UserController::class);
    Route::resource('recipes', App\Http\Controllers\RecipeController::class);
});