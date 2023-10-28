<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
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


//-------------------- Front-end----------------------------------
Route::get('/', [HomeController::class, 'index'])->name('fe.home');
Route::get('san-pham', [ProductController::class, 'index'])->name('fe.product');
Route::get('danh-muc/{slug}', [ProductController::class, 'index'])->name('fe.category');
Route::get('chi-tiet-san-pham/{slug}.html', [ProductController::class, 'show'])->name('fe.detail');
Route::get('san-pham/search', [ProductController::class, 'search'])->name('fe.search');

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





//--------------------- Back-end----------------------------------
