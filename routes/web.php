<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Auth;
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
})->name('home');

// Route::get('/login',[UserController::class, 'login'])->name('users.login');

Route::middleware('verified')->group(function () {
    // Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    // Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    // Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    // Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    // Route::delete('/posts/{destroy}', [PostController::class, 'destroy'])->name('posts.destroy');
    // Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    // Route::post('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    // Route::get('/users/profile', [UserController::class, 'index'])->name('users.index');
    //  this route is for the reset password action 
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Auth::routes(['verify' => true]);

// Route::get('/admins/login', [AdminController::class, 'show_login'])->name('admins.login');
// Route::post('/admins/login', [AdminController::class, 'login'])->name('admins.login.submit');
