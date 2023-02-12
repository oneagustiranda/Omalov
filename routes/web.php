<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\AdminCategoryController;

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

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
        'active' => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active' => 'about',
        'name' => 'Agust',
        'email' => 'agust@one.com'
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

// halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/verification', [VerificationController::class, 'index'])->middleware('auth');
Route::post('/verification', [VerificationController::class, 'store']);
Route::get('/verification/status', [VerificationController::class, 'status'])->middleware('auth');



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth', 'isActive');



Route::post('/friends/{user}/send', [FriendController::class, 'sendRequest'])->name('friend.sendRequest')->middleware('auth', 'isActive');
Route::post('/friends/{friendRequestId}/accept', [FriendController::class, 'acceptRequest'])->name('friend.acceptRequest')->middleware('auth', 'isActive');
Route::get('/friends/{userId}/status', [FriendController::class, 'showStatus'])->middleware('auth', 'isActive');






Route::get('/admin', function(){
    return view('admin.index');
})->middleware('auth', 'isActive', 'isAdmin');
Route::get('/admin/users', [AdminUserController::class, 'index'])->middleware('auth', 'isActive', 'isAdmin');
Route::get('/admin/users/list', [AdminUserController::class, 'list'])->name('admin.users.list')->middleware('auth', 'isActive', 'isAdmin');
Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit']);
Route::patch('/admin/users/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');

Route::get('/admin/posts/list', [AdminPostController::class, 'list'])->name('admin.posts.list')->middleware('auth', 'isActive', 'isAdmin');
Route::get('/admin/posts/checkSlug', [AdminPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/admin/posts', AdminPostController::class)->middleware('auth');

Route::resource('/admin/categories', AdminCategoryController::class)->except('show')->middleware('isAdmin');
