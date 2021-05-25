<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostController2;
use App\Http\Controllers\CreatePostController;
use App\Http\Controllers\RehomeController;
use App\Http\Controllers\StudServiceController;
use App\Http\Controllers\ProfileController;

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

Route::get('/create', function() {
    return view('shop.create_post');
});

//test
Route::get('/profile', function() {
    return view('profile');
});

// Route::get('/form', function() {
//     return view('form');
// })->name('createForm');

// Route::resource('shop', PostController::class)->middleware(['auth']);

Route::post('shop/{post_id}/report', [PostController::class, 'report'])->name('report_post');
Route::get('shop/{post_id}/print', [PostController::class, 'print'])->name('print_post');
Route::get('user/{user_id}/profile/all', [ProfileController::class, 'showAll'])->name('profile_all');
Route::get('user/{user_id}/profile/shop', [ProfileController::class, 'showShop'])->name('profile_shop');
Route::get('user/{user_id}/profile/stud', [ProfileController::class, 'showStud'])->name('profile_stud');
Route::get('user/{user_id}/profile/rehome', [ProfileController::class, 'showRehome'])->name('profile_rehome');

Route::resource('shop', PostController::class);
Route::resource('rehome', RehomeController::class);
Route::resource('stud_service', StudServiceController::class);

Route::patch('image/{imgId}/edit', [PostController::class, 'editImage'])->name('editImage');
Route::get('shop/{post_id}/bookmark', [PostController::class, 'bookmark'])->name('bookmark_post');

Route::get('admin/dashboard', function() {
    return view('admin.dashboard');
});

Route::get('admin/logs', [AdminController::class, 'logs']);


Route::get('modal', function () {
    return view('modal');
});


Route::get('/dog', [CreatePostController::class, 'validateDog'])->name('DRN');

require __DIR__.'/auth.php';
