<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $store=Auth::user()->stores;
    $categories=Auth::user()->categories;
    $products=Auth::user()->products;
    $comments_count=0;
    foreach ($products as  $product) {
      $comments_count+=$product->comments->count();
    }
    return view('cms.dashboard',[
        "store_count"=>count($store),
        "categories_count"=>count($categories),
        "products_count"=>count($products),
        "comments_count"=>$comments_count
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Store Controller
    Route::resource("/stores",StoreController::class);
    Route::resource("/categories",CategoryController::class);
    Route::resource("/products",ProductController::class);
    Route::resource('/comments', CommentController::class);
});

require __DIR__.'/auth.php';


Route::get("/public/website",[WebsiteController::class,"index"])->name("website.index");
Route::get("/public/website/products/{id}/show-product",[WebsiteController::class,"show"])->name("website.show");
Route::get("/public/website/show-all-products",[WebsiteController::class,"allProducts"])->name("website.allProducts");



