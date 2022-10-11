<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\PostController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//category

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::Post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

//sub_category

Route::get('/sub_category', [SubCategoryController::class, 'index'])->name('sub_category.index');
Route::get('/sub_category/create', [SubCategoryController::class, 'create'])->name('sub_category.create');
Route::Post('/sub_category/store', [SubCategoryController::class, 'store'])->name('sub_category.store');
Route::get('/sub_category/edit/{id}', [SubCategoryController::class, 'edit'])->name('sub_category.edit');
Route::post('/sub_category/update/{id}', [SubCategoryController::class, 'update'])->name('sub_category.update');
Route::get('/sub_category/delete/{id}', [SubCategoryController::class, 'destroy'])->name('sub_category.delete');
//Post

Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.delete');



