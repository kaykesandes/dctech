<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::resource('products', ProductController::class);

// Route::group('/products', function () {
//     Route::get('/', [ProductController::class, 'index'])->name('product.index');
//     Route::get('/create', [ProductController::class, 'create'])->name('product.create');
//     Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
//     Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
// });

// Route::get('/products', [ProductController::class, 'index'])->name('product.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
// Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
// Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/register', function(){
    return view('register');
});