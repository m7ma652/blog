<?php

use App\Http\Controllers\admin\AdminController as AdminController;
use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\admin\auth\AdminRegisterController;
use App\Http\Controllers\post\PostController;
use App\Http\Controllers\user\UserController;
// use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth:admin');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth:admin');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth:admin');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth:admin');
Route::delete('/posts/{destroy}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth:admin');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth:admin');
Route::post('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth:admin');
Route::get('/users/profile', [UserController::class, 'index'])->name('users.index')->middleware('auth:admin');
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admins.index')->middleware('auth:admin');


Route::get('/admin/login', [AdminLoginController::class, 'login'])->name('admins.login');
Route::post('/admin/login', [AdminLoginController::class, 'checkLogin'])->name('admins.checkLogin');

Route::get('/admin/register', [AdminRegisterController::class, 'register'])->name('admins.register');
Route::post('/admin/register', [AdminRegisterController::class, 'store'])->name('admins.store');

Route::post('/admin/dashboard/logout', [AdminLoginController::class, 'logout'])->name('admins.logout');
