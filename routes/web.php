<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/register', [LoginController::class, 'registerCreate'])->name('registerCreate');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'isAdmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
//        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
//        Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');
    });




