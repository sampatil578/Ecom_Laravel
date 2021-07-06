<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::view("/login","login");
Route::view("/signup","signup");
Route::view("/addproduct","addproduct");

Route::post("/login",[UserController::class,'login']);
Route::post("/signup_form",[UserController::class,'signup']);
Route::post("/product_form",[ProductController::class,'signup']);
Route::get("/",[ProductController::class,'index']);

Route::get("/logout",function(){
    Session::forget('user');
    return redirect('login');
});