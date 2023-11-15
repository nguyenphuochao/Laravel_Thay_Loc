<?php

use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\RegisterController;
use Illuminate\Support\Facades\Route;

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


//------------------------- Front-end----------------------------------
Route::get('/', [HomeController::class, 'index'])->name('fe.home');
Route::get('san-pham', [ProductController::class, 'index'])->name('fe.product');
Route::get('danh-muc/{slug}', [ProductController::class, 'index'])->name('fe.category');
Route::get('chi-tiet-san-pham/{slug}.html', [ProductController::class, 'show'])->name('fe.detail');
Route::get('san-pham/search', [ProductController::class, 'search'])->name('fe.search');
Route::post('comment/store', [CommentController::class, 'store'])->name('fe.comment');
Route::post('register', [RegisterController::class, 'register'])->name('fe.register');
Route::post('login', [LoginController::class, 'login'])->name('fe.login');
Route::post('logout', [LoginController::class, 'logout'])->name('fe.logout');
Route::get('existingEmail', [RegisterController::class, 'existingEmail'])->name('fe.existingEmail');
// Giỏ hàng
Route::middleware("auth")->group(function () {
    Route::get('carts/add', [CartController::class, 'store'])->name('cart.store');
    Route::get('carts/show', [CartController::class, 'show'])->name('cart.show');
    Route::get('carts/delete/{rowId}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('carts/update/{rowId}/{qty}', [CartController::class, 'update'])->name('cart.update');
    Route::get('payment', [PaymentController::class, 'create'])->name('fe.payment');
});
// Trả về view lun khỏi cần tạo qua controller
Route::get('chinh-sach-doi-tra', function () {
    return view('frontend.exchange');
})->name('fe.exchange');

Route::get('chinh-sach-thanh-toan', function () {
    return view('frontend.pay');
})->name('fe.pay');

Route::get('chinh-sach-giao-hang', function () {
    return view('frontend.delivery');
})->name('fe.delivery');

Route::get('lien-he', function () {
    return view('frontend.contact');
})->name('fe.contact');





//------------------------- Back-end----------------------------------
