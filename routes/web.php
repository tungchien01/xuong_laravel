<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/shop', function () {
//     return view('shop');
// });

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/create', [ProductController::class, 'store'])->name('products.store');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/edit/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('products.delete');
    });
});

//Client
Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('category/{category}', [ClientProductController::class, 'list'])->name('page.category.list');
Route::get('product/{slug}', [ClientProductController::class, 'detail'])->name('page.product.detail');
