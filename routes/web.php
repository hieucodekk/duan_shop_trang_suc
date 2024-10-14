<?php

use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\DonHangController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('spdanhmuc/{id}',[HomeController::class,'listDanhMuc'])->name('spdanhmuc');
// Route::get('home', function () {
//     return view('home');
// })->middleware('auth');
Route::get('login',[AuthController::class,'showFromLogin']);
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'showFromregister']);
Route::post('register',[AuthController::class,'register'])->name('register');
Route::post('logout',[AuthController::class,'logout'])->name(name: 'logout');

// Route::get('admin', function(){
//     return "dday la admin";
// })->middleware('auth.admin');
// Route::middleware('auth')->group(function(){
//     Route::get('home', function ()  {
//         return 'hoemwrw';
//     });
// });
Route::middleware(['auth','auth.admin'])->prefix('admins')
->as('admins.')
->group(function(){
   
    Route::get('list-user',[AuthController::class,'listUser'])->name('listuser');

    Route::prefix('danhmucs')
    ->as('danhmucs.')
    ->group(function(){
        Route::get('/',[DanhMucController::class,'index'])->name('index');
        Route::get('create',[DanhMucController::class,'create'])->name('create');
        Route::post('store',[DanhMucController::class,'store'])->name('store');
        Route::get('{id}/edit',[DanhMucController::class,'edit'])->name('edit');
        Route::put('update/{id}',[DanhMucController::class,'update'])->name('update');
        Route::delete('destroy/{id}',[DanhMucController::class,'destroy'])->name('destroy');
    });

    Route::prefix('sanphams')
    ->as('sanphams.')
    ->group(function(){
        Route::get('/',[SanPhamController::class,'index'])->name('index');
        Route::get('create',[SanPhamController::class,'create'])->name('create');
        Route::post('store',[SanPhamController::class,'store'])->name('store');
        Route::get('{id}/edit',[SanPhamController::class,'edit'])->name('edit');
        Route::put('update/{id}',[SanPhamController::class,'update'])->name('update');
        Route::delete('destroy/{id}',[SanPhamController::class,'destroy'])->name('destroy');
    });

     Route::prefix('donhang1s')
    ->as('donhang1s.')
    ->group(function(){
        Route::get('/',[DonHangController::class,'index'])->name('index');   
        Route::get('show/{id}',[DonHangController::class,'show'])->name('show');
        Route::put('update/{id}',[DonHangController::class,'update'])->name('update');
        Route::delete('destroy/{id}',[DonHangController::class,'destroy'])->name('destroy');
    });

    
});
Route::middleware('auth')->prefix('donhangs')
    ->as('donhangs.')
    ->group(function(){
        Route::get('/',[OrderController::class,'index'])->name('index');
        Route::get('create',[OrderController::class,'create'])->name('create');
        Route::post('store',[OrderController::class,'store'])->name('store');
        Route::get('show/{id}',[OrderController::class,'show'])->name('show');
        Route::put('update/{id}',[OrderController::class,'update'])->name('update');       
    });
Route::get('/product/detail/{id}',[ProductController::class, 'detailSanPham'])->name('products.detail');
Route::get('/list-cart',[CartController::class, 'listCart'])->name('cart.list');
Route::post('/add-to-cart',[CartController::class, 'addCart'])->name('cart.add');
Route::post('/update-cart',[CartController::class, 'updateCart'])->name('cart.update');