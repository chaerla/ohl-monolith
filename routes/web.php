<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseHistoryController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('auth/login', 'login')->name('auth-login');
    Route::post('auth/register', 'register')->name('auth-register');
    Route::post('auth/logout', 'logout');
    Route::post('auth/refresh', 'refresh');
});

Route::get('register', function () {
    return view('auth.register');
})->name('register');

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
});

Route::controller(ItemController::class)->group(function () {
    Route::get('item/{id}', 'show')->name('item');
});

Route::controller(InvoiceController::class)->group(function () {
    Route::post('/buy-item', 'store')->name('buy-item');
    Route::get('/invoices', 'getInvoices')->name('invoices');
});

Route::controller(PurchaseHistoryController::class)->group(function () {
    Route::get('/purchase-history', 'index')->name('purchase-history');
});