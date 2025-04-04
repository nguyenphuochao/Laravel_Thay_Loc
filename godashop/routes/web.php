<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\CartController;

use App\Http\Controllers\Frontend\CustomerController;

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

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('index');
// Sản phẩm
Route::get('san-pham', [ProductController::class, 'index'])->name('product.index');
// Danh mục
Route::get('danh-muc/{slug}', [ProductController::class, 'index'])->name('category.show');
// Chi tiết sản phẩm
Route::get('san-pham/{slug}.html', [ProductController::class, 'show'])->name('product.show');
// Tìm kiếm sản phẩm bằng ajax
Route::get('san-pham/search', [ProductController::class, 'search'])->name('product.search');
// Bình luận sản phẩm bằng ajax
Route::post('comment/store', [CommentController::class, 'store'])->name('comment.store');

Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('existingEmail', [RegisterController::class, 'existingEmail'])->name('existingEmail');

// Giỏ hàng
// Route::middleware("auth")->group(function () {
Route::get('carts/add', [CartController::class, 'store'])->name('cart.store');
Route::get('carts/show', [CartController::class, 'show'])->name('cart.show');
Route::get('carts/delete/{rowId}', [CartController::class, 'delete'])->name('cart.delete');
Route::get('carts/update/{rowId}/{qty}', [CartController::class, 'update'])->name('cart.update');
Route::get('carts/discount', [CartController::class, 'discount'])->name('cart.discount');
Route::get('payment', [PaymentController::class, 'create'])->name('payment');
Route::post('payment', [PaymentController::class, 'store'])->name('payment.store');
Route::get('address/{provinceId}/districts', [AddressController::class, 'districts']);
Route::get('address/{districtId}/wards', [AddressController::class, 'wards']);
Route::get('shippingfree/{provinceId}', [AddressController::class, 'shippingfree']);
// });

Route::middleware("auth")->group(function () {
    Route::get('customer/show', [CustomerController::class, 'show'])->name('customer.show');
    Route::post('customer/update', [CustomerController::class, 'update'])->name('customer.update');
});

// Trả về view lun khỏi cần tạo qua controller
Route::get('chinh-sach-doi-tra', function () {
    return view('return_policy.index');
})->name('return_policy.index');

Route::get('chinh-sach-thanh-toan', function () {
    return view('payment_policy.index');
})->name('payment_policy.index');

Route::get('chinh-sach-giao-hang', function () {
    return view('delivery_policy.index');
})->name('delivery_policy.index');

Route::get('lien-he', function () {
    return view('contact.index');
})->name('contact.index');

// Area Admin
