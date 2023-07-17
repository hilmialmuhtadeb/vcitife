<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Livewire\Home;
use App\Models\Detail;
use Gloudemans\Shoppingcart\Facades\Cart;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/products')->group(function () {
  Route::get('/', [ProductController::class, 'index'])->name('products.index');
  Route::middleware('admin')->group(function () {
    Route::get('/new', [ProductController::class, 'new'])->name('products.new');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/{product:slug}/delete', [ProductController::class, 'destroy'])->name('products.delete');
    Route::get('/{product:slug}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/{product:slug}/edit', [ProductController::class, 'update']);
  });
  Route::get('/{product:slug}', [ProductController::class, 'show'])->name('products.show');
});

Route::prefix('/carts')->middleware('auth')->group(function () {
  Route::get('/', [CartController::class, 'index'])->name('carts.index');
  Route::post('/store', [CartController::class, 'store'])->name('carts.store');
  Route::post('/new', [CartController::class, 'new'])->name('carts.new');
  Route::get('/history', [CartController::class, 'history'])->name('carts.history');
  Route::patch('/{order:id}/update', [CartController::class, 'update'])->name('carts.update');
  Route::get('/{order:id}/checkout', [CartController::class, 'checkout'])->name('carts.checkout');
});

Route::prefix('/details')->group(function () {
  Route::get('/{detail:id}', [DetailController::class, 'index'])->name('details.index');
  Route::patch('/{detail:id}/update', [DetailController::class, 'update'])->name('details.update');
  Route::delete('/{detail:id}/destroy', [DetailController::class, 'destroy'])->name('details.destroy');
});

Route::prefix('/admin')->middleware('admin', 'auth')->group(function () {
  Route::get('/', [AdminController::class, 'index'])->name('admin.index');
  Route::get('/products', [AdminController::class, 'product'])->name('admin.products');
  Route::get('/orders', [AdminController::class, 'order'])->name('admin.orders');
  Route::get('/users', [AdminController::class, 'user'])->name('admin.users.index');

  Route::get('/orders/wait', [AdminController::class, 'orderWait'])->name('admin.orders.wait');
  Route::get('/orders/all', [AdminController::class, 'orderAll'])->name('admin.orders.all');

  Route::patch('/users/{user:id}/add-admin', [AdminController::class, 'addAdmin'])->name('admin.users.addAdmin');

  Route::patch('/orders/{order:id}/update', [AdminController::class, 'orderUpdate'])->name('admin.orders.update');
  Route::get('/orders/{order:id}/detail', [AdminController::class, 'orderDetail'])->name('admin.orders.detail');
});

Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category:id}/show', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/guide', [CategoryController::class, 'guide'])->name('guide.index');

Route::get('/ratings/{order:id}/add', [RatingController::class, 'index'])->name('ratings.add');
Route::post('/ratings/store', [RatingController::class, 'store'])->name('ratings.store');
