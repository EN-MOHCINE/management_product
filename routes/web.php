<?php

use App\Http\Controllers\Product;
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

Route::get('/', function () {
    return view('welcome');
});



// Routes for listing products and showing the create product form
Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');

// Routes for storing a new product and showing a specific product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

// Routes for editing and updating a product
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');

// Route for deleting a product
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get("/page_login" ,[ProductController::class, 'login'])->name("login") ;
Route::post('/authentification', [ProductController::class, 'authentification'])->name("authentification") ;


Route::get('/craete_user', [ProductController::class, 'create_user'])->name("create.user") ;
Route::post('/register', [ProductController::class, 'register'])->name("register") ;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
