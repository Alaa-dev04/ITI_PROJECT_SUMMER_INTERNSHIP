<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RecipeApiController;
use App\Http\Controllers\Api\FavoriteController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get ('/recipes', [App\Http\Controllers\Api\RecipeApiController::class, 'index']);
Route::get ('/recipes/{id}', [App\Http\Controllers\Api\RecipeApiController::class, 'show']);
Route::get ('/favorites', [App\Http\Controllers\Api\FavoriteController::class, 'index']);
Route::post('/favorites', [App\Http\Controllers\Api\FavoriteController::class, 'store']);
Route::delete('/favorites/{id}', [App\Http\Controllers\Api\FavoriteController::class, 'destroy']);