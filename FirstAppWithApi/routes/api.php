<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login',       [AuthController::class, 'login']);
    Route::post('/register',    [AuthController::class, 'register']);
    Route::post('/logout',      [AuthController::class, 'logout']);
    Route::post('/refresh',     [AuthController::class, 'refresh']);

    Route::get('/user-profile', [ProfileController::class, 'userProfile']);    
    Route::put('/edite-profile/{id}',[ProfileController::class, 'updateProfile']);

    // Route::get('/categories', [CategoryController::class, 'index']);    
    // Route::delete('/categorie/{id}', [CategoryController::class, 'destroy']);   
    Route::resource('categories', CategoryController::class); 
    Route::resource('contacts', ContactController::class); 

});
