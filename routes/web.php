<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\SpendsController;
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
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post/index', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('/order/index', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
    Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/confirm', [OrderController::class, 'confirm'])->name('order.confirm');

    Route::get('/goods/index', [GoodsController::class, 'index'])->name('goods.index');
    Route::get('/goods/create', [GoodsController::class, 'create'])->name('goods.create');
    Route::post('/goods/store', [GoodsController::class, 'store'])->name('goods.store');
    Route::get('/goods/{id}', [GoodsController::class, 'edit'])->name('goods.edit');
    Route::patch('/goods/{id}', [GoodsController::class, 'update'])->name('goods.update');

    Route::get('/spends/index', [SpendsController::class, 'index'])->name('spends.index');
    Route::get('/spends/create', [SpendsController::class, 'create'])->name('spends.create');
    Route::post('/spends/store', [SpendsController::class, 'store'])->name('spends.store');

});

require __DIR__.'/auth.php';

