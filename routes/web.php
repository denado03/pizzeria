<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\LoginController;
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
