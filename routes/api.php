<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderManagmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// test payemnt route
Route::post("check-customer-payment", [OrderManagmentController::class, "checkCustomerPayment"])->name('checkCustomerPayment');

Route::get('/unauthorized', function () {
    return 'Unauthorized access';
});
Route::get('/notfound', function () {
    return 'Are you lost?';
});