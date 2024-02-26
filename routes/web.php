<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomepageController::class, 'index']);
//utk menampilkan halaman login
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');
//route untuk memproses login
Route::post('/login', [AuthController::class, 'Login'])->name('login')->middleware('guest');
//route untuk pengunnjung yang sudah login
Route::middleware('auth')->group(function(){
    Route::get('/admin', function(){
        return view('admin.dashboard.index',[
            'title' =>'Dashboard'
        ]);
    });
});
//utk halaman manajemen admin
Route::get('/users', [UserController::class, 'index']);
//utk menmpilkan form tambah admin
Route::get('/users/create', [UserController::class, 'create']);
//menampilkan data admin baru
Route::post('/users/store', [UserController::class, 'store']);
//untk menampilkan form
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
//utk menyimpan data perubahan data admin
Route::put('/users/{id}/update', [UserController::class, 'update']);
//untuk menghapus data admin
Route::get('/users/{id}/destroy', [UserController::class, 'destroy']);
//rout untuk logout
Route::get('/logout', [AuthController::class, 'logout']);
//Rout untuk CRUD kategory
Route::resource('categories', CategoryController::class);
//rout untuk CRUD post
Route::resource('posts', PostController::class);

Route::resource('galleries', GalleryController::class);

//Rout untuk menyimpan Foto yang di upload
Route::post('/images/store', [ImageController::class, 'store']);

//
Route::DELETE('/images/{id}', [ImageController::class, 'destroy']);

