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
Route::get('/calender', [App\Http\Controllers\Client\CalenderController::class, 'calender'])->name('calender');
Route::get('/listsession', [App\Http\Controllers\Client\SessionController::class, 'listSession'])->name('listSession');
Route::get('/historymetting', [App\Http\Controllers\Client\SessionController::class, 'historyMetting'])->name('historyMetting');
Route::get('/metting/{link}', [App\Http\Controllers\Client\MettingController::class, 'metting'])->name('metting');



Route::get('admin/login',[App\Http\Controllers\Admin\Auth\AuthController::class, 'getLogin'])->name('adminLogin');
Route::post('admin/login',[App\Http\Controllers\Admin\Auth\AuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('admin/logout',[App\Http\Controllers\Admin\Auth\AuthController::class, 'logout'])->name('adminLogout');

Route::get('admin/dashboard',[App\Http\Controllers\Admin\Pages\DashboardController::class, 'dashboard'])->name('adminDashboard')->middleware('is_admin');	



