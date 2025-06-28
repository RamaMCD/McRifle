<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/products/search', [App\Http\Controllers\ProductController::class, 'search'])->name('products.search');
    Route::get('/custom', [App\Http\Controllers\CustomOrderController::class, 'index'])->name('custom');
    Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
    Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
    Route::post('/newsletter/subscribe', [App\Http\Controllers\NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/buy', [App\Http\Controllers\CartController::class, 'buy'])->name('cart.buy');
    Route::delete('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/history', [App\Http\Controllers\CartController::class, 'history'])->name('cart.history');
    Route::get('/cart/download/{number}', [App\Http\Controllers\CartController::class, 'download'])->name('cart.download');
    Route::get('/cart/invoice/{number}', [App\Http\Controllers\CartController::class, 'invoice'])->name('cart.invoice');
    Route::resource('products', ProductController::class)->except(['index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/custom', [App\Http\Controllers\CustomOrderController::class, 'store'])->name('custom.store');
    Route::post('/contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
    Route::get('/custom/success', [App\Http\Controllers\CustomOrderController::class, 'success'])->name('custom.success');
    Route::get('/custom/invoice/{id}', [App\Http\Controllers\CustomOrderController::class, 'invoice'])->name('custom.invoice');
    Route::get('/custom/invoice/download/{id}', [App\Http\Controllers\CustomOrderController::class, 'downloadInvoice'])->name('custom.invoice.download');
});

require __DIR__.'/auth.php';
