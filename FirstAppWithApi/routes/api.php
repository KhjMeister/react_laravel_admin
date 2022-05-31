<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactController;

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

       
    Route::resource('categories', CategoryController::class); 
    Route::resource('contacts', ContactController::class); 


});
