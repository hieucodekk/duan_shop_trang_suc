<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('home', function () {
//     return view('home');
// })->middleware('auth');
Route::get('login',[AuthController::class,'showFromLogin']);
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'showFromregister']);
Route::post('register',[AuthController::class,'register'])->name('register');
Route::post('logout',[AuthController::class,'logout'])->name(name: 'logout');

Route::get('admin', function(){
    return "dday la admin";
})->middleware('auth.admin');
Route::middleware('auth')->group(function(){
    Route::get('home', function ()  {
        return 'hoemwrw';
    });
});