<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\SessionController;

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
    
    
    Route::get('/sessions/ended',[SessionController::class, 'endedSessions']);
    Route::get('/sessions/notended',[SessionController::class, 'notEndedSessions']);
    Route::post('/sessions/addcontact',[SessionController::class, 'addContactToSession']);
    Route::post('/sessions/setostad',[SessionController::class, 'setOstad']);
    Route::post('/sessions/sendmessage',[SessionController::class, 'sendMessageToContacts']);
    Route::post('/sessions/checksmssended',[SessionController::class, 'checkSmsSended']);
    Route::post('/sessions/contacts',[SessionController::class, 'contacts']);
    Route::get('/sessions/getbytoken/{token}',[SessionController::class, 'getByToken']);
    Route::get('/sessions/startsession/{id}',[SessionController::class, 'startSession']);
    Route::get('/sessions/endsession/{id}',[SessionController::class, 'endSession']);

    Route::resource('sessions', SessionController::class); 


});
