<?php

use App\Exports\ProductExport;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Porfilecontroller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

Route::fallback(function () {
    return view('pages.error');
});


Route::get('/example', function () {
    return view('sample');
});
    

Route::get('/', [Porfilecontroller::class, 'users'])->name('layout')->middleware(['admin']);
Route::get('/login', [Authcontroller::class, 'loginpage'])->name('login-view');
Route::post('/login', [Authcontroller::class, 'login'])->name('login');
Route::get('/register', [Authcontroller::class, 'registerpage']);
Route::post('/register', [Authcontroller::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

route::middleware(['customer'])->group(function () {
    Route::get('/productpage', [ProductController::class, 'card'])->name('card');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/cart/myorder', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/order', [CartController::class, 'cartitem'])->name('cart.item');

    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'destroy'])->name('cart.remove');


    Route::get('/cart', [CartController::class, 'view']);
    Route::post('/order/place', [CartController::class, 'placeOrder'])->name('order');

});

route::middleware(['admin'])->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    });
    Route::get('/products', [ProductController::class, 'index'])->name('table');
    Route::get('/edit', [Porfilecontroller::class, 'userdetail'])->name('edit');
    Route::post('/edit', [Porfilecontroller::class, 'update'])->name('update');
    Route::post('/change', [Authcontroller::class, 'updatepassword'])->name('password');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/editproducts/{id}', [ProductController::class, 'productedit'])->name('product.edit');
    Route::post('/productupdate/{id}', [ProductController::class, 'productupdate'])->name('product.update');
    Route::get('view/{id}', [ProductController::class, 'view'])->name('productview');
    Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');
    Route::get('/product/export', function () {
        return Excel::download(new ProductExport, 'Products.xlsx');
    })->name('product.export');
    Route::post('products/import', [ProductController::class, 'import'])->name('products.import');
    Route::get('/admin/order', [CartController::class, 'adminOrderHistory'])->name('admin.orders');
});
