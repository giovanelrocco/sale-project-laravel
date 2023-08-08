<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/product', [ProductController::class, 'show'])->name('product.get');
    Route::put('/product', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/product/{id}', [ProductController::class, 'update'])->name('product.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/customer', [CustomerController::class, 'show'])->name('customer.get');
    Route::put('/customer', [CustomerController::class, 'create'])->name('customer.create');
    Route::get('/customer/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::patch('/customer/{id}', [CustomerController::class, 'update'])->name('customer.update');
});

require __DIR__.'/auth.php';
