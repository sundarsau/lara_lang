<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['lang'])->group(function() {
            Route::get('/', [HomeController::class, 'index']);
            Route::get('lang/{locale}', [HomeController::class, 'setLanguage'])->name('setlocal');

           Route::resource('languages', LanguageController::class);
           Route::resource('categories', CategoryController::class);
  
});


