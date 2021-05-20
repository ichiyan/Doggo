<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostController2;
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



// Route::get('/', function () {
//     return view('landing_page');
// })->middleware(['auth'])->name('landing_page');

Route::get('/home', function() {
    return view('home');
});

Route::get('/form', function() {
    return view('form');
})->name('createForm');

// Route::resource('shop', PostController::class)->middleware(['auth']);

Route::post('shop/{post_id}/report', [PostController::class, 'report'])->name('report_post');
Route::get('shop/{post_id}/print', [PostController::class, 'print'])->name('print_post');
Route::resource('shop', PostController::class);
Route::resource('rehome', PostController::class);
Route::resource('stud_service', PostController::class);

Route::patch('image/{imgId}/edit', [PostController::class, 'editImage'])->name('editImage');

Route::get('admin/dashboard', function() {
    return view('admin.dashboard');
});

Route::get('admin/logs', [AdminController::class, 'logs']);


Route::get('modal', function () {
    return view('modal');
});


Route::get('/dog', [CreatePostController::class, 'validateDog'])->name('DRN');

require __DIR__.'/auth.php';
