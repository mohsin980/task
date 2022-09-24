<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderManagmentController;
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

Route::get("login", [AuthController::class, "loginPage"])->name('login');
Route::post("login", [AuthController::class, "login"])->name('loginUser');
Route::get("add-order", [OrderManagmentController::class, "addOrder"])->name('addOrder');
Route::post("create-order", [OrderManagmentController::class, "createOrder"])->name('createOrder');
Route::get("orders", [OrderManagmentController::class, "listOrders"])->name('getOrders');
Route::get("logout", [AuthController::class, "logout"])->name('logout');
Route::get("/", [OrderManagmentController::class, "listOrders"])->name('getOrdersListings');