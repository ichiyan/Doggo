<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CreatePostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('landing_page');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', function() {
    return view('home');
});

Route::get('/form', function() {
    return view('form');
})->name('createForm');

// Route::resource('shop', PostController::class)->middleware(['auth']);

Route::resource('shop', PostController::class);

Route::post('shop/report', [PostController::class, 'report'])->name('shop.report');

Route::get('/dog', [CreatePostController::class, 'validateDog'])->name('DRN');

require __DIR__.'/auth.php';
