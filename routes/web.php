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
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\InboxController;
use App\Mail\PCCI_Verification;

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


Route::get('/chat', function() {
    return view('shop.create_post');
});

//test
Route::get('/profile', function() {
    if (Auth::check())
        return view('profile');
    return back()->with('not_user', 'Log in first');
});

// Route::get('/form', function() {
//     return view('form');
// })->name('createForm');

// Route::resource('shop', PostController::class)->middleware(['auth']);

Route::post('shop/{post_id}/report', [PostController::class, 'report'])->name('report_post');
Route::get('shop/{post_id}/print', [PostController::class, 'print'])->name('print_post');

//Show Profile
Route::get('user/{user_id}/profile/all', [ProfileController::class, 'showAll'])->name('profile_all');
Route::get('user/{user_id}/profile/shop', [ProfileController::class, 'showShop'])->name('profile_shop');
Route::get('user/{user_id}/profile/stud', [ProfileController::class, 'showStud'])->name('profile_stud');
Route::get('user/{user_id}/profile/rehome', [ProfileController::class, 'showRehome'])->name('profile_rehome');
Route::get('user/{user_id}/profile/bookmarked', [ProfileController::class, 'showBookmarked'])->name('profile_bookmarked');

//Edit Profile
Route::get('user/{user_id}/profile/edit', [ProfileController::class, 'editProfile'])->name('edit_profile');

// line below: can use delete but it needs a form to be passed with csrf stuff. hence the Route::get since it's direct but has security issues.
Route::get('user/{user_id}/profile/{post_id}/delete', [ProfileController::class, 'destroyPost'])->name('profile_delete');
// Route::delete('user/{user_id}/profile/{post_id}/delete', [ProfileController::class, 'destroyPost'])->name('profile_delete');
Route::get('user/{user_id}/profile/{post_id}/edit', [ProfileController::class, 'showRehome'])->name('profile_edit');

Route::resource('shop', PostController::class);
Route::resource('rehome', RehomeController::class);
Route::resource('stud_service', StudServiceController::class);

Route::patch('image/{imgId}/edit', [PostController::class, 'editImage'])->name('editImage');
Route::get('shop/{post_id}/bookmark', [PostController::class, 'bookmark'])->name('bookmark_post');
Route::get('shop/sort/', [PostController::class, 'sort'])->name('sort');

Route::get('admin/dashboard', function() {
    return view('admin.dashboard');
});

Route::get('admin/logs', [AdminController::class, 'logs']);


Route::get('modal', function () {
    return view('modal');
});

Route::get('pcci-register', function () {
    return view('auth/pcci-register');
});

Route::get('non-member-register', function () {
    return view('auth/non-member-register');
});

Route::get('/dog', [CreatePostController::class, 'validateDog'])->name('DRN');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/inbox', [InboxController::class, 'index'])->name('inbox');
    Route::get('/inbox/{id}', [InboxController::class, 'show'])->name('inbox.show');
});

Route::get('/verify-mail', function () {

    Mail::to('newuser@example.com')->send(new PCCI_Verification());
     return view('auth/login');;

});


require __DIR__.'/auth.php';
