<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tes', function () {
    return view('layout.master');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('role:admin', 'auth')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin');
    Route::resource('/tags', TagController::class);
    Route::resource('/categories', CategoryController::class);
});

Route::get('/penulis', function () {
    return 'halaman Penulis';
})->name('penulis');
