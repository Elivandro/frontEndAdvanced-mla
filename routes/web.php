<?php

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


Route::get('loja/products', App\Http\Livewire\Ecommerce\ProductList::class)->name('products.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/category', App\Http\Livewire\Categories\Index::class)->name('category.index');
    Route::get('/category/create', App\Http\Livewire\Categories\Create::class)->name('category.create');
    Route::get('/category/{category}/edit', App\Http\Livewire\Categories\Update::class)->name('category.update');

    Route::get('/product', App\Http\Livewire\Products\Index::class)->name('product.index');
    Route::get('/product/create', App\Http\Livewire\Products\Create::class)->name('product.create');
    Route::get('/product/{product}/edit', App\Http\Livewire\Products\Create::class)->name('product.update');

});

require __DIR__.'/auth.php';
