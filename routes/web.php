<?php

use App\Http\Controllers\Admin\CategoryController;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;


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

// Route Home Page
Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{post_slu}', [HomeController::class, 'show']);

// Route Middleware
Auth::routes();

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    // Route Category
    Route::get('categories',[categorycontroller::class, 'index']);
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('admin/categories/save', [CategoryController::class, 'simpan'])->name('categories.simpan');
    Route::get('categories/edit/{category}', [CategoryController::class, 'edit']);
    Route::put('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::post('post/simpan', [PostController::class, 'simpanpost'])->name('post.simpanpost');
    Route::get('/categories/delete/{category_id}', [CategoryController::class, 'destroy']);
    Route::delete('/admin/categories/delete/{id}', 'CategoryController@destroy')->name('categories.delete');
    // Route Post
    Route::get('posts',[Postcontroller::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::post('admin/posts/save', [PostController::class, 'simpan']);
    Route::get('posts/edit/{post}', [PostController::class, 'edit']);
    Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::get('/posts/delete/{post_id}', [PostController::class, 'destroy']);
});