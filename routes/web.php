<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChairCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Title2Controller;
use App\Http\Controllers\TitleController;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
    'register' => false, // Registration Routes...
    // 'reset' => false, // Password Reset Routes...
    // 'verify' => false, // Email Verification Routes...
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('/dashboard')->as('dashboard.')->middleware('auth')->group(function(){
    Route::get('profile-edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::resource('first-title', TitleController::class);
    Route::resource('second-title', Title2Controller::class);
    Route::resource('category', CategoryController::class);
    Route::resource('chair-category', ChairCategoryController::class);
});