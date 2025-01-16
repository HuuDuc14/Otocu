<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NhanVienController;
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

// Route::get('/welcome', function () {
//     return view('welcome');
// });
// Route::get('/about', function () {
//     return view('pages.about');
// });

Route::get('/', [HomeController::class, 'showPageHome'])->name('home');
Route::get('/nhanvien', [NhanVienController::class,'index'])->name('nhanvien.index');
Route::get('/nhanvien/search', [NhanVienController::class,'search'])->name('nhanvien.search');

Route::get('/nhanvien/themmoi', [NhanVienController::class,'create'])->name('nhanvien.create');
Route::post('/nhanvien/store', [NhanVienController::class,'store'])->name('nhanvien.store');

Route::get('/nhanvien/edit/{id}', [NhanVienController::class, 'edit'])->name('nhanvien.edit');
Route::post('/nhanvien/update', [NhanVienController::class,'update'])->name('nhanvien.update');









Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login']);

Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('post', [PostController::class, 'form_post'])->name('post');
