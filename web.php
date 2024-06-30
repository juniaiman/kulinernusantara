<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RifadController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\itemsPostController;
use App\Http\Controllers\ReaditemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SearchController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [RifadController::class, 'home'])->name('home');





Route::get('/kategori', [RifadController::class, 'kategori']);

// Route::get('/adminproduk', [RifadController::class, 'adminproduk']);

// Route::get('/test', [RifadController::class, 'test']);

// USER
Route::get('/datapengguna', [UserController::class, 'datapengguna'])->name('user')->middleware('admin');
Route::put('/datapengguna/{email}', [UserController::class, 'gantirole'])->name('user.role')->middleware('admin');
Route::delete('/datapengguna/{email}', [UserController::class, 'delete'])->name('user.delete')->middleware('admin');
Route::post('/profile/favorite', [UserController::class, 'favorit'])->name('user.favorite');
Route::delete('/profile/favorite/{email}', [UserController::class, 'deleteFavorite'])->name('user.deleteFavorite');

// REGISTRASI
Route::get('/registrasi', [RegisterController::class, 'index']);
Route::post('/registrasi', [RegisterController::class, 'create'])->name('user.create');

// PROFIL
Route::get('/profil', [ProfileController::class, 'view'])->name('profile')->middleware('auth');
Route::put('/profil/{email}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::put('/profil/photo/{email}', [ProfileController::class, 'changePhoto'])->name('profile.photo')->middleware('auth');
Route::get('/profile/favorite', [ProfileController::class, 'viewFav'])->name('profile.favorite')->middleware('auth');
Route::put('/profile/location/{email}', [ProfileController::class, 'changeLoc'])->name('profile.location')->middleware('auth');
Route::get('/profile/status', [ProfileController::class, 'viewStat'])->name('profile.status')->middleware('auth');

// ITEM CRUD
Route::resource('/admin', itemsPostController::class)->middleware('admin');
Route::post('/adminBarang', [itemsPostController::class, 'store'])->name('item.store')->middleware('admin');
Route::get('/adminBarang', [ReaditemController::class,'view'])->middleware('admin');
Route::put('/adminBarang/{slug}', [itemsPostController::class, 'update'])->name('item.update')->middleware('admin');
Route::post('/adminBarang/{slug}', [itemsPostController::class, 'delete'])->name('item.delete')->middleware('admin');

// MENUPAGE
Route::get('/menupage', [ReaditemController::class,'menuPage'])->middleware('auth');
Route::get('/menupage/{slug}', [ReaditemController::class,'detail'])->name('produk.show')->middleware('auth');

// AKUN
Route::get('/login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/resetpassword', [RifadController::class, 'resetpassword']);
Route::get('/lupapassword', [LoginController::class, 'lupapassword'])->name('lupapassword');
Route::post('/lupapasswordact', [LoginController::class, 'lupapasswordact'])->name('lupapasswordact');

Route::get('/validasipassword/{token}', [LoginController::class, 'validasipassword'])->name('validasipassword');
Route::post('/validasipasswordact', [LoginController::class, 'validasipasswordact'])->name('validasipasswordact');

// CART
Route::get('/cart', [CartController::class, 'view'])->name('cart')->middleware('auth');
Route::post('/cart', [CartController::class, 'addCart'])->name('cart.add')->middleware('auth');

// CHECKOUT
Route::get('/cart/checkout', [CheckoutController::class, 'checkoutView'])->name('checkout')->middleware('auth');
Route::post('/cart/checkout', [CheckoutController::class, 'checkout'])->name('user.checkout')->middleware('auth'); 
Route::post('/cart/buyNow', [CheckoutController::class, 'buyNow'])->name('user.buyNow')->middleware('auth'); 

// PAYMENT
Route::post('/cart/checkout/payment', [PaymentController::class, 'create'])->name('user.payment')->middleware('auth'); 
Route::post('/cart/checkout/payment/{orderNum}', [PaymentController::class, 'createPay'])->name('user.pay')->middleware('auth'); 
Route::get('/cart/checkout/payment', [PaymentController::class, 'view'])->name('user.payment')->middleware('auth'); 
Route::put('/cart/checkout/payment/receipt/{orderNum}', [PaymentController::class, 'receipt'])->name('user.confirm')->middleware('auth'); 

// STATUS PEMBELIAN
Route::get('/status', [UserController::class,'status'])->name('status')->middleware('admin');
Route::put('/status/change/{orderNum}', [UserController::class,'changeStatus'])->name('user.changeStatus')->middleware('admin');
Route::delete('/status/delete/{orderNum}', [UserController::class,'deleteStatus'])->name('user.deleteStatus')->middleware('admin');

// KATEGORI
Route::get('/kategori/{origin}', [KategoriController::class,'viewKategori'])->name('kategori')->middleware('auth');

// SEARCH
Route::post('/menupage/search', [SearchController::class, 'searchMenu'])->name('user.searchMenu')->middleware('auth');
Route::post('/kategori/{origin}/search', [SearchController::class, 'searchKategori'])->name('user.searchKategori')->middleware('auth');
Route::post('{active}/search', [SearchController::class, 'searchStatus'])->name('user.searchStatus')->middleware('auth');
