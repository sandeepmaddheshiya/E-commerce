<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;

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

// API Home route
Route::get('/', function () {
    return response()->json(['message' => 'Welcome to the API']);
});

// User Routes Group
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('{id}', [UserController::class, 'show'])->name('show');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::put('{id}', [UserController::class, 'update'])->name('update');
    Route::delete('{id}', [UserController::class, 'destroy'])->name('destroy');
});

// Product Routes Group
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('{id}', [ProductController::class, 'show'])->name('show');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::put('{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('{id}', [ProductController::class, 'destroy'])->name('destroy');
});

// Category Routes Group
Route::prefix('categories')->name('categories.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('{id}', [CategoryController::class, 'show'])->name('show');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::put('{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('{id}', [CategoryController::class, 'destroy'])->name('destroy');
});

// Cart Routes Group
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('{userId}', [CartController::class, 'show'])->name('show');
    Route::post('{cartId}/add-item', [CartController::class, 'addItem'])->name('addItem');
    Route::delete('item/{cartItemId}', [CartController::class, 'removeItem'])->name('removeItem');
});

// Order Routes Group
Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('{userId}', [OrderController::class, 'index'])->name('index');
    Route::get('{id}', [OrderController::class, 'show'])->name('show');
    Route::post('/', [OrderController::class, 'store'])->name('store');
    Route::put('{id}', [OrderController::class, 'update'])->name('update');
    Route::delete('{id}', [OrderController::class, 'destroy'])->name('destroy');
});

// Payment Routes Group
Route::prefix('payments')->name('payments.')->group(function () {
    Route::get('{orderId}', [PaymentController::class, 'show'])->name('show');
    Route::post('{orderId}', [PaymentController::class, 'create'])->name('create');
    Route::put('{paymentId}', [PaymentController::class, 'update'])->name('update');
    Route::delete('{paymentId}', [PaymentController::class, 'destroy'])->name('destroy');
});
