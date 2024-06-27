<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Livewire\SearchPage;
use App\Livewire\CreateProduct;
use App\Livewire\EditProduct;
use App\Livewire\CategoryPage;
use App\Livewire\Cart;

Route::get('/', [HomeController::class, 'index'])->name('home'); 

Route::middleware('auth')->group(function () {
    Route::get('/painel', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/imagem', [ProfileController::class, 'destroyImage'])->name('profile.destroy-image');
    Route::get('/produtos/create', CreateProduct::class)->name('produtos.create');
    Route::get('/produtos/{id}/edit', EditProduct::class)->name('produtos.edit');
    Route::resource('produtos', ProductController::class)->except(['create', 'edit']);
    Route::resource('categorias', CategoryController::class);
    Route::resource('usuarios', UserController::class);
    Route::get('/carrinho', Cart::class)->name('cart');
});

require __DIR__.'/auth.php';

Route::get('/sobre', [AboutController::class, 'about'])->name('about');
Route::get('/contato', [ContactController::class, 'contact'])->name('contact-page');
Route::get('/produto/{slug}', [ProductController::class, 'product'])->name('product-page');
Route::get('/busca', SearchPage::class)->name('search-page');
Route::get('{slug}', CategoryPage::class)->name('category-page');

