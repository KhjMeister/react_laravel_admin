<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', function () {return view('pages.welcome');})->name('videorayan');
Route::get('/aboutus', function () {return view('pages.aboutus');})->name('aboutus');
Route::get('/contactus', function () {return view('pages.contactus');})->name('contactus');

Route::get('/dashboard', [App\Http\Controllers\Client\DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [App\Http\Controllers\Client\ProfileController::class, 'profile'])->name('profile');
Route::get('/category', [App\Http\Controllers\Client\CategoryController::class, 'category'])->name('category');
Route::get('/contact', [App\Http\Controllers\Client\ContactController::class, 'contact'])->name('contact');
Route::get('/session', [App\Http\Controllers\Client\SessionController::class, 'session'])->name('session');

Route::get('/categories', [App\Http\Controllers\Client\CategoryController::class, 'getAllCategories'])->name('categories');

// Route::get('/session', [App\Http\Controllers\SessionController::class, 'index'])->name('session');
// Route::get('/sess/{sessid}', [App\Http\Controllers\SessionController::class, 'sessionedit'])->name('sess');
// Route::get('/meetting/{link}', [App\Http\Controllers\SessController::class, 'index'])->name('meetting');


// Route::get('auth/google', [App\Http\Controllers\GoogleSocialiteController::class, 'redirectToGoogle']);
// Route::get('google/callback', [App\Http\Controllers\GoogleSocialiteController::class, 'handleCallback']);
// Route::get('/change', [App\Http\Controllers\LangController::class, 'change'])->name('changeLang');



