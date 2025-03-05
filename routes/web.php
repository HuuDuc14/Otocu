<?php

use App\Http\Controllers\AppointmenrController;
use App\Http\Controllers\CarController;
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


// route cho user
Route::get('/', [HomeController::class, 'showPageHome'])->name('home');

Route::get('/login', [HomeController::class, 'showLoginForm'])->name('login');
Route::get('/register', [HomeController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [HomeController::class, 'registerStore'])->name('register.store');
Route::post('/login', [UserController::class, 'login'])->name('handlelogin');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
// xác thực email để tạo tk
Route::get('/register/verify', [HomeController::class, 'verifyEmail'])->name('register.verify');

Route::get('/save', [HomeController::class, 'showPageSave'])->name('save.index'); //trang xem sau
Route::get('/save/{id}', [HomeController::class, 'save'])->name('save'); // xem sau (lưu)
Route::get('/save/delete/{id}', [HomeController::class, 'deleteSave'])->name('save.delete'); // xem sau (lưu)


Route::get('/user/mypost', [HomeController::class, 'myPost'])->name('mypost'); //tất cả các bài đăng của mình 
Route::get('/user/mypost/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
Route::post('/user/mypost/update', [PostController::class, 'update'])->name('post.update');


Route::get('/cars', [CarController::class, 'showPostsCar'])->name('cars'); //trang bài đăng chính
Route::get('/cars/detail/{id}', [CarController::class, 'detailCar'])->name('cars.detail'); //trang chi tiết bài đăng


Route::get('/post/delete/{id}', [PostController::class, 'delete'])->name('post.delete'); // xóa bài

Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
Route::get('/get-districts/{provinceId}', [PostController::class, 'getDistricts']);
Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

// hẹn xem xe
Route::post('/appointment/store', [AppointmenrController::class, 'store'])->name('appointment.store');
Route::get('/appointment/watched/{id}', [AppointmenrController::class, 'watched'])->name('appointment.watched');
Route::get('/appointment', [AppointmenrController::class, 'appointment'])->name('appointment');


Route::middleware(['auth'])->group(function () {
    // Admin có quyền vào tất cả các route
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/nhanvien', [NhanVienController::class, 'index'])->name('nhanvien.index');
        Route::get('/nhanvien/search', [NhanVienController::class, 'search'])->name('nhanvien.search');
        Route::get('/nhanvien/themmoi', [NhanVienController::class, 'create'])->name('nhanvien.create');
        Route::post('/nhanvien/store', [NhanVienController::class, 'store'])->name('nhanvien.store');
        Route::get('/nhanvien/edit/{id}', [NhanVienController::class, 'edit'])->name('nhanvien.edit');
        Route::post('/nhanvien/update', [NhanVienController::class, 'update'])->name('nhanvien.update');
        Route::get('/nhanvien/delete/{id}', [NhanVienController::class, 'delete'])->name('nhanvien.delete');
        
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/search', [UserController::class, 'search'])->name('user.search');
        Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        Route::post('/user/staff/{id}', [UserController::class, 'makeStaff'])->name('user.staff');
        
        Route::get('/post', [PostController::class, 'index'])->name('post.index');
        Route::get('/post/accept/{id}', [PostController::class, 'accept'])->name('post.accept'); //nút duyệt
        Route::get('/post/refuse/{id}', [PostController::class, 'refuse'])->name('post.refuse'); //nút từ chối
        Route::get('/post/accepted', [PostController::class, 'accepted'])->name('post.accepted'); // trang đã duyệt
        Route::get('/post/refused', [PostController::class, 'refused'])->name('post.refused'); // trang bị từ chối
        Route::get('/post/search', [PostController::class, 'search'])->name('post.search');
    });

    // Staff chỉ có quyền vào /post 
    Route::middleware(['role:admin,staff'])->group(function () {
        Route::get('/post', [PostController::class, 'index'])->name('post.index');
        Route::get('/post/accept/{id}', [PostController::class, 'accept'])->name('post.accept'); //nút duyệt
        Route::get('/post/refuse/{id}', [PostController::class, 'refuse'])->name('post.refuse'); //nút từ chối
        Route::get('/post/accepted', [PostController::class, 'accepted'])->name('post.accepted'); // trang đã duyệt
        Route::get('/post/refused', [PostController::class, 'refused'])->name('post.refused'); // trang bị từ chối
        Route::get('/post/search', [PostController::class, 'search'])->name('post.search');
    });
});









